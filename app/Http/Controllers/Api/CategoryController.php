<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categorys;
use App\Models\Subcategory;
use App\Models\Subcategoryitem;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category_list(Request $request){
        $categories = Subcategoryitem::get();
        return response()->json($categories,200);
    }
}
