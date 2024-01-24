<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function course()
    {
        $course = Course::get();

        return response()->json($course, 200);
    }
    public function addCourse(Request $request)
    {
        $course = Course::create([
            "name" => $request->name,
        ]);

        return response()->json($course, 200);
    }
    public function updateCourse(Request $request, $id)
    {
        $course = Course::find($id);

        $course->update([
            "name" => $request->name,
        ]);

        return response()->json(null, 200);
    }
    public function deleteCourse($id)
    {
        $course = Course::find($id);

        $course->delete();

        return response()->json(null, 200);
    }
}
