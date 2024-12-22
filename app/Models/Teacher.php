<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class, 'sub_of');
    }

    public function courses(){
        return $this->hasMany(Course::class, 'teacher_id');
    }
}
