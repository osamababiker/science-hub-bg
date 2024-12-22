<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class, 'sub_of');
    }

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
