<?php

namespace App\Http\Controllers;
use App\Enums\PropertyStatus;
use App\Events\PropertyCreatedEvent;
use App\Events\PropertyDeletedEvent;
use App\Events\PropertyStatusChangedEvent;
use App\Events\PropertyUpdatedEvent;
use App\Http\Requests\PatchPropertyRequest;
use App\Http\Requests\PostPropertyRequest;
use App\Models\Property;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class PropertyController extends Controller
{
    public function index(){

        return response()->json(Property::all());
    }

    public function store(PostPropertyRequest $request){

        $property = Property::create($request -> validated());
        event(new PropertyCreatedEvent($property));
        return response()->json($property , Response::HTTP_CREATED);
    }

    public function show (Property $property){

        return response()->json($property);
    }

    public function update(PatchPropertyRequest $request, Property $property)
    {
        $oldStatus = $property->status;
        $property->update($request->validated());
        event(new PropertyUpdatedEvent($property));
        event(new PropertyStatusChangedEvent($property , $oldStatus));

        return response()->json($property);
    }

    public function destroy(Property $property){

        $property->delete();
        event(new PropertyDeletedEvent($property));
        return response()->json(Response::HTTP_NO_CONTENT);
    }

    public function statuses(){
        return response()->json(['statuses' => PropertyStatus::values()]);
    }
}
