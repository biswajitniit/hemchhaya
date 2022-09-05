<?php

namespace App\Http\Controllers\Vendor\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorys;
use App\Models\Subcategory;
use App\Models\Subcategoryitem;
use App\Models\Attribute;
use App\Models\Attributecategory;
use DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;


class ProductController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth:vendor');
    }
    /**
     * Show the vendor product slugify
     *
     * @return \Illuminate\Http\Response
    */
    function slugify($text, string $divider = '-')
    {
      // replace non letter or digits by divider
      $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      // trim
      $text = trim($text, $divider);

      // remove duplicate divider
      $text = preg_replace('~-+~', $divider, $text);

      // lowercase
      $text = strtolower($text);

      if (empty($text)) {
        return 'n-a';
      }

      return $text;
    }

     /**
     * Show the vendor product view page.
     *
     * @return \Illuminate\Http\Response
     */
	public function product_list(Request $request){
		return view("vendor.product.product-list");
	}

    /**
     * Show the vendor add product view page.
     *
     * @return \Illuminate\Http\Response
     */
	public function add_product(Request $request){
         $category = Categorys::where('status','1')->orderBy('category_name')->get();
		return view("vendor.product.add-product",compact('category'));
	}

    public function add_product_post_data(Request $request){



    }


    /**
     * get subcategory list by categoryid
     *
     * @return void
     */
    public function ajax_get_sub_category_on_product_page(Request $request){

        $employees = Subcategory::orderby('sub_category_name','asc')->select('id','sub_category_name')->where('category_id',$request->categoryid)->get();

        $response = array();
        if(count($employees) > 0){
            $response[] = array(
                "id"=>'',
                "text"=>"Select sub category"
            );
            foreach($employees as $employee){
                $response[] = array(
                        "id"=>$employee->id,
                        "text"=>$employee->sub_category_name
                );
            }
        }else{
            $response[] = array(
                "id"=>'',
                "text"=>"No Records Found"
            );
        }

        return response()->json($response);
    }

    /**
     * get subcategory item list by sub category id
     *
     * @return void
     */
    public function ajax_get_sub_category_item_on_product_page(Request $request){

        $employees = Subcategoryitem::orderby('sub_category_item_name','asc')->select('id','sub_category_item_name')->where('sub_category_id',$request->subcategoryid)->get();

        $response = array();
        if(count($employees) > 0){
            $response[] = array(
                "id"=>'',
                "text"=>"Select sub category item"
            );
            foreach($employees as $employee){
                $response[] = array(
                        "id"=>$employee->id,
                        "text"=>$employee->sub_category_item_name
                );
            }
        }else{
            $response[] = array(
                "id"=>'',
                "text"=>"No Records Found"
            );
        }

        return response()->json($response);
    }

    /**
     * get attribute category with attribute data
     *
     * @return void
     */
    public function ajax_get_attributecat_with_attribute_on_product_page(Request $request){

        //echo $request->categoryid.'--'.$request->subcategoryid.'--'.$request->subcategoryitemid;
        $attributecategory = Attributecategory::where('category_id',$request->categoryid)->where('sub_category_id',$request->subcategoryid)->where('sub_category_item_id',$request->subcategoryitemid)->where('status','1')->get();
        foreach($attributecategory as $rowattribute){

           echo '<h6>'.$rowattribute->attribute_category_name.'</h6><hr />';

        }

    }




}
