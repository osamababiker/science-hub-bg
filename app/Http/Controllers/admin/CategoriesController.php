<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Settings;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('admin.categories.index', [
            'categories' => Category::all(),
            'settings' => Settings::first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    function create() {
        return view('admin.categories.create', [
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
            'ar_name' => 'required|string'
        ]);
        $category = new Category();
        $category->en_name = $request->en_name;
        $category->ar_name = $request->ar_name;
        $category->sub_of = $request->sub_of;
        $category->save();
        return redirect()->back()->with('feedback', 'category has been created');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', [
            'category' => $category,
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
            'ar_name' => 'required|string'
        ]);
        $category = Category::findOrFail($id);
        $category->en_name = $request->en_name;
        $category->ar_name = $request->ar_name;
        $category->sub_of = $request->sub_of;
        $category->save();
        return redirect()->back()->with('feedback', 'category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('feedback', 'category has been deleted');
    }
}
