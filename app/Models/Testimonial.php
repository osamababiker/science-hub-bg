<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    public function course(){
        return $this->belongsTo(Course::class, 'sub_of');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
