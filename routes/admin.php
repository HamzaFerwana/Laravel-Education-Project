<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\FeatureController;
use App\Http\Controllers\admin\TeacherController;
use App\Http\Middleware\CheckUserType;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware('auth', CheckUserType::class)->group(function () {
Route::get('/', [AdminController::class, 'index'])->name('index');
Route::get('hero-section', [AdminController::class, 'hero_section'])->name('hero-section');
Route::post('hero-section-data', [AdminController::class, 'hero_section_data'])->name('hero-section-data');
Route::resource('features', FeatureController::class);
Route::get('about', [AdminController::class, 'about'])->name('about');
Route::post('about-data', [AdminController::class, 'about_data'])->name('about-data');
Route::resource('categories', CategoryController::class);
Route::resource('courses', CourseController::class);
Route::resource('teachers', TeacherController::class);
Route::get('assign-teachers', [AdminController::class, 'assign_teachers'])->name('assign-teachers');
Route::post('assign-teachers-data', [AdminController::class, 'assign_teachers_data'])->name('assign-teachers-data');
Route::get('assignment-table', [AdminController::class, 'assignment_table'])->name('assignment-table');
Route::get('assign-teachers-edit/{id}', [AdminController::class, 'assign_teachers_edit'])->name('assign-teachers-edit');
Route::post('assign-teachers-edit-data/{id}', [AdminController::class, 'assign_teachers_edit_data'])->name('assign-teachers-edit-data');
Route::get('mark-as-read/{id}', [AdminController::class, 'mark_as_read'])->name('mark-as-read');
});

