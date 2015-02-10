<?php  namespace Aidph\Validators; 

use Validator as V;

abstract class Validator {

    protected $errors = [];

    public function isValid(array $attributes)
    {
        $v = V::make($attributes, static::$rules);

        if ($v->fails())
        {
            $this->errors = $v->errors()->getMessages();
            return false;
        }

        return true;
    }


    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

} 