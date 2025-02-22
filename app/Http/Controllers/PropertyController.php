<?php

namespace App\Http\Controllers;
use App\Enums\PropertyStatus;
use App\Http\Requests\PatchPropertyRequest;
use App\Http\Requests\PostPropertyRequest;
use App\Models\Property;
use Symfony\Component\HttpFoundation\Response;

class PropertyController extends Controller
{
    public function index(){

        return response()->json(Property::all());
    }

    public function store(PostPropertyRequest $request){

        $property = Property::create($request -> validated());
        // dispatch
        return response()->json($property , Response::HTTP_CREATED);
    }

    public function show (Property $property){

        return response()->json($property);
    }

    public function update(PatchPropertyRequest $request, Property $property)
    {
        $property->update($request->validated());
        return response()->json($property);
    }

    public function destroy(Property $property){

        $property->delete();
        return response()->json(Response::HTTP_NO_CONTENT);
    }

    public function statuses(){
        return response()->json(['statuses' => PropertyStatus::values()]);
    }
}
