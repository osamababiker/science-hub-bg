<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Testimonial;
use App\Models\Settings;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('admin.testimonials.index', [
            'testimonials' => Testimonial::with('user')->with('course')->get(),
            'settings' => Settings::first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    function create() {
        return view('admin.testimonials.create', [
            'testimonials' => Testimonial::all(),
            'users' => User::all(),
            'courses' => Course::all(),
            'settings' => Settings::first()
        ]);
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'en_title' => 'required|string',
            'ar_title' => 'required|string',
            'en_content' => 'required|string',
            'ar_content' => 'required|string',
            'user_id' => 'required',
            'sub_of' => 'required'
        ]);
        $testimonial = new Testimonial();

        $testimonial->en_title = $request->en_title;
        $testimonial->ar_title = $request->ar_title;
        $testimonial->en_content = $request->en_content;
        $testimonial->ar_content = $request->ar_content;
        $testimonial->sub_of = $request->sub_of;
        $testimonial->user_id = $request->user_id;
        $testimonial->save();
        return redirect()->back()->with('feedback', 'testimonial has been created');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', [
            'testimonial' => $testimonial,
            'courses' => Course::all(),
            'users' => User::all(),
            'settings' => Settings::first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $request->validate([
            'en_title' => 'required|string',
            'ar_title' => 'required|string',
            'en_content' => 'required|string',
            'ar_content' => 'required|string',
            'user_id' => 'required',
            'sub_of' => 'required'
        ]);
        $testimonial = Testimonial::findOrFail($id);

        $testimonial->en_title = $request->en_title;
        $testimonial->ar_title = $request->ar_title;
        $testimonial->en_content = $request->en_content;
        $testimonial->ar_content = $request->ar_content;
        $testimonial->sub_of = $request->sub_of;
        $testimonial->user_id = $request->user_id;
        $testimonial->save();
        return redirect()->back()->with('feedback', 'testimonial has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        Testimonial::findOrFail($id)->delete();
        return redirect()->back()->with('feedback', 'testimonial has been deleted');
    }
}
