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
use Embed;
use Illuminate\Support\Facades\DB;

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
     * Show the vendor add product category view page.
     *
     * @return \Illuminate\Http\Response
     */
	public function add_product_category(Request $request){
        $category = Categorys::where('status','1')->orderBy('category_name')->get();
       return view("vendor.product.add-product-category",compact('category'));
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

    /**
     * Get the attribute id
     *
     * @return \Illuminate\Http\Response
     */
    public function Get_attribute_category_id($id){
        return Attribute::where('id',$id)->first()->attribute_category_id;
    }

    /**
     * Add products post data
     *
     * @return \Illuminate\Http\Response
     */
    public function add_product_post_data(Request $request){

        //echo "<pre>"; print_r($request->attribute); die;
        $this->validate($request, [
            'front_view_image'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000000000000000000000',
        ],[
            'front_view_image.required'      => 'Please add front view image',
        ]);





        if($request->front_view_image){
            $file_front_view_image = $request->front_view_image;
            $filename_front_view_image = time().'.'.$request->front_view_image->extension();

            $path_front_view_image = Storage::disk('s3')->put("product/large/" . $filename_front_view_image, $file_front_view_image, 'public');
            $path_front_view_image = Storage::disk('s3')->url($path_front_view_image);
        }else{
            $filename_front_view_image = '';
            $path_front_view_image = '';
        }

        if($request->back_view_image){
            $file_back_view_image = $request->back_view_image;
            $filename_back_view_image = time().'.'.$request->back_view_image->extension();

            $path_back_view_image = Storage::disk('s3')->put("product/large/" . $filename_back_view_image, $file_back_view_image, 'public');
            $path_back_view_image = Storage::disk('s3')->url($path_back_view_image);
        }else{
            $filename_back_view_image ='';
            $path_back_view_image = '';
        }

        if($request->side_view_image){
            $file_side_view_image = $request->side_view_image;
            $filename_side_view_image = time().'.'.$request->side_view_image->extension();

            $path_side_view_image = Storage::disk('s3')->put("product/large/" . $filename_side_view_image, $file_side_view_image, 'public');
            $path_side_view_image = Storage::disk('s3')->url($path_side_view_image);
        }else{
            $filename_side_view_image = '';
            $path_side_view_image = '';
        }

        if($request->open_view_image){
            $file_open_view_image = $request->open_view_image;
            $filename_open_view_image = time().'.'.$request->open_view_image->extension();

            $path_open_view_image = Storage::disk('s3')->put("product/large/" . $filename_open_view_image, $file_open_view_image, 'public');
            $path_open_view_image = Storage::disk('s3')->url($path_open_view_image);
        }else{
            $filename_open_view_image = '';
            $path_open_view_image = '';
        }

        if($request->video_link){
            $embed = Embed::make($request->video_link)->parseUrl();
            if ($embed) {
                // Set width of the embed.
                $embed->setAttribute(['width' => 600]);

                // Print html: '<iframe width="600" height="338" src="//www.youtube.com/embed/uifYHNyH-jA" frameborder="0" allowfullscreen></iframe>'.
                // Height will be set automatically based on provider width/height ratio.
                // Height could be set explicitly via setAttr() method.
                //echo $embed->getHtml();
                $videolink = $embed->getHtml();
            }
        }else{
            $videolink = "";
        }

        if($request->product_pdf){
            $file_product_pdf = $request->product_pdf;
            $filename_product_pdf = time().'.'.$request->product_pdf->extension();

            $path_product_pdf = Storage::disk('s3')->put("product/pdf/" . $filename_product_pdf, $file_product_pdf, 'public');
            $path_product_pdf = Storage::disk('s3')->url($path_product_pdf);
        }else{
            $filename_product_pdf = '';
            $path_product_pdf = "";
        }



    	$product = new Product();
            $product->vendor_id                                                             = Auth::id();
            $product->category_id                                                           = $request['category_id'];
            $product->sub_category_id                                                       = $request['sub_category_id'];
            $product->sub_category_item_id                                                  = $request['sub_category_item_id'];

            $product->product_name_slug                                                     = $this->slugify($request['name'],'-');
            $product->brand                                                                 = 1;
            $product->name                                                                  = $request['name'];
            $product->highlights                                                            = $request['highlights'];
            $product->description                                                           = $request['description'];

            $product->front_view_image_name                                                 = $filename_front_view_image;
            $product->back_view_image_name                                                  = $filename_back_view_image;
            $product->side_view_image_name                                                  = $filename_side_view_image;
            $product->open_view_image_name                                                  = $filename_open_view_image;

            $product->front_view_image                                                      = $path_front_view_image;
            $product->back_view_image                                                       = $path_back_view_image;
            $product->side_view_image                                                       = $path_side_view_image;
            $product->open_view_image                                                       = $path_open_view_image;

            $product->video_link                                                            = $videolink;

            $product->product_pdf_name                                                      = $filename_product_pdf;
            $product->product_pdf                                                           = $path_product_pdf;

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

        Product::where('id',$productId)->update(array('is_this_parent_product' => 1, 'parent_product_id' => $productId));


        // SAVE DATA FROM Product_child_variation
        if(!empty($request->variation)){
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
                // foreach($getvariationitem as $rowvariationitem){
                //     $datapwvi = new Product_with_variation_item();
                //         $datapwvi->variation_item_id          =   $rowvariationitem->id;
                //         $datapwvi->product_id                 =   $productId;
                //     $datapwvi->save();
                // }

                foreach($getvariationitem as $key => $value){

                    // if ( ! isset($request->variation[$key])) {
                    //     $isselected = 0;
                    // }else{
                    //     $isselected = 1;
                    // }

                    $datapwvi = new Product_with_variation_item();
                        $datapwvi->variation_item_id          =   $value->id;
                        $datapwvi->is_selected                =   '0';
                        $datapwvi->product_id                 =   $productId;
                    $datapwvi->save();
                }

            }

        }


        // save data from product_with_attributes
        if(!empty($request->attribute)){
            foreach($request->attribute as $productchild_attribute){
                $datapwiattributr = new Product_with_attribute();
                    $datapwiattributr->attribute_id               =   $productchild_attribute;
                    $datapwiattributr->product_id                 =   $productId;
                    $datapwiattributr->order                      =   '0';
                $datapwiattributr->save();
            }
        }

        // save data from product_with_attributes
        if(!empty($request->attributeitem)){
            foreach($request->attributeitem as $key => $value){
                // Save Data FROM product_with_attribute_items
                $data_attribute_item = new Product_with_attribute_item();
                    $data_attribute_item->product_id                 =   $productId;
                    $data_attribute_item->attribute_id               =   $this->Get_attribute_category_id($key);
                    $data_attribute_item->attribute_item_id          =   $key;
                    $data_attribute_item->attribute_item_value       =   $value;
                $data_attribute_item->save();
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

    /**
     * get vendor inventory list
     *
     * @return void
     */
    public function getvendorproductlistdata (Request $request){


        //$query = Product::get();
        \DB::statement("SET SQL_MODE=''");//this is the trick use it just before your query
        $query = Product::with('categorys','subcategory','subcategoryitem','vendors','productchildveriation','productchildveriationitem','productwithvariation','productwithvariationitem','productwithattribute','productwithattributeitem')->where('products.vendor_id',Auth::user()->id)->get();


	    $totalData =count($query);
        $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
        return Datatables::of($query)
        ->addColumn('category_name', function ($query) {
            return $query->categorys->category_name;
        })
        ->addColumn('sub_category_name', function ($query) {
            return $query->subcategory->sub_category_name;
        })
        ->addColumn('sub_category_item_name', function ($query) {
            return $query->Subcategoryitem->sub_category_item_name;
        })
        ->addColumn('product_info', function ($query) {
            return array('frontimage'=>$query->front_view_image,'name'=>$query->name,'skuid'=>$query->sku);
           //return array('frontimage'=>$query->front_view_image);
        })
        // ->addColumn('status', function ($query) {
        //     if($query->status==1){
        //         $mstatus='Active';
        //     }else{
        //         $mstatus='InActive';
        //     }
        //     return $mstatus;
        // })
        ->addColumn('action', function ($query) {
            return array('pid'=>$query->id,'catid'=>$query->category_id,'subcatid'=>$query->sub_category_id,'subcatitemid'=>$query->sub_category_id);
        })->rawColumns(['action'])
        ->make('true');


    }




}
