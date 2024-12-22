<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class, 'sub_of');
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
