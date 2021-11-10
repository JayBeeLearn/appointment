<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'phone_number',
        'profile_photo',
        'gender',
        'description',
        'date_of_birth',
        'work_place',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
