<?php

namespace App\Http\Controllers\Admin\Variations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorys;
use App\Models\Subcategory;
use App\Models\Subcategoryitem;
use App\Models\Attributecategory;
use App\Models\Variations;
use DataTables;

class VariationsController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth:admin');
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
     * Show the admin variations list page.
     *
     * @return \Illuminate\Http\Response
     */
	public function variation_list(Request $request){
        $category = Categorys::where('status','1')->orderBy('category_name')->get();
		return view("admin.variation.variation-list",compact('category'));
	}

    /**
     * Show the add variations view page.
     *
     * @return \Illuminate\Http\Response
     */
	public function add_variation(Request $request){
        $category = Categorys::where('status','1')->orderBy('category_name')->get();
		return view("admin.variation.add-variation",compact('category'));
	}
  /**
     * Save attribute post data.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_variation_post_data(Request $request){
        $this->validate($request, [
            'category_id'          => 'required',
            'sub_category_id'      => 'required',
            'sub_category_item_id' => 'required',
            'variation_name'       => 'required',

        ],[
            'category_id.required' => 'Please select category',
            'sub_category_id.required' => 'Please select sub category',
            'sub_category_item_id.required' => 'Please select sub category item',
            'variation_name.required' => 'Please enter variation name',
        ]);

    	$variations = new Variations();
            $variations->category_id             = $request['category_id'];
            $variations->sub_category_id         = $request['sub_category_id'];
            $variations->sub_category_item_id    = $request['sub_category_item_id'];
            $variations->variation_name          = $request['variation_name'];
            $variations->column_slug             = $this->slugify($request['variation_name'],'_');
            $variations->status                  = $request['status'];
		$variations->save();

        return redirect()->back()->with('message', 'Variation added successfully.');
    }

    /**
     * Edit variation view page.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_variation(Request $request, $variationid){
        $category = Categorys::where('status','1')->orderBy('category_name')->get();
        $variation = Variations::where('id',$variationid)->first();
        return view('admin.variation.edit-variation',compact('category','variation'));
    }

    /**
     * Edit variation post view page.
     *
     * @return \Illuminate\Http\Response
    */
    public function edit_variation_post(Request $request){
        $this->validate($request, [
            'category_id'          => 'required',
            'sub_category_id'      => 'required',
            'sub_category_item_id' => 'required',
            'variation_name'       => 'required',

        ],[
            'category_id.required' => 'Please select category',
            'sub_category_id.required' => 'Please select sub category',
            'sub_category_item_id.required' => 'Please select sub category item',
            'variation_name.required' => 'Please enter variation name',
        ]);

        $data = array(
            'category_id'               => $request['category_id'],
            'sub_category_id'           => $request['sub_category_id'],
            'sub_category_item_id'      => $request['sub_category_item_id'],
            'variation_name'            => $request['variation_name'],
            'column_slug'               => $this->slugify($request['variation_name'],'_'),
            'status'                    => $request['status']
        );

        Variations::where('id', $request['variationid'])->update($data);

        return redirect()->back()->with('message', 'Variation updated successfully.');
    }

    /**
     * Soft delets attribute category
     *
     * @return \Illuminate\Http\Response
     */
    public function variation_trash(Request $request, $variationid){
        Variations::where('id',$variationid)->delete();
        return redirect()->back()->with('message', 'Record deleted successfully.');
    }


    /**
     * search attribute category
     *
     * @return \Illuminate\Http\Response
     */
    public function searchvariation(Request $request){
        $category = Categorys::where('status','1')->orderBy('category_name')->get();
		return view("admin.variation.variation-list-search",compact('category'));
    }

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchvariation_list_ajax(Request $request){

        $query=Variations::where('category_id',$request->categoryid)->where('sub_category_id',$request->subcategoryid)->where('sub_category_item_id',$request->subcategoryitemid)->orderby('created_at','desc')->get();
        $totalData =count($query);
        $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
        return DataTables::of($query)
        ->addColumn('variation_name', function ($query) {
            return $query->variation_name;
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
