<?php

namespace Aidph\Helpers;


use Illuminate\Support\Facades\Log;
use User;

trait UserHelperTrait {

    public static function generateUserNameFromEmail($email)
    {
        if($email) {
            $arr = explode('@', $email);
            return $arr[0] . '-' . str_random(5);
        }
        return false;
    }

} 