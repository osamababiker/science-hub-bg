<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Settings;
use App\Models\Category;
use App;

class BlogsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
        $blogs = Blog::with('category')->get();
        return response()->json($blogs, 200);
    }

     /**
     * Display the specified resource.
     */ 
    public function show($id){
        $blog = Blog::where('id', $id)->with('category')->first();
        return response()->json($blog, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function postComments(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'comment' => 'required|string',
            'blog_id' => 'required'
        ]);

        $comment = new Comment();
        $comment->sub_of = $request->blog_id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->save();

        App::isLocale('en') ? $message = 'Your comment has been posted' : $message = 'تم اضافة تعليقك بنجاح';
        return redirect()->back()->with('comments_feedback', $message);
    }

}
