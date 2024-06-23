<?php

namespace App\Observers;

use App\Actions\CalculateResult;
use App\Models\Calculation;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CalculationObserver
{
    use RefreshDatabase;
    public function saving(Calculation $calculation): void
    {
        $calculation->result = app(CalculateResult::class)->execute($calculation);
    }
}
