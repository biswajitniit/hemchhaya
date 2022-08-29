<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categorys;
use App\Models\Subcategory;
use App\Models\Subcategoryitem;



if (! function_exists('GetSubcategoryBycatid')) {
    function GetSubcategoryBycatid($categoryid) {
       // DB::enableQueryLog(); // Enable query log
       return Subcategory::where('status', '1')->where('category_id',$categoryid)->orderBy('sub_category_name')->get();
        //dd(DB::getQueryLog()); // Show results of log
    }
}

if (! function_exists('GetSubcategoryitemBysubcatid')) {
    function GetSubcategoryitemBysubcatid($subcategoryid) {
       return Subcategoryitem::where('status', '1')->where('sub_category_id',$subcategoryid)->orderBy('sub_category_item_name')->get();
    }
}

