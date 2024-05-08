<?php

namespace App\Models;

use App\Models\ProjectStudent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Occupation extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];

    public function project_students(){
        return $this->hasMany(ProjectStudent::class);
    }
}
