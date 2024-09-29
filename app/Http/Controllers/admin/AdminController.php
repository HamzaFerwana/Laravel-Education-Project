<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        $revenue = 0;
        foreach ($payments as $payment) {
        $revenue += $payment->amount;
        }
        return view('admin.index', compact('revenue'));
    }

    public function hero_section()
    {
        return view('admin.hero-section.index');
    }

    public function hero_section_data(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'nullable|image'
        ]);
        $validator->validate();
        $image = settings()->get('image');
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('uploads/hero-section', 'custom');
        }
        settings()->set('title', $request->title);
        settings()->set('image', $image);
        settings()->save();
        return redirect()->route('admin.hero-section')->with(['msg' => 'Content updated.', 'type' => 'info']);
    }

    public function about()
    {
        return view('admin.about.index');
    }

    public function about_data(Request $request)
    {
        $request->validate([
            'hero_section_image' => 'nullable|image',
            'description_section_image' => 'nullable|image',
            'description' => 'required',
            'video_description' => 'required',
            'video_link' => ['required', 'regex:/^https?:\/\/(www\.)?vimeo\.com\/\d+$/'],
            'satisfied_students' => 'required',
            'courses_completed' => 'required',
            'experts_advisors' => 'required',
            'schools' => 'required',
        ]);
        $hero_section_image = settings()->get('hero_section_image');
        $description_section_image = settings()->get('description_section_image');
        if ($request->hasFile('hero_section_image')) {
            $hero_section_image = $request->file('hero_section_image')->store('uploads/about', 'custom');
        }
        if ($request->hasFile('description_section_image')) {
            $description_section_image = $request->file('description_section_image')->store('uploads/about', 'custom');
        }
        settings()->set('hero_section_image', $hero_section_image);
        settings()->set('description_section_image', $description_section_image);
        settings()->set('description', $request->description);
        settings()->set('video_description', $request->video_description);
        settings()->set('video_link', $request->video_link);
        settings()->set('satisfied_students', $request->satisfied_students);
        settings()->set('courses_completed', $request->courses_completed);
        settings()->set('experts_advisors', $request->experts_advisors);
        settings()->set('schools', $request->schools);
        settings()->save();
        return redirect()->back()->with(['msg' => 'Content updated.', 'type' => 'info']);
    }

    public function assign_teachers()
    {
        $courses = Course::with('category')->get()->groupBy('category_id');
        $teachers = Teacher::all()->groupBy('academic_title');
        return view('admin.assign-teachers.index', compact('courses', 'teachers'));
    }

    public function assign_teachers_data(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required',
            'courses' => 'required'
        ]);
        $teacher = Teacher::findOrFail($request->teacher_id);
        $teacher->courses()->sync($request->courses);
        return redirect()->route('admin.assignment-table')->with(['msg' => 'Courses assigned to teacher.', 'type' => 'success']);
    }

    public function assignment_table()
    {
        $teachers = Teacher::all();
        return view('admin.assign-teachers.table', compact('teachers'));
    }

    public function assign_teachers_edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $courses = Course::with('category')->get()->groupBy('category_id');
        return view('admin.assign-teachers.edit', compact('courses', 'teacher'));
    }

    public function assign_teachers_edit_data(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->courses()->sync($request->courses);
        return redirect()->route('admin.assignment-table')->with(['msg' => 'Courses assigned to teacher.', 'type' => 'success']);
    }

    public function mark_as_read($id)
    {
        $noti = DatabaseNotification::findOrFail($id);
        $noti->markAsRead();
        return redirect()->back();
    }
}
