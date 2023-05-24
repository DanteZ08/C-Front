<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Consultant;
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
        $startM= '9:00';
        $stopM = '13:00';

        $startN = '15:30';
        $stopN = '22:00';
        
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

    public function APIcalculate30M(Request $request) {
        if ($request->ajax() || $request->wantsJson()) {
            $dateString = $request->input('date');
            
            $date = substr($dateString, 0, strrpos($dateString, 'GMT') - 1);
            
            $nextStart = new DateTime($date);
            $nextStart->add(new DateInterval('PT30M'));
    
            $nextEnd = $this->calculate1H($nextStart);
            //dd($nextStart);
            return response()->json($this->checkOtherAppointmentsDate($nextStart, $nextEnd, $request->input('user')));
        }
    }
    

    public function checkOtherAppointmentsDate($start, $stop, $user = null) {
        if ($user === null) {
            $user = $this->consultant;
        }
        
        $appointments = Appointment::where('consultantUID', $user)->get();
        foreach ($appointments as $app) {
            $aStart = new \DateTime($app->startDate);
            $aStop = new \DateTime($app->endDate);
            
            if (($start >= $aStart && $start < $aStop) || ($stop > $aStart && $stop <= $aStop)) {
                return true;
            }
        }
        return false;
    }

    public function createAppointment(Request $request) {
        $this->consultant = $request->input('consultant');
        $currentDate = new DateTime($request->input('date'));
    
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
            'customerUID' =>  $request->input('customer'),
            'consultantUID' => $this->consultant,
            'startDate' => $appointmentStart->format('Y-m-d H:i'),
            'endDate' => $this->calculate1H($appointmentStart)->format('Y-m-d H:i'),
            'status' => false
        ]);
        Consultant::where('UID', $this->consultant)->update(['status' => 1]);
        return 4;
    }
    

}
