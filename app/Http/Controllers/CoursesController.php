<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $courses = Course::with('category')
            ->with('teacher')->get();
        return response()->json($courses, 200);
    }


    /**
     * Display the specified resource.
     */
    public function show($id){
        $course = Course::where('id', $id)
            ->with('category')
            ->with('teacher')->first();
        return response()->json($course, 200);
    }

}
