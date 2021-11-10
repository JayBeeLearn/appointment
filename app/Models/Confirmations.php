<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirmations extends Model
{
    use HasFactory;

    protected $table = 'confirmations';
    protected $primaryKey = 'id';

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
}
