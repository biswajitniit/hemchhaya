<?php

namespace App\Http\Controllers\Vendor\Variationitems;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorys;
use App\Models\Subcategory;
use App\Models\Subcategoryitem;
use App\Models\Attribute;
use App\Models\Attributecategory;
use App\Models\Variations;
use DataTables;
use App\Models\Variationitems;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use DB;
class VariationitemsController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth:vendor');
    }

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
     * get getvariation
     *
     * @return void
     */
    public function ajax_getvariation(Request $request){

        $employees = Variations::orderby('variation_name')->select('id','variation_name')->where('sub_category_item_id',Crypt::decryptString($request->subcategoryitemid))->get();

        $response = array();
        if(count($employees) > 0){
            $response[] = array(
                "id"=>'',
                "text"=>"Select Variation"
            );
            foreach($employees as $employee){
            $response[] = array(
                    "id"=>Crypt::encryptString($employee->id),
                    "text"=>$employee->variation_name
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
     * get getvariation
     *
     * @return void
     */
    public function ajax_getvariationBysubcategoryitem(Request $request){

        $employees = Variations::orderby('variation_name')->select('id','variation_name')->where('sub_category_item_id',$request->subcategoryitemid)->orderBy('variation_name')->get();

        $response = array();
        if(count($employees) > 0){
            $response[] = array(
                "id"=>'',
                "text"=>"Select Variation"
            );
            foreach($employees as $employee){
            $response[] = array(
                    "id"=>$employee->id,
                    "text"=>$employee->variation_name
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
     * Show the Admin Variationitems List Page.
     *
     * @return \Illuminate\Http\Response
     */
	public function variationitem_list(Request $request){
        $category = Categorys::where('status','1')->orderBy('category_name')->get();
		return view("vendor.variationitems.variationitem-list",compact('category'));
	}

    /**
     * Show the Admin Variationitems List Page.
     *
     * @return \Illuminate\Http\Response
     */
	public function variationitemlistdata(Request $request){
        $category = Categorys::where('status','1')->orderBy('category_name')->get();
		return view("vendor.variationitems.variationitem-list-search",compact('category'));
	}

    /**
     * Show the add Variation items view page.
     *
     * @return \Illuminate\Http\Response
     */
	public function add_variationitem(Request $request){
        $category = Categorys::where('status','1')->orderBy('category_name')->get();
		return view("vendor.variationitems.add-variationitem",compact('category'));
	}

  /**
     * Save ariation items post data.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_variationitem_post_data(Request $request){
        //echo "<pre>"; print_r($_POST); die;
        $this->validate($request, [
            'category_id'           => 'required',
            'sub_category_id'       => 'required',
            'sub_category_item_id'  => 'required',
            'variation_id'          => 'required',
            'variation_item_name'   => 'required',
        ],[
            'category_id.required'           => 'Please select category',
            'sub_category_id.required'       => 'Please select sub category',
            'sub_category_item_id.required'  => 'Please select sub category item',
            'variation_id.required'          => 'Please select variation',
            'variation_item_name.required'   => 'Please enter variation item name',
        ]);

    	$variationitems = new Variationitems();
            $variationitems->category_id             = $request['category_id'];
            $variationitems->sub_category_id         = $request['sub_category_id'];
            $variationitems->sub_category_item_id    = $request['sub_category_item_id'];
            $variationitems->variation_id            = $request['variation_id'];
            $variationitems->variation_item_name     = $request['variation_item_name'];
            $variationitems->column_slug             = $this->slugify($request['variation_item_name'],'-');
            $variationitems->color                   = $request['color'];
            //$variationitems->image                   = $request['column_type'];
            $variationitems->status                  = $request['status'];
		$variationitems->save();

        return redirect()->back()->with('message', 'Variation Item added successfully.');
    }


    /**
     * Edit variation item view page
     *
     * @return true or false
     */
    public function edit_variationitem(Request $request, $variationitemid){
        $category = Categorys::where('status','1')->orderBy('category_name')->get();
        $variationitem = Variationitems::where('id',$variationitemid)->first();
        return view('vendor.variationitems.edit-variationitem',compact('category','variationitem'));
    }


   /**
     * Edit variation item after post
     *
     * @return true or false
     */
    public function edit_variationitem_post(Request $request){

        $this->validate($request, [
            'category_id'           => 'required',
            'sub_category_id'       => 'required',
            'sub_category_item_id'  => 'required',
            'variation_id'          => 'required',
            'variation_item_name'   => 'required',
        ],[
            'category_id.required'           => 'Please select category',
            'sub_category_id.required'       => 'Please select sub category',
            'sub_category_item_id.required'  => 'Please select sub category item',
            'variation_id.required'          => 'Please select variation',
            'variation_item_name.required'   => 'Please enter variation item name',
        ]);

        $data = array(
            'category_id'              => $request['category_id'],
            'sub_category_id'          => $request['sub_category_id'],
            'sub_category_item_id'     => $request['sub_category_item_id'],
            'variation_id'             => $request['variation_id'],
            'variation_item_name'      => $request['variation_item_name'],
            'column_slug'              => $this->slugify($request['variation_item_name'],'-'),
            'color'                    => $request['color'],
            'status'                   => $request['status']
        );

        Variationitems::where('id', $request['variationitemid'])->update($data);
        return redirect()->back()->with('message', 'Variation item updated successfully.');
    }

    /**
     * Soft delets
     *
     * @return \Illuminate\Http\Response
     */
    public function attributetrash(Request $request, $attributeid){
        Attribute::where('id',$attributeid)->delete();
        return redirect()->back()->with('message', 'Attribute deleted successfully.');
    }


   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchvariationitemlist_list_ajax(Request $request){
		//DB::enableQueryLog();
		//echo $request->categoryid; die;
        $query=Variationitems::where('category_id',$request->categoryid)->where('sub_category_id',$request->subcategoryid)->where('sub_category_item_id',$request->subcategoryitemid)->where('variation_id',$request->variationid)->orderby('created_at','desc')->get();
       //$quries = DB::getQueryLog();
	   //dd($quries);die;

	    $totalData =count($query);
        $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
        return Datatables::of($query)
        ->addColumn('variation_item_name', function ($query) {
            return $query->variation_item_name;
        })

        ->addColumn('status', function ($query) {
            if($query->status==1){
                $mstatus='Active';
            }else{
                $mstatus='InActive';
            }
            return $mstatus;
        })
        ->addColumn('action', function ($query) {
            return $query->id;
        })->rawColumns(['action'])
        ->make('true');


    }

}
