<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Useraddresses;
use Exception;
use Faker\Provider\ar_EG\Address;
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
    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'id'=>'required',
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
            $address = Useraddresses::where('id',$request->id)->where('user_id',$request->user()->id)->first();
            if (!$address) {
                throw ValidationException::withMessages(['message' => 'Something went wrong, please try again!'], 400);
            }
            $address->address_type=$request->address_type;
           $address->name=$request->name;
           $address->pincode=$request->pincode;
           $address->mobileno=$request->mobile;
           $address->locality=$request->locality;
           $address->address_area_and_street=$request->address_area_and_street;
           $address->city_or_district_or_town=$request->city_or_district_or_town;
           $address->state=$request->state;
           $address->landmark=$request->landmark;
           $address->alternate_phone=$request->alternate_phone;
           $address->save();
            return response()->json(['message'=>'Address updated successfully'],200);
        } catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
    }
    public function destroy(Request $request, $addressData){
        try{
            $data = Useraddresses::where('id',$addressData)->where('user_id',$request->user()->id)->forceDelete();
            if(!$data){
                return response()->json(["message"=>"Please try later"],200);
            }
            return response()->json(["message"=>"Address deleted successfully"],200);
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
    }
}
