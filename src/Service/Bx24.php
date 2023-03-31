<?php

namespace App\Service;
use App\Service\CRest;

class Bx24
{
    public static function checkServ()
    {
//        return CRest::checkServer();
        return 'checked';
    }

    public static function getDepartments(){
        return CRest::call('profile');
    }
}