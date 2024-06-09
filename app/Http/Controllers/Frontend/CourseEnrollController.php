<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseEnroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseEnrollController extends Controller
{
    //Course Enroll
    public function CourseEnroll(Request $request, $course_id)
    {
        if (Auth::check()) {
            $exists = CourseEnroll::where('user_id', Auth::id())->where('course_id', $course_id)->exists();

            if (!$exists) {
                CourseEnroll::create([

                    'user_id' => Auth::id(),
                    'course_id' => $course_id,
                    'amount' => $request->input('payment_amount'),
                    'enrollment_date' => now(),
                    
                ]);

                return redirect()->back()->with('success', 'Course enrolled successfully.');
            } else {
                return redirect()->back()->with('error', 'This Course Has Already has been Enrolled');
            }
        } else {
            return redirect()->route('login')->with('error', 'Please login to enroll in the course.');
        }
    }

    //Add To Enroll
    public function AddToEnroll(Request $request, $course_id)
    {
        if (Auth::check()) {
            $exists = CourseEnroll::where('user_id', Auth::id())->where('course_id', $course_id)->exists();

            if (!$exists) {
                CourseEnroll::create([

                    'user_id' => Auth::id(),
                    'course_id' => $course_id,
                    'amount' => $request->input('payment_amount'),
                    'enrollment_date' => now(),
                    
                ]);

                return response()->json(['success' => 'Course enrolled successfully.']);

            } else {

                return response()->json(['error' => 'This Course Has Already has been Enrolled']);
            }
        } else {
            return response()->json(['error' => 'Please login to enroll in the course.']);
        }
    }

    //Add To Enroll Online
    public function AddToEnrollOnline(Request $request)
    {

        $id = $request->course_id;

        if (Auth::check()) {
            $exists = CourseEnroll::where('user_id', Auth::id())->where('course_id', $id)->exists();

            if (!$exists) {
                CourseEnroll::create([

                    'user_id' => Auth::id(),
                    'course_id' => $id,
                    'amount' => $request->input('online_amount'),
                    'enrollment_date' => now(),
                    
                ]);

                return response()->json(['success' => 'Course enrolled successfully.']);

            } else {

                return response()->json(['error' => 'This Course Has Already has been Enrolled']);
            }
        } else {
            return response()->json(['error' => 'Please login to enroll in the course.']);
        }
    }
}
