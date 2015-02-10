<?php  namespace Aidph\Validators; 

use Exception;

class ValidationException extends Exception {

    protected $errors;

    function __construct($message, array $errors, $code = 0, Exception $previous = null)
    {
        $this->errors = $errors;

        parent::__construct($message, $code, $previous);
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}