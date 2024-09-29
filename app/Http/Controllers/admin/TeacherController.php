<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'academic_title' => 'required',
            'image' => 'required|image',
            'tw_link' => 'required',
            'insta_link' => 'required',
            'about' => 'required'
        ]);
        $image = $request->file('image')->store('uploads/teachers', 'custom');
        Teacher::create([
            'name' => $request->name,
            'academic_title' => $request->academic_title,
            'image' => $image,
            'tw_link' => $request->tw_link,
            'insta_link' => $request->insta_link,
            'about' => $request->about
        ]);
        return redirect()->route('admin.teachers.index')->with(['msg' => 'Teacher created.', 'type' => 'success']);
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
        $teacher = Teacher::findOrFail($id);
        return view('admin.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $teacher = Teacher::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'academic_title' => 'required',
            'image' => 'nullable|image',
            'tw_link' => 'required',
            'insta_link' => 'required',
            'about' => 'required'
        ]);
        $image = $teacher->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('uploads/teachers', 'custom');
        }
        $teacher->update([
            'name' => $request->name,
            'academic_title' => $request->academic_title,
            'image' => $image,
            'tw_link' => $request->tw_link,
            'insta_link' => $request->insta_link,
            'about' => $request->about
        ]);
        return redirect()->route('admin.teachers.index')->with(['msg' => 'Teacher updated.', 'type' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Teacher::destroy($id);
        return redirect()->route('admin.teachers.index')->with(['msg' => 'Teacher deleted.', 'type' => 'danger']);
    }
}
