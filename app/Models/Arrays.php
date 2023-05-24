<?php
namespace App\Models;
class Arrays
{
    public static array $_consultantStatus = [];
    
    /**I use this as a global array library, initialized in a middleware */

    public static function init()
    {
        self::$_consultantStatus = [
        ];
           
    }

}