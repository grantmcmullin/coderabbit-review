<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculationRequest;
use App\Http\Resources\CalculationResource;
use App\Models\Calculation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CalculationController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Calculation::class);

        return CalculationResource::collection(Calculation::all());
    }

    public function store(CalculationRequest $request)
    {
        $this->authorize('create', Calculation::class);

        return new CalculationResource(Calculation::create($request->validated()));
    }

    public function show(Calculation $calculation)
    {
        $this->authorize('view', $calculation);

        return new CalculationResource($calculation);
    }

    public function update(CalculationRequest $request, Calculation $calculation)
    {
        $this->authorize('update', $calculation);

        $calculation->update($request->validated());

        return new CalculationResource($calculation);
    }

    public function destroy(Calculation $calculation)
    {
        $this->authorize('delete', $calculation);

        $calculation->delete();

        return response()->json();
    }
}
