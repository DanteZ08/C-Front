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
    protected $consultant;
   


    public function endAppointment(){
        
    }


    public function mondayToFriday($date){
        return ($date->format('N') >= 6);
    }

    public function checkAvailability($date){
        $time = $date->format('H:i');
        $startM= '08:00';
        $stopM = '13:00';

        $startN = '15:01';
        $stopN = '21:00';

        return ($time >= $startM && $time < $stopM || $time >= $startN && $time < $stopN);
    }

    public function calculate1H($date){
        $nextEnd = clone $date;
        $nextEnd->add(new DateInterval('PT1H'));
        return $nextEnd;
    }

    public function calculate30M($date) {
        $nextStart = clone $date;
        $nextStart->add(new DateInterval('PT30M'));

        $nextEnd = $this->calculate1H($nextStart);

        return $this->checkOtherAppointmentsDate($nextStart, $nextEnd);
    }

    public function checkOtherAppointmentsDate($start, $stop){
        $appointments = DB::table('appointments')->where('consultantUID', $this->consultant->UID)->get();
        foreach($appointments as $app){
            $aStart = $app->startDate;
            $aStop = $app->endDate;
            if(($start >= $aStart && $start < $aStop) || ($stop > $aStart && $stop <= $aStop)){
                return true;
            }
        }
        
    }

    public function createAppointment(Request $request) {
        $this->consultant = $request->input('UID');
        $currentDate = new DateTime();
    
        if ($this->mondayToFriday($currentDate))
            return 0;
    
        if (!$this->checkAvailability($currentDate))
            return 1;
    
        $appointmentStart = $currentDate;
        $appointmentEnd = $this->calculate1H($appointmentStart);
        
        if ($this->checkOtherAppointmentsDate($appointmentStart, $appointmentEnd))
            return 2;
    
        if ($this->calculate30M($appointmentStart))
            return 3;


        //dd($appointmentStart->format('Y-m-d H:i') . " / " . $appointmentEnd->format('Y-m-d H:i'));
        
        Appointment::create([
            'UID' => generateUniqueMongoId('appointments'),
            'customerUID' => $this->consultant ,
            'consultantUID' => user()->UID,
            'startDate' => $appointmentStart->format('Y-m-d H:i'),
            'endDate' => $this->calculate1H($appointmentStart)->format('Y-m-d H:i'),
            'status' => false
        ]);
        return 4;
    }
    

}
