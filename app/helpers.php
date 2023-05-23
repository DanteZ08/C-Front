<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

if(!function_exists('generageMongoId')){

    function generateMongoId() {
        $timestamp = dechex(strtotime(date('Y-m-d H:i:s')));
        $machineId = substr(md5(gethostname()), 0, 6);
        $pid = substr(dechex(getmypid()), 0, 4);
        $counter = substr(dechex(mt_rand(0, 0xffffff)), 0, 6);
    
        return $timestamp . $machineId . $pid . $counter;
    }

}
if(!function_exists('generageMongoId')){

    function generateUniqueMongoId($table) {
        $id = generateMongoId();
    
        $exists = DB::table($table)
            ->where('UID', $id)
            ->exists();
    
        if ($exists) {
            return generateUniqueMongoId($table);
        }
    
        return $id;
    }

}

if(!function_exists('user')){
    function user(){
        return Auth::user();
    }
}