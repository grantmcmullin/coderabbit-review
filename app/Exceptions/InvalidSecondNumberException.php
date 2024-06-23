<?php

namespace App\Exceptions;

class InvalidSecondNumberException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Second number must be numeric");
    }
}
