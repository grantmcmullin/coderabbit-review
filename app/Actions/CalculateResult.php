<?php

namespace App\Actions;

use App\Models\Calculation;
use DivisionByZeroError;

class CalculateResult
{
    public function execute(Calculation $calculation): ?float
    {
        if (!is_numeric($calculation->first_number)) {
            throw new \Exception("First number must be numeric");
        };

        if (!is_numeric($calculation->second_number)) {
            throw new \Exception("Second number must be numeric");
        };

        if (!is_string($calculation->operator)) {
            throw new \Exception("Operator must be a string");
        };

        return $this->calculate($calculation->first_number, $calculation->second_number, $calculation->operator);
    }

    public function calculate(float $first_number, float $second_number, string $operator): ?float
    {
        switch ($operator) {
            case '+':
                return $first_number + $second_number;
            case '-':
                return $first_number - $second_number;
            case '*':
                return $first_number * $second_number;
            case '/':
                return $second_number != 0 ? $first_number / $second_number : throw new DivisionByZeroError();
            default:
                throw new \Exception("Invalid operator");
        }
    }
}
