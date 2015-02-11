<?php  namespace Aidph\Validators; 

class UserValidator extends Validator {

    protected static $rules = [
        'area_id' => 'required|exists:areas,id',
        'username' => 'required|unique:users',
        'password' => 'required',
        'email' => 'unique:users|email|required',
        'role' => 'required|digits_between:1,2'
    ];

}