<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categorys;
use App\Models\Subcategory;
use App\Models\Subcategoryitem;
use App\Models\Attribute;
use App\Models\Attributecategory;
use App\Models\Brand;
use App\Models\Variationitems;
use App\Models\Variations;
use App\Models\Product_image;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Crypt;

if (! function_exists('create_slug')) {
    function create_slug($string) {
		  $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		  return strtolower($slug);
    }
}

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
       return Attribute::where('attribute_category_id',$attributecatid)->where('status','1')->get();
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
if (! function_exists('Get_Category_List_Menu')) {
    function Get_Category_List_Menu() {
       return Categorys::where('status','1')->get();
    }
}

if (! function_exists('Get_Sub_Category_List_Menu')) {
    function Get_Sub_Category_List_Menu($categoryid) {
        return Subcategory::where('category_id',$categoryid)->where('status', '1')->orderBy('sub_category_sort_no')->get();
    }
}

if (! function_exists('Get_Sub_Category_Item_List_Menu')) {
    function Get_Sub_Category_Item_List_Menu($subcategoryid) {
       return Subcategoryitem::where('status', '1')->where('sub_category_id',$subcategoryid)->orderBy('sub_category_item_name')->get();
    }
}


// if (! function_exists('Get_active_menu_show_in_header')) {
//     function Get_active_menu_show_in_header() {
//        return Categorys::where('menu_show_in_header','1')->where('status','1')->get();
//     }
// }

if (! function_exists('Get_active_menu_show_in_header')) {
    function Get_active_menu_show_in_header() {
      // return Subcategoryitem::where('menu_show_in_header','1')->where('status','1')->get();
      return Subcategoryitem::whereIn('id',['1','2','3','4','5','6','7'])->where('status','1')->get();
    }
}


if (! function_exists('GetAllActiveBrandList')) {
    function GetAllActiveBrandList($catid,$subcatid,$subcatitemid) {
       return Brand::where('category_id',$catid)->where('sub_category_id',$subcatid)->where('sub_category_item_id',$subcatitemid)->where('status','1')->get();
    }
}

if (! function_exists('Get_Variation_item_Name')) {
    function Get_Variation_item_Name($id) {
       return Variationitems::where('id',$id)->first()->variation_item_name;
    }
}

if (! function_exists('GetProductBrand')) {
    function GetProductBrand($bid) {
       return Brand::where('id',$bid)->first()->brand_name;
    }
}

if (! function_exists('Get_Attribute_Name')) {
    function Get_Attribute_Name($attributeid) {
       return Attributecategory::where('id',$attributeid)->first()->attribute_category_name;
    }
}

if (! function_exists('Get_attribute_item_name')) {
    function Get_attribute_item_name($attributeitemid) {
       return Attribute::where('id',$attributeitemid)->first()->column_name;
    }
}

if (! function_exists('Get_session_user_cart_info')) {
    function Get_session_user_cart_info($userid) {
       return Cart::where('user_id',$userid)->get();
    }
}

if (! function_exists('Getimageurllarge')) {
    function Getimageurllarge($productid) {
      // DB::enableQueryLog(); // Enable query log
       return Product_image::where('product_id',$productid)->where('image_size','large')->where('image_category','front_view_image')->first()->image_url;
      // dd(DB::getQueryLog()); // Show results of log
    }
}

if (! function_exists('Checkuseralreadyaddedtocart')) {
    function Checkuseralreadyaddedtocart($userid,$productid) {
      // DB::enableQueryLog(); // Enable query log
       return Cart::where('user_id',$userid)->where('product_id',$productid)->count();
      // dd(DB::getQueryLog()); // Show results of log
    }
}

if (! function_exists('GetCourierServiceability')) {
    function GetCourierServiceability() {

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/courier/serviceability/',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_POSTFIELDS =>'{
          "pickup_postcode": "713216",
          "delivery_postcode": "721447",
          "order_id": "",
          "cod": "1",
          "weight": "1",
          "length": "",
          "breadth": "",
          "declared_value": "",
          "mode": "Surface",
          "couriers_type": "",
          "only_local": ""
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMwNjQ0OTgsImlzcyI6Imh0dHBzOi8vYXBpdjIuc2hpcHJvY2tldC5pbi92MS9leHRlcm5hbC9hdXRoL2xvZ2luIiwiaWF0IjoxNjg2MDUwMjY2LCJleHAiOjE2ODY5MTQyNjYsIm5iZiI6MTY4NjA1MDI2NiwianRpIjoiRG5JSkdFem5zMjZtWG5JWCJ9.6e94-skdCUxv5eBXm53CmEtgbeYa0ACcy7PiheT_5Q0'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }
}

if (! function_exists('ViewProductDetails')) {
    function ViewProductDetails($productid) {
       $product = Product::where('id',$productid)->first();
       return url('/view-product-details?pid='.Crypt::encryptString($product->id).'&cid='.Crypt::encryptString($product->category_id).'&scid='.Crypt::encryptString($product->sub_category_id).'&scitemid='.Crypt::encryptString($product->sub_category_item_id));
    }
}
