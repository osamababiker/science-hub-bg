<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Category;
use App\Models\Settings;
use Str;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('admin.courses.index',[
            'courses' => Course::paginate(15),
            'settings' => Settings::first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('admin.courses.create', [
            'categories' => Category::all(),
            'teachers' => Teacher::all(),
            'settings' => Settings::first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'en_name' => 'required|string',
            'ar_name' => 'required|string',
            'rating' => 'required|numeric',
            'rating_count' => 'required|integer',
            'lesson_count' => 'required|integer',
            'duration' => 'required|numeric',
            'level_en' => 'required|string',
            'level_ar' => 'required|string',
            'original_price' => 'required|numeric',
            'discounted_price' => 'required|numeric',
            'language_en' => 'required|string',
            'language_ar' => 'required|string',
            'difficulty_en' => 'required|string',
            'difficulty_ar' => 'required|string',
            'image' => 'required',
            'en_desc' => 'required|string',
            'ar_desc' => 'required|string',
            'page_description' => 'required|string',
            'page_key_words' => 'required|string',
        ]);

        $course = new Course();
        if($request->has('image')){
            $image = $request->file('image');
            $image_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/courses'),$image_name);
        }else $image_name = "";

        $course->en_name = $request->en_name;
        $course->ar_name = $request->ar_name;
        $course->rating = $request->rating;
        $course->slug = Str::slug($request->en_name);
        $course->rating_count = $request->rating_count;
        $course->lesson_count = $request->lesson_count;
        $course->duration = $request->duration;
        $course->level_en = $request->level_en;
        $course->level_ar = $request->level_ar;
        $course->original_price = $request->original_price;
        $course->discounted_price = $request->discounted_price;
        $course->language_en = $request->language_en;
        $course->language_ar = $request->language_ar;
        $course->difficulty_en = $request->difficulty_en;
        $course->difficulty_ar = $request->difficulty_ar;
        $course->en_desc = $request->en_desc;
        $course->ar_desc = $request->ar_desc;
        $course->sub_of = $request->sub_of;
        $course->teacher_id = $request->teacher_id;
        $course->image = $image_name;
        $course->page_key_words = $request->page_key_words;
        $course->page_description = $request->page_description;
        $course->save();

        return redirect()->back()->with('feedback', 'course has been created');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $course = Course::findOrFail($id);
        return view('admin.courses.edit', [
            'course' => $course,
            'categories' => Category::all(),
            'teachers' => Teacher::all(),
            'settings' => Settings::first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){ 
        $request->validate([
            'en_name' => 'required|string',
            'ar_name' => 'required|string',
            'rating' => 'required|numeric',
            'rating_count' => 'required|integer',
            'lesson_count' => 'required|integer',
            'duration' => 'required|numeric',
            'level_en' => 'required|string',
            'level_ar' => 'required|string',
            'original_price' => 'required|numeric',
            'discounted_price' => 'required|numeric',
            'language_en' => 'required|string',
            'language_ar' => 'required|string',
            'difficulty_en' => 'required|string',
            'difficulty_ar' => 'required|string',
            'en_desc' => 'required|string',
            'ar_desc' => 'required|string',
            'page_description' => 'required|string',
            'page_key_words' => 'required|string',
        ]);

        $course = Course::findOrFail($id);

        if($request->has('image')){
            $image = $request->file('image');
            $image_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/courses'),$image_name);
        }else{
            $image_name = $course->image;
        }

        $course->en_name = $request->en_name;
        $course->ar_name = $request->ar_name;
        $course->rating = $request->rating;
        $course->slug = Str::slug($request->en_name);
        $course->rating_count = $request->rating_count;
        $course->lesson_count = $request->lesson_count;
        $course->duration = $request->duration;
        $course->level_en = $request->level_en;
        $course->level_ar = $request->level_ar;
        $course->original_price = $request->original_price;
        $course->discounted_price = $request->discounted_price;
        $course->language_en = $request->language_en;
        $course->language_ar = $request->language_ar;
        $course->difficulty_en = $request->difficulty_en;
        $course->difficulty_ar = $request->difficulty_ar;
        $course->en_desc = $request->en_desc;
        $course->ar_desc = $request->ar_desc;
        $course->sub_of = $request->sub_of;
        $course->teacher_id = $request->teacher_id;
        $course->image = $image_name;
        $course->page_key_words = $request->page_key_words;
        $course->page_description = $request->page_description;
        $course->save();

        return redirect()->back()->with('feedback', 'course has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        Course::findOrFail($id)->delete();
        return redirect()->back()->with('feedback', 'course has been deleted');
    }
}
