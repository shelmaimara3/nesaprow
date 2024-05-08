<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'is_active',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function project_students(){
        return $this->belongsTo(ProjectStudent::class);
    }
}
