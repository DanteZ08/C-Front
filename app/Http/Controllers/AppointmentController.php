<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class AppointmentController extends BaseController
{
    public function createAppointment(){

    }


    public function endAppointment(){
        
    }


    public function mondayToFriday($date){
        return ($date->format('N') >= 6);
    }

    public function checkAvailability($date){
        $time = $date->format('H:i');
        $startM= '09:00';
        $stopM = '13:00';

        $startN = '15:30';
        $stopN = '21:00';
        
        if(($time >= $startM && $time < $stopM || $time >= $startN && $time < $stopN)){

        }
    }
}
