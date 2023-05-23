<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'appointmentUID',
        'customerUID',
        'consultantUID',
        'startDate',
        'endDate',
        'status'
    ];

}
