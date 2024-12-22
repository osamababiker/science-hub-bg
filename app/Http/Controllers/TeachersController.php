<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $teachers = Teacher::with('courses')->get();
        return response()->json($teachers, 200);
    } 
 
    /**
     * Display the specified resource.
     */
    public function show($id){
        $teacher = Teacher::with('courses')->findOrFail($id);
        return response()->json($teacher, 200);
    }
}
