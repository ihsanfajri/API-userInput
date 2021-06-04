<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    public function get(){
        $data = Person::all();
        return response()->json(
            [
                "message" => "Success Get Data",
                "statusCode" => "200",
                "data" => $data
            ]
            );
    }

    public function getById($id){
        $data = Person::where('id',$id)->get();
        return response()->json(
            [
                "message" => "Success Get Data",
                "statusCode" => "200",
                "data" => $data
            ]
            );
    }

    public function post(Request $request){
        $age = preg_replace('/[^0-9\-]/','',$request->age);
        $age = (int)$age;

        $person = new Person();
        $person->name = strtoupper($request->name);
        $person->age = $age;
        $person->city = strtoupper($request->city);

        $person->save();
        return response()->json(
            [
                "message" => "Success",
                "statusCode" => "201",
                "data" => $person
            ]
            );
    }

    public function put($id,Request $request){
        $person = Person::where('id',$id)->first();
        if($person){
            $age = preg_replace('/[^0-9\-]/','',$request->age);
        $age = (int)$age;
        $person->name = strtoupper($request->name) ? strtoupper($request->name) : $person->name;
        $person->age = $age ? $request->age : $person->age ;
        $person->city = strtoupper($request->city) ? strtoupper($request->city) : $person->city;

        $person->save();
            return response()->json(
                [
                    "message" => "Success Update Data",
                    "statusCode" => "200",
                    "data" => $person
                ]
                );
        }
        return response()->json(
            [
                "message" => "failed, data with id " . $id . " not found",
                "statusCode" => "400" 
            ]
        );
        
    }

    public function delete($id){
        $person = Person::where('id',$id)->first();
        if($person){
            $person->delete();
            return response()->json(
                [
                    "message" => "Success Delete Data",
                    "statusCode" => "200"
                ]
                );    
        }
        return response()->json(
            [
                "message" => "failed, data with id " . $id . " not found",
                "statusCode" => "400"
            ]
            );
    }
}
