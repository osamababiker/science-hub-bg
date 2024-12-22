<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Message;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Settings;

class HomeController extends Controller
{
    public function index(){
        return view('admin/index', [
            'messages_count' => Message::count(),
            'teachers_count' => Teacher::count(),
            'courses_count' => Course::count(),
            'settings' => Settings::first()
        ]); 
    }

}
