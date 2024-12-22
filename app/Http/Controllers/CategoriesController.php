<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $categories = Category::with('blog')
            ->with('courses')->with('teachers')->get();
        return response()->json($categories, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id){
        $category = Category::with('blogs')
            ->with('courses')->with('teachers')->findOrFail($id);
        return response()->json($category, 200);
    }

}
