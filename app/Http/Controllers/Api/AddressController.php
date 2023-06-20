<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Useraddresses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AddressController extends Controller
{
    public function index(Request $request){
        $address = Useraddresses::where('user_id',$request->user()->id)->get();
        return response()->json($address,200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'address_type' => 'required|int',
            'name' => 'required|string',
            'mobile' => 'required|string',
            'pincode' => 'required|string',
            'locality' => 'required|string',
            'address_area_and_street' => 'required|string',
            'city_or_district_or_town' => 'required|string',
            'state' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try{
            $address = Useraddresses::create([
                'user_id'=>$request->user()->id,
                'name'=> $request->name,
                'mobileno'=>$request->mobile,
                'pincode' => $request->pincode,
                'locality' => $request->locality,
                'address_area_and_street'=> $request->address_area_and_street,
                'city_or_district_or_town'=>$request->city_or_district_or_town,
                'state' => $request->state,
                'landmark' => $request->landmark,
                'alternate_phone' => $request->alternate_phone,
            ]);
            if (!$address) {
                throw ValidationException::withMessages(['message' => 'Something went wrong, please try again!'], 400);
            }
            return response()->json(['message'=>'Address saved successfully'],200);
        } catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
    }
}
