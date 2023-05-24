<?php
namespace App\Models;
class Arrays
{
    public static array $_consultantStatus = [];
    
    public static function init()
    {
        self::$_consultantStatus = [
            0 => 'Super Admin',
            1 => 'Admin',
        ];
           
    }

}