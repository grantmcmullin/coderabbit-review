<?php

namespace App\Observers;

use App\Http\Requests\CalculationRequest;
use App\Models\Calculation;

class CalculationObserver
{
    public function saving(Calculation $calculation): void
    {
        app(CalculationRequest::class)->execute($calculation);
    }
}
