<?php  namespace Aidph\Validators; 

class InfraValidator extends Validator {

    protected static $rules = [
        'name' => 'required',
        'type' => 'required',
        'location' => 'required'
    ];
} 