<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostPropertyRequest;
use App\Models\Property;
use Illuminate\http\Request;
use Illuminate\Support\Facades\Validator;

class PropertyController extends Controller
{
    //showing the data stored in database "Get"
    public function get($id){
        // change it
        $property = Property::findOrFail($id);
        return response()->json($property , 200);
    }

    //Creating the data stored in database "Post"
    public function store(PostPropertyRequest $request){



        //creating a new Property
        $property = new Property($request->all());

//        $property->title -> $title;
//        $property->description -> $description;
//        $property->price -> $price;
//        $property->location -> $location;
//        $property->status -> $status;

        $property->save();

        return response()->json(["Message" => "Property Successfully Created"], 201);
    }

    // Editing a single property
    public function update(){

    }

    // Deleting a single property
    public function destroy(){

    }
}
