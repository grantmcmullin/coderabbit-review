<?php

namespace App\Exceptions;

class InvalidOperatorException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Operator must be a string and only +, -, *, / are allowed");
    }
}
