<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorys;

class ApiController extends Controller
{
    public function get_categories()
    {
        $categories = Categorys::with('attributes')->with('attributecategories')->with('subcategories')->where('status', 1)->get();
        return response()->json($categories, 200);
    }
}
