<?php

namespace App\Exceptions;

class InvalidFirstNumberException extends \Exception
{
    public function __construct()
    {
        parent::__construct("First number must be numeric");
    }
}
