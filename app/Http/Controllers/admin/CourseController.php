<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.courses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'category_id' => 'required',
        ]);
        $image = $request->file('image')->store('uploads/courses', 'custom');
        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $image,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('admin.courses.index')->with(['msg' => 'Course created.', 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $course = Course::findOrFail($id);
        return view('admin.courses.edit', compact('course', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'category_id' => 'required',
        ]);
        $image = $course->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('uploads/courses', 'custom');
        }
        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $image,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('admin.courses.index')->with(['msg' => 'Course updated.', 'type' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Course::destroy($id);
        return redirect()->route('admin.courses.index')->with(['msg' => 'Course deleted.', 'type' => 'danger']);
    }
}
