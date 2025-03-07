<?php

namespace App\Http\Controllers;

use App\Enums\PropertyStatus;
use App\Http\Requests\PatchPropertyRequest;
use App\Http\Requests\PostPropertyRequest;
use App\Models\Property;
use App\Services\PropertyService;
use Symfony\Component\HttpFoundation\Response;

class PropertyController extends Controller
{
    protected PropertyService $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    public function index()
    {
        return response()->json(Property::all());
    }

    public function store(PostPropertyRequest $request)
    {
        $propertyData = $request->validated();
        $property = $this->propertyService->createProperty($propertyData);

        return response()->json($property, Response::HTTP_CREATED);
    }

    public function show(Property $property)
    {
        return response()->json($property);
    }

    public function update(PatchPropertyRequest $request, Property $property)
    {
        $propertyData = $request->validated();
        $this->propertyService->updateProperty($property, $propertyData);

        return response()->json($property);
    }

    public function destroy(Property $property)
    {
        $this->propertyService->deleteProperty($property);

        return response()->json(Response::HTTP_NO_CONTENT);
    }

    public function statuses()
    {
        return response()->json(['statuses' => PropertyStatus::values()]);
    }
}
