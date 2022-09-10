<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categorys;
use App\Models\Subcategory;
use App\Models\Subcategoryitem;
use App\Models\Attribute;
use App\Models\Attributecategory;
use App\Models\Variationitems;
use App\Models\Variations;
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

if (! function_exists('Getattributecategory')) {
    function Getattributecategory($catid,$subcatid,$subcatitemid) {
       return Attributecategory::where('category_id',$catid)->where('sub_category_id',$subcatid)->where('sub_category_item_id',$subcatitemid)->where('status','1')->get();
    }
}

if (! function_exists('Getattributebyattributecategory')) {
    function Getattributebyattributecategory($attributecatid) {
       return Attribute::where('category_id',$attributecatid)->where('status','1')->get();
    }
}
if (! function_exists('GetVariation')) {
    function GetVariation($subcatitemid) {
       return Variations::where('sub_category_item_id',$subcatitemid)->where('status','1')->get();
    }
}

if (! function_exists('GetVariationlistonaddproduct')) {
    function GetVariationlistonaddproduct($catid,$subcatid,$subcatitemid) {
       return Variations::where('category_id',$catid)->where('sub_category_id',$subcatid)->where('sub_category_item_id',$subcatitemid)->where('status','1')->get();
    }
}

if (! function_exists('GetVariationitemlistonaddproduct')) {
    function GetVariationitemlistonaddproduct($catid,$subcatid,$subcatitemid,$variationid) {
       return Variationitems::where('category_id',$catid)->where('sub_category_id',$subcatid)->where('sub_category_item_id',$subcatitemid)->where('variation_id',$variationid)->where('status','1')->get();
    }
}
