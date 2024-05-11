<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return view('admin.pages.course.index');
    }

    public function create()
    {
        return view('admin.pages.course.create');
    }

    public function edit(Request $request, $id)
    {
        return view('admin.pages.course.edit');
    }


}
