<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Calculation;
use App\Models\User;

class CalculationControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testCreateCalculation()
    {
        $user = User::factory()->create();
        $data = [
            'first_number' => fake()->randomFloat(2, 0, 100),
            'second_number' => fake()->randomFloat(2, 0, 100),
            'operator' => fake()->randomElement(['+', '-', '*', '/'])
        ];

        $response = $this->actingAs($user)->postJson("/calculations", $data);

        $response->assertStatus(201)
            ->assertJsonFragment($data);
    }

    public function testUpdateCalculation()
    {
        $user = User::factory()->create();
        $calculation = Calculation::factory()->create();

        $response = $this->actingAs($user)->putJson("/calculations/{$calculation->id}", [
            'first_number' => 10,
            'second_number' => 5,
            'operator' => '+'
        ]);

        $calculation->fresh();

        $response->assertStatus(200)
            ->assertJsonPath('data', [
                'id' => $calculation->id,
                'first_number' => 10,
                'second_number' => 5,
                'operator' => '+',
                'result' => 15, // Assuming the operation is successful and addition is performed
                'created_at' => $calculation->created_at->toIsoString(),
                'updated_at' => $calculation->updated_at->toIsoString(),
            ]);
    }

    public function testGetCalculation()
    {
        $user = User::factory()->create();
        $calculation = Calculation::factory()->create();

        $response = $this->actingAs($user)->getJson("/calculations/{$calculation->id}");

        $response->assertStatus(200)
            ->assertJsonFragment([
                'id' => $calculation->id,
                'first_number' => $calculation->first_number,
                'second_number' => $calculation->second_number,
                'operator' => $calculation->operator,
                'result' => $calculation->calculate()
            ]);
    }

    public function testGetAllCalculations()
    {
        $user = User::factory()->create();
        Calculation::factory()->count(5)->create();

        $response = $this->actingAs($user)->getJson("/calculations");

        $response->assertStatus(200)
            ->assertJsonCount(5, 'data');
    }

    public function testDeleteCalculation()
    {
        $user = User::factory()->create();
        $calculation = Calculation::factory()->create();

        $response = $this->actingAs($user)->deleteJson("/calculations/{$calculation->id}");

        $response->assertStatus(204);
    }
}
