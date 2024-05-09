<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'about',
        'path_trailer',
        'cover',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function questions(){
        return $this->hasMany(CourseQuestion::class, 'course_id', 'id');
    }

    public function course_videos(){
        return $this->hasMany(CourseVideo::class);
    }

    public function course_moduls(){
        return $this->hasMany(CourseModul::class);
    }

    public function students(){
        return $this->belongsToMany(User::class, 'course_students', 'course_id', 'user_id');
    }
}
