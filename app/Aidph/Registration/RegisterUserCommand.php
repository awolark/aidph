<?php  namespace Aidph\Registration; 

use Hash;

class RegisterUserCommand {

    public $area_id;

    public $username;

    public $email;

    public $role;

    public $password;
    /**
     * @param $area_id
     * @param $email
     * @param $role
     * @param $username
     */
    function __construct($area_id, $username, $email, $role)
    {
        $this->area_id = $area_id;
        $this->email = $email;
        $this->role = $role;
        $this->username = $username;
        $this->password = Hash::make('1234');
    }


} 