<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_number',
        'second_number',
        'operator',
    ];

    public function calculate() {
        switch ($this->operator) {
            case '+':
                return $this->first_number + $this->second_number;
            case '-':
                return $this->first_number - $this->second_number;
            case '*':
                return $this->first_number * $this->second_number;
            case '/':
                return $this->first_number / $this->second_number;
            default:
                throw new \Exception('Invalid operator');
        }
    }
}
