<?php

namespace Tests\Unit\Actions;

use App\Actions\CalculateResult;
use App\Models\Calculation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CalculateResultTest extends TestCase
{
    use RefreshDatabase;

    public function testAddition()
    {
        $calculation = new Calculation(['first_number' => 5, 'second_number' => 3, 'operator' => '+']);
        $this->assertEquals(8, app(CalculateResult::class)->execute($calculation));
    }

    public function testSubtraction()
    {
        $calculation = new Calculation(['first_number' => 5, 'second_number' => 3, 'operator' => '-']);
        $this->assertEquals(2, app(CalculateResult::class)->execute($calculation));
    }

    public function testMultiplication()
    {
        $calculation = new Calculation(['first_number' => 5, 'second_number' => 3, 'operator' => '*']);
        $this->assertEquals(15, app(CalculateResult::class)->execute($calculation));
    }

    public function testDivision()
    {
        $calculation = new Calculation(['first_number' => 10, 'second_number' => 2, 'operator' => '/']);
        $this->assertEquals(5, app(CalculateResult::class)->execute($calculation));
    }

    public function testDivisionByZero()
    {
        $calculation = new Calculation(['first_number' => 10, 'second_number' => 0, 'operator' => '/']);
        $this->expectException(\DivisionByZeroError::class);
        app(CalculateResult::class)->execute($calculation);
    }

    public function testNegativeNumbers()
    {
        $calculation = new Calculation(['first_number' => -5, 'second_number' => -3, 'operator' => '*']);
        $this->assertEquals(15, app(CalculateResult::class)->execute($calculation));
    }
}
