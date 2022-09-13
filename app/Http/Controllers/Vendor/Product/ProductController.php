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
use App\Models\Product_child_variation;
use App\Models\Product_child_variation_item;
use App\Models\Product_with_variation;
use App\Models\Product_with_variation_item;
use App\Models\Product_with_attribute;
use App\Models\Product_with_attribute_item;
use App\Models\Variationitems;
use App\Models\Variations;
use Illuminate\Support\Facades\Auth;

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
            'front_view_image'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000000000000000000000',
        ],[
            'category_id.required'           => 'Please select category',
            'sub_category_id.required'       => 'Please select sub category',
            'sub_category_item_id.required'  => 'Please select sub category item',
            'front_view_image.required'      => 'Please add front view image',
        ]);

        $file = $request->front_view_image;
        $filename = time().'.'.$request->front_view_image->extension();

        $path = Storage::disk('s3')->put("product/large/" . $filename, $file, 'public');
        $path = Storage::disk('s3')->url($path);

    	$product = new Product();
            $product->vendor_id                                                             = Auth::id();
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

            $product->is_variation                                                          = '0';
            $product->is_featured                                                           = $request['is_featured'];
            $product->status                                                                = '1';

		$product->save();

        $productId = $product->id;

        // SAVE DATA FROM Product_child_variation
        if(!empty($request->variation)){
            // SAVE CHILD PRODUCT
            $productChild = new Product();
                $productChild->vendor_id                                                             = Auth::id();
                $productChild->category_id                                                           = $request['category_id'];
                $productChild->sub_category_id                                                       = $request['sub_category_id'];
                $productChild->sub_category_item_id                                                  = $request['sub_category_item_id'];

                $productChild->product_name_slug                                                     = $this->slugify($request['name'],'-');
                $productChild->brand                                                                 = 1;
                $productChild->name                                                                  = $request['name'];

                $productChild->front_view_image                                                      = $path;
                $productChild->back_view_image                                                       = $request['back_view_image'];
                $productChild->side_view_image                                                       = $request['side_view_image'];
                $productChild->open_view_image                                                       = $request['open_view_image'];

                $productChild->sku                                                                   = $request['sku'];
                $productChild->price                                                                 = $request['price'];
                $productChild->sale_price                                                            = $request['sale_price'];
                $productChild->quantity                                                              = $request['quantity'];
                $productChild->allow_customer_checkout_when_this_product_out_of_stock                = $request['allow_customer_checkout_when_this_product_out_of_stock'];

                $productChild->is_variation                                                          = '1';


                $productChild->weight                                                                = $request['weight'];
                $productChild->length                                                                = $request['length'];
                $productChild->breadth                                                               = $request['breadth'];
                $productChild->height                                                                = $request['height'];


                $productChild->is_featured                                                           = $request['is_featured'];
                $productChild->status                                                                = '1';

            $productChild->save();

            $productChildId = $productChild->id;

            $datapcv = new Product_child_variation();
                $datapcv->parent_product_id = $productId;
                $datapcv->child_product_id  = $productChildId;
                $datapcv->is_default        = 1;
            $datapcv->save();
            $datapcvId = $datapcv->id;


            foreach($request->variation as $productchildvariation){
                $datapcvi = new Product_child_variation_item();
                    $datapcvi->product_child_variation_id =   $datapcvId;
                    $datapcvi->variation_item_id          =   $productchildvariation;
                $datapcvi->save();
            }

            // save data from product_with_variations
            $getvariation = Variations::where('category_id',$request['category_id'])->where('sub_category_id',$request['sub_category_id'])->where('sub_category_item_id',$request['sub_category_item_id'])->where('vendor_id',Auth::id())->get();
            if($getvariation){
                foreach($getvariation as $rowvariation){
                    $datapwv = new Product_with_variation();
                        $datapwv->variation_id               =   $rowvariation->id;
                        $datapwv->product_id                 =   $productId;
                        $datapwv->order                      =   0;
                    $datapwv->save();
                }
            }

            // save data from product_with_variation_items
            $getvariationitem = Variationitems::where('category_id',$request['category_id'])->where('sub_category_id',$request['sub_category_id'])->where('sub_category_item_id',$request['sub_category_item_id'])->where('vendor_id',Auth::id())->get();
            if($getvariationitem){
                foreach($getvariationitem as $rowvariationitem){
                    $datapwvi = new Product_with_variation_item();
                        $datapwvi->variation_item_id          =   $rowvariationitem->id;
                        $datapwvi->product_id                 =   $productId;
                    $datapwvi->save();
                }
            }



        }

        return redirect()->back()->with('message', 'Product added successfully.');
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
