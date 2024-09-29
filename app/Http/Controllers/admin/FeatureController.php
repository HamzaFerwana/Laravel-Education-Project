<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $features = Feature::latest('id')->get();
        return view('admin.features.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.features.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|required'
        ]);
        $validator->validate();
        $image = $request->file('image')->store('uploads/features', 'custom');
        Feature::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image
        ]);
        return redirect()->route('admin.features.index')->with(['msg' => 'Feature created.', 'type' => 'success']);
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
        $feature = Feature::findOrFail($id);
        return view('admin.features.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   $feature = Feature::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ]);
        $image = $feature->image;
        if($request->hasFile('image')) {
            $image = $request->file('image')->store('uploads/features', 'custom');
        }
        $feature->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image
        ]);
        return redirect()->route('admin.features.index')->with(['msg' => 'Feature updated.', 'type' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Feature::destroy($id);
        return redirect()->route('admin.features.index')->with(['msg' => 'Feature deleted.', 'type' => 'danger']);
    }
}
