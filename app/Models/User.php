<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $table = 'users';
    protected $primarykey = 'id';

    
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];


    //Relationship

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function confirmations(){
        return $this->hasMany(Confirmations::class);
    }
    
    


    //Table fillables and data
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
