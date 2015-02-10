<?php  namespace Aidph\Registration\Events; 

use User;

class UserHasCreated {

    public $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }


} 