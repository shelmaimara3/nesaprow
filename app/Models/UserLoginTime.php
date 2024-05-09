<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserLoginTime extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'user_id',
        'login_time',
        'logout_time',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
