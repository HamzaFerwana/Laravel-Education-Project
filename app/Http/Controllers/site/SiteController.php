<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Feature;
use App\Models\Payment;
use App\Models\Teacher;
use App\Models\User;
use App\Notifications\NewContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        $features = Feature::take(3)->get();
        return view('site.index', compact('features'));
    }

    public function about()
    {
        return view('site.about');
    }

    public function courses(Request $request)
    {
        $courses = Course::paginate(3);
        // if ($request->ajax()) {
        //     return view('site.parts.courses', compact('courses'))->render();
        // }
        return view('site.courses', compact('courses'));
    }

    public function teachers()
    {
        $teachers = Teacher::paginate(3);
        return view('site.teachers', compact('teachers'));
    }

    public function single_teacher($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('site.teacher-single', compact('teacher'));
    }

    public function contact()
    {
        return view('site.contact');
    }

    public function contact_data(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $user = User::findOrFail(1);
        $user->notify(new NewContact($request->name, $request->email, $request->subject, $request->message));
        return redirect()->route('genius.contact')->with(['msg' => 'Thank You For Your Message!']);
    }

    public function enroll($id)
    {
        $course = Course::findOrFail($id);
        $url = "https://eu-test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
            "&amount=" . $course->price .
            "&currency=EUR" .
            "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData, true);
        $checkoutID = $responseData['id'];
        return view('site.course-single', compact('course', 'checkoutID'));
    }

    public function checkout(Request $request, $id)
    {
        $resourcePath = $request->resourcePath;
        $course = Course::findOrFail($id);
        $url = "https://eu-test.oppwa.com" . $resourcePath;
        $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData, true);
        $status = $responseData['result']['code'];
        if ($status == '000.100.110') {
            Payment::create([
                'transaction_id' => $responseData['id'],
                'user_id' => Auth::id(),
                'course_id' => $course->id,
                'amount' => $responseData['amount'],
                'currency' => $responseData['currency']
            ]);
            $user = Auth::user();
            $user->courses()->attach($course->id);
            return redirect()->route('genius.payment-redirect')->with(['msg' => 'Thank you for buying our course!', 'type' => 'primary']);
        } else {
            return redirect()->route('genius.payment-redirect')->with(['msg' => 'Payment failed.', 'type' => 'danger']);
        }
    }

    public function payment_redirect() {
        return view('site.payment-redirect');
    }

    public function my_courses() {
        return view('site.my-courses');
    }

    public function unenroll($id) {
        Auth::user()->courses()->detach($id);
        $payment = Payment::where('course_id', $id)->first();
        Payment::destroy($payment->id);
        return redirect()->back();
    }
}
