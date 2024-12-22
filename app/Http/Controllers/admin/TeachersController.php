<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Category;
use App\Models\Settings;
 
class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('admin.teachers.index',[
            'teachers' => Teacher::all(),
            'settings' => Settings::first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('admin.teachers.create', [
            'categories' => Category::all(),
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
            'role_en' => 'required|string',
            'role_ar' => 'required|string',
            'rating' => 'required|numeric',
            'students' => 'required|integer',
            'courses' => 'required|integer',
            'en_desc' => 'required|string',
            'ar_desc' => 'required|string',
            'sub_of' => 'required|string',
            'image' => 'required'
        ]);

        $teacher = new Teacher();
        if($request->has('image')){
            $image = $request->file('image');
            $image_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/teachers'),$image_name);
        }

        $teacher->en_name = $request->en_name;
        $teacher->ar_name = $request->ar_name;
        $teacher->role_en = $request->role_en;
        $teacher->role_ar = $request->role_ar;
        $teacher->rating = $request->rating;
        $teacher->students = $request->students;
        $teacher->courses = $request->courses;
        $teacher->en_desc = $request->en_desc;
        $teacher->ar_desc = $request->ar_desc;
        $teacher->sub_of = $request->sub_of;
        $teacher->image = $image_name;
        $teacher->save();

        return redirect()->back()->with('feedback', 'teacher has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $teacher = teacher::findOrFail($id);
        return view('admin.teachers.edit', [
            'teacher' => $teacher,
            'settings' => Settings::first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $teacher = teacher::findOrFail($id);
        return view('admin.teachers.edit', [
            'teacher' => $teacher,
            'categories' => Category::all(),
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
            'role_en' => 'required|string',
            'role_ar' => 'required|string',
            'rating' => 'required|numeric',
            'students' => 'required|integer',
            'courses' => 'required|integer',
            'en_desc' => 'required|string',
            'ar_desc' => 'required|string',
            'sub_of' => 'required|string'
        ]);
        $teacher = Teacher::findOrFail($id);
        if($request->has('image')){
            if(file_exists(public_path('upload/teachers/'.$teacher->image))){
                unposition(public_path('upload/teachers/'.$teacher->image));
            }
            $image = $request->file('image');
            $image_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/teachers'),$image_name);
        }else{
            $image_name = $teacher->image;
        }

        $teacher->en_name = $request->en_name;
        $teacher->ar_name = $request->ar_name;
        $teacher->role_en = $request->role_en;
        $teacher->role_ar = $request->role_ar;
        $teacher->rating = $request->rating;
        $teacher->students = $request->students;
        $teacher->courses = $request->courses;
        $teacher->en_desc = $request->en_desc;
        $teacher->ar_desc = $request->ar_desc;
        $teacher->sub_of = $request->sub_of;
        $teacher->image = $image_name;
        $teacher->save();

        return redirect()->back()->with('feedback', 'teacher has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        Teacher::findOrFail($id)->delete();
        return redirect()->back()->with('feedback', 'teacher has been deleted');
    }
}
