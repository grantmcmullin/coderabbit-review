<?php

namespace Tests\Unit\Observers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Observers\CalculationObserver;
use App\Models\Calculation;
use App\Actions\CalculateResult;
use Mockery;

class CalculationObserverTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp(); // This will set up the database
    }

    public function testSavingEventCallsCalculateResult()
    {
        // Creating a fake Calculation instance without saving it to the database
        $calculation = Calculation::factory()->make([
            'first_number' => $this->faker->randomFloat(2, 0, 100),
            'second_number' => $this->faker->randomFloat(2, 0, 100),
            'operator' => '+'
        ]);

        $calculateResultMock = Mockery::mock(CalculateResult::class);
        $calculateResultMock->shouldReceive('execute')
            ->once()
            ->with($calculation)
            ->andReturn($calculation->first_number + $calculation->second_number);

        // Injecting the mocked CalculateResult into the observer
        $observer = new CalculationObserver($calculateResultMock);

        // Simulating the saving event
        $observer->saving($calculation);

        // Asserting that the calculation result is as expected
        $this->assertEquals(
            $calculation->first_number + $calculation->second_number,
            $calculateResultMock->execute($calculation)
        );
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
