<?php  namespace Aidph\Validators; 

class PersonValidator extends Validator{

    protected static $rules = [
        'hh_id' => 'exists:household',
        'f_name' => 'required|min:50',
        'l_name' => 'required|min:50',
        'm_name' => 'required|min:50',
        'b_date' => 'required|date_format:Y-m-d',
        'address' => 'required|max:100',
        'sex' => 'required|min:6',
        'pwd' => 'required|min:1'
    ];


}

