<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categorys;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category_list(Request $request){
        if(!empty($request->category_id)){
            $sub_categories = Subcategory::where("category_id","=",$request->category_id)->get();
            return response()->json($sub_categories,200);
        }
        $categories = Categorys::get();
        return response()->json($categories,200);
    }
}
