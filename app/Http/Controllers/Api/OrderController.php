<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function create_single_order(Request $request){
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try{

        } catch(Exception $e){
            return response()->json(["error"=>$e->getMessage()],500);
        }
    }
}
