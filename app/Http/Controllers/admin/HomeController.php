<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Message;
use App\Models\Order;
use App\Models\Course;
use App\Models\User;
use App\Models\Settings;

class HomeController extends Controller
{
    public function index(){
        return view('admin/index', [
            'messages_count' => Message::count(),
            'orders_count' => Order::count(),
            'courses_count' => Course::count(),
            'users_count' => User::count(),
            'settings' => Settings::first()
        ]); 
    }

}
