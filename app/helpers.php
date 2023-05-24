<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


/** Both funcs are used to create an UniqueIdentifier
 * Similar to the MongoDB's id format 
 * Great for confusing attackers when using ID's as identifiers in URL's
 * "Hey look they use MongoDB as database", jokes on them, It's MySQL
 * But also for managing the data
 * 
 * generateUniqueMongoId is recursive, using the actual ID generator (generateMongoId)
 * then checks if that id is existing in a said table, if so
 * it calls itself again
 * 
 * (i know in this case it's virtually impossible to get the same ID twice)
 * 
 */
if(!function_exists('generateMongoId')){

    function generateMongoId() {
        $timestamp = dechex(strtotime(date('Y-m-d H:i:s')));
        $machineId = substr(md5(gethostname()), 0, 6);
        $pid = substr(dechex(getmypid()), 0, 4);
        $counter = substr(dechex(mt_rand(0, 0xffffff)), 0, 6);
    
        return $timestamp . $machineId . $pid . $counter;
    }

}
if(!function_exists('generateUniqueMongoId')){

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

/**Helper function to avoid writing 'Auth::' when fetching info about the logged user */
if(!function_exists('user')){
    function user(){
        return Auth::user();
    }
}