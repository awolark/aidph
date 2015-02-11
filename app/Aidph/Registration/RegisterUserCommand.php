<?php  namespace Aidph\Registration; 

use Hash;

class RegisterUserCommand {

    public $area_id;

    public $username;

    public $password;

    public $email;

    public $role;

    /**
     * @param $area_id
     * @param $username
     * @param $password
     * @param $email
     * @param $role
     */
    function __construct($area_id, $username, $password, $email, $role)
    {
        $this->area_id = $area_id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
    }


} 