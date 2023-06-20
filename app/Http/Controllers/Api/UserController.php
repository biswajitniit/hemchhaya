<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function get_user(Request $request){
        try{
            $user = User::where('id',$request->user()->id)->get();
            return response()->json($user,200);
        } catch(Exception $e){
            return response()->json($e->getMessage(),500); 
        }
    }
    public function update_user(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:50|unique:users',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try{
            $user = User::where('id',$request->user()->id)->first();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            if(!$user->save()){
                return ValidationException::withMessages(['error' => 'Something went wrong, please try again!'], 400);
            }
            return response()->json($user,200);
        } catch(Exception $e){
            return response()->json($e->getMessage(),500); 
        }
    }
    public function change_password(Request $request)
    {
        $id = $request->user()->id;

        $validator = Validator::make($request->all(), [
            'old_password' => 'required|min:5',
            'password' => 'required|string|min:5|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::find($id);

        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['errors' => ['old_password' => ['You have entered wrong password!']]], 422);
        }

        $user->password = Hash::make($request->password);

        if ($user->save()) {
            return response()->json(['message' => 'Password changed successfully!'], 200);
        }

        return response()->json(['error', 'Something went wrong, try again later!'], 500);
    }
}
