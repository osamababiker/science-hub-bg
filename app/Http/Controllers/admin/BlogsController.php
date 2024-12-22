<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Settings;
use Str;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('admin.blogs.index', [
            'blogs' => Blog::paginate(15),
            'settings' => Settings::first()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    function create() {
        return view('admin.blogs.create', [
            'categories' => Category::all(),
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
            'sub_of' => 'required',
            'en_content' => 'required',
            'ar_content' => 'required',
            'page_description' => 'required',
            'page_key_words' => 'required',
        ]);

        if($request->has('image')){
            $image = $request->file('image');
            $image_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/blogs'),$image_name);
        } 

        $blog = new Blog();
        $blog->slug = Str::slug($request->en_title);
        $blog->sub_of = $request->sub_of;
        $blog->ar_title = $request->ar_title;
        $blog->en_title = $request->en_title;
        $blog->en_content = $request->en_content;
        $blog->ar_content = $request->ar_content;
        $blog->page_description = $request->page_description;
        $blog->page_key_words = $request->page_key_words;
        $blog->image = $image_name;
        $blog->save();
        return redirect()->back()->with('feedback', 'post has been created');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $blog_id){
        return view('admin.blogs.comments', [
            'comments' => Comment::where('sub_of', $blog_id)->paginate(15),
            'settings' => Settings::first()
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', [
            'blog' => $blog,
            'categories' => Category::all(),
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
            'sub_of' => 'required',
            'en_content' => 'required',
            'ar_content' => 'required',
            'page_description' => 'required',
            'page_key_words' => 'required',
        ]);

        $blog = Blog::findOrFail($id);

        if($request->has('image')){
            if(file_exists(public_path('upload/blogs/'.$blog->image))){
                unlink(public_path('upload/blogs/'.$blog->image));
            }
            $image = $request->file('image');
            $image_name = time().'_'. rand(1000, 9999). '.' .$image->extension();
            $image->move(public_path('upload/blogs'),$image_name);
        }else{
            $image_name = $blog->image;
        }

        $blog->sub_of = $request->sub_of;
        $blog->ar_title = $request->ar_title;
        $blog->en_title = $request->en_title;
        $blog->en_content = $request->en_content;
        $blog->ar_content = $request->ar_content;
        $blog->page_description = $request->page_description;
        $blog->page_key_words = $request->page_key_words;
        $blog->image = $image_name;
        $blog->save();
        return redirect()->back()->with('feedback', 'post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        Blog::findOrFail($id)->delete();
        return redirect()->back()->with('feedback', 'post has been deleted');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyComments(Request $request){
        Comment::where('id', $request->comment_id)->delete();
        return redirect()->back()->with('feedback', 'comment has been removed');
    }
}
