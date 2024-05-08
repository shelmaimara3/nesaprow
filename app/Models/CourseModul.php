<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseModul extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'path_modul',
        'course_id',
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
