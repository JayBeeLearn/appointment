<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointments';
    protected $primarykey = 'id';

    protected $fillable = [
        'user_id',
        'profile_id',
        'name',
        'appointment_topic',
        'appointment_details',
        'date',
        'time'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
