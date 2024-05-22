<?php

namespace App\Models;

use App\Models\User;
use App\Models\Occupation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectStudent extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_team',
        'title_project',
        'member',
        'occupation_id',
        'proof_project',
        'is_done',
        'score',
        'user_id',
        'deadline',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function occupation(){
        return $this->belongsTo(Occupation::class, 'occupation_id');
    }

}
