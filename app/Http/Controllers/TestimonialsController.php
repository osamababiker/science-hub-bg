<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialsController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(){
        $testimonials = Testimonial::with('course')->with('user')->get();
        return response()->json($testimonials, 200);
    } 
 
    /**
     * Display the specified resource.
     */
    public function show($id){
        $testimonial = Testimonial::with('course')->with('user')->findOrFail($id);
        return response()->json($testimonial, 200);
    }
}
