<?php

namespace App\Http\Controllers\Vendor\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorys;
use App\Models\Subcategory;
use App\Models\Subcategoryitem;
use App\Models\Attribute;
use App\Models\Attributecategory;
use App\Models\Product;
use DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Storage;


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

        $this->validate($request, [
            'category_id'           => 'required',
            'sub_category_id'       => 'required',
            'sub_category_item_id'  => 'required',
            'front_view_image'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'category_id.required'           => 'Please select category',
            'sub_category_id.required'       => 'Please select sub category',
            'sub_category_item_id.required'  => 'Please select sub category item',
            'front_view_image.required'      => 'Please add front view image',
        ]);


        $imageName = time().'.'.$request->front_view_image->extension();

        $path = Storage::disk('s3')->put('product/large/', $request->front_view_image);
        $path = Storage::disk('s3')->url($path);


    	$product = new Product();
            $product->vendor_id                                                             = 1;
            $product->category_id                                                           = $request['category_id'];
            $product->sub_category_id                                                       = $request['sub_category_id'];
            $product->sub_category_item_id                                                  = $request['sub_category_item_id'];

            $product->product_name_slug                                                     = $this->slugify($request['product_name_slug'],'-');
            $product->brand                                                                 = 1;
            $product->name                                                                  = $request['name'];
            $product->highlights                                                            = $request['highlights'];
            $product->description                                                           = $request['description'];

            $product->front_view_image                                                      = $path;
            $product->back_view_image                                                       = $request['back_view_image'];
            $product->side_view_image                                                       = $request['side_view_image'];
            $product->open_view_image                                                       = $request['open_view_image'];

            $product->sku                                                                   = $request['sku'];
            $product->price                                                                 = $request['price'];
            $product->sale_price                                                            = $request['sale_price'];
            $product->quantity                                                              = $request['quantity'];
            $product->allow_customer_checkout_when_this_product_out_of_stock                = $request['allow_customer_checkout_when_this_product_out_of_stock'];

            $product->weight                                                                = $request['weight'];
            $product->length                                                                = $request['length'];
            $product->breadth                                                               = $request['breadth'];
            $product->height                                                                = $request['height'];

            $product->country_of_origin                                                     = $request['country_of_origin'];
            $product->manufacture_details                                                   = $request['manufacture_details'];
            $product->packer_details                                                        = $request['packer_details'];

            $product->search_keywords                                                       = $request['search_keywords'];
            $product->meta_title                                                            = $request['meta_title'];
            $product->meta_keywords                                                         = $request['meta_keywords'];
            $product->meta_description                                                      = $request['meta_description'];


            $product->is_featured                                                           = $request['is_featured'];
            $product->status                                                                = 1;

		$product->save();

        return redirect()->back()->with('message', 'Variation Item added successfully.');

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
