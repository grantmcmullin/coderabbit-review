<?php

namespace Database\Factories;

use App\Models\Calculation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CalculationFactory extends Factory
{
    protected $model = Calculation::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'first_number' => $this->faker->randomNumber(),
            'second_number' => $this->faker->randomNumber(),
            'operator' => $this->faker->randomElement(['+', '-', '*', '/'])
        ];
    }
}
