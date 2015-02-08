<?php  namespace Aidph\Validators; 

class AreaValidator extends Validator {

    protected static $rules = [
       'name' => 'required',
       'type' => 'required',
       'contact_person' => 'required',
       'contact_no' => 'required',
    ];

} 