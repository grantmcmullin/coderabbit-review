<?php

namespace Tests\Unit\Policies;

use App\Models\Calculation;
use App\Models\User;
use App\Policies\CalculationPolicy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CalculationPolicyTest extends TestCase
{
    use RefreshDatabase;

    public function testViewAny()
    {
        $user = User::factory()->make();
        $policy = new CalculationPolicy();
        $this->assertTrue($policy->viewAny($user));
    }

    public function testView()
    {
        $user = User::factory()->make();
        $calculation = Calculation::factory()->make();
        $policy = new CalculationPolicy();
        $this->assertTrue($policy->view($user, $calculation));
    }

    public function testCreate()
    {
        $user = User::factory()->make();
        $policy = new CalculationPolicy();
        $this->assertTrue($policy->create($user));
    }

    public function testUpdate()
    {
        $user = User::factory()->make();
        $calculation = Calculation::factory()->make();
        $policy = new CalculationPolicy();
        $this->assertTrue($policy->update($user, $calculation));
    }

    public function testDelete()
    {
        $user = User::factory()->make();
        $calculation = Calculation::factory()->make();
        $policy = new CalculationPolicy();
        $this->assertTrue($policy->delete($user, $calculation));
    }

    public function testRestore()
    {
        $user = User::factory()->make();
        $calculation = Calculation::factory()->make();
        $policy = new CalculationPolicy();
        $this->assertTrue($policy->restore($user, $calculation));
    }

    public function testForceDelete()
    {
        $user = User::factory()->make();
        $calculation = Calculation::factory()->make();
        $policy = new CalculationPolicy();
        $this->assertTrue($policy->forceDelete($user, $calculation));
    }
}
