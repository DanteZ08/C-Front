<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class AppointmentController extends BaseController
{
    protected $user;
   


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
        
        if(($time >= $startM && $time < $stopM || $time >= $startN && $time < $stopN))
            return true;

        return false;
    }

    public function calculate1H($date){
        return $date->add(new DateInterval('PT1H'));
    }

    public function calculate30M($date){
        $nextStart = $date->add(new DateInterval('PT30M'));
        $nextEnd = $this->calculate1H($date);
        return $this->checkOtherAppointmentsDate($nextStart, $nextEnd);
    }

    public function checkOtherAppointmentsDate($start, $stop){
        $appointments = DB::table('appointments')->where('consultantUID', $this->user->UID)->get();
        foreach($appointments as $app){
            $aStart = $app->startDate;
            $aStop = $app->endDate;
            if(($start >= $aStart && $start < $aStop) || ($stop > $aStart && $stop <= $aStop)){
                return true;
            }
        }

    }

    public function createAppointment(Request $request){
        $this->user = $request()->input('UID');
        $currentDate = new DateTime();

        if($this->mondayToFriday($currentDate))
            return 0;
        
        

    }

}
