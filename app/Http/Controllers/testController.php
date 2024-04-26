<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use function PHPUnit\Framework\isEmpty;

class testController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $response = Profile::all();
        if (!empty($response)) {
            return response()->json($response);
        } else {
            return response()->json(["message" => "data not found"], 404);
        }        
    }
    public function id($id)
    {
        //
        $profiles = Profile::id();
        return response()->json($profiles);
             
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if(!$request->first_name && !$request->last_name){
            return response()->json(['message'=>'Error 404'],404);
        }
        $profile = new Profile();
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $save = $profile->save();
        if($save){
            return response()->json(['message'=>'data saved'],200);
        }else{
            return response()->json(['message'=>'Error 404'],Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $response = Profile::where('id',$id);
        if (!empty($response)) {
            return response()->json($response);
        } else {
            return response()->json(["message" => "data not found"], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
