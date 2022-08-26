<?php

namespace App\Http\Controllers\Admin\Attributecategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorys;
use App\Models\Subcategory;
use App\Models\Subcategoryitem;
use App\Models\Attributecategory;

class AttributecategoryController extends Controller
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
     * Show the admin attribute category subcategory list.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax_sub_category_get_category_id_on_attribute_page(Request $request){
        $employees = Subcategory::orderby('sub_category_name','asc')->select('id','sub_category_name')->where('category_id',$request->categoryid)->get();

        $response = array();
        if(count($employees) > 0){
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
     * get subcategory item list by sub categoryid
     *
     * @return void
     */
    public function ajax_sub_category_item_get_category_id_on_attribute_page(Request $request){

        $employees = Subcategoryitem::orderby('sub_category_item_name','asc')->select('id','sub_category_item_name')->where('sub_category_id',$request->subcategoryid)->get();

        $response = array();
        if(count($employees) > 0){
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
     * Show the admin attribute category list page.
     *
     * @return \Illuminate\Http\Response
     */
	public function attribute_category_list(Request $request){
        $category = Categorys::where('status','1')->orderBy('category_name')->get();
		return view("admin.attributecategory.attribute-category-list",compact('category'));
	}
    /**
     * Show the add attribute category view page.
     *
     * @return \Illuminate\Http\Response
     */
	public function add_attribute_category(Request $request){
        $category = Categorys::where('status','1')->orderBy('category_name')->get();
		return view("admin.attributecategory.add-attribute-category",compact('category'));
	}
  /**
     * Save attribute post data.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_attribute_category_post_data(Request $request){
        $this->validate($request, [
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'sub_category_item_id' => 'required',
            'attribute_category_name' => 'required',

        ],[
            'category_id.required' => 'Please select category',
            'sub_category_id.required' => 'Please select sub category',
            'sub_category_item_id.required' => 'Please select sub category item',
            'attribute_category_name.required' => 'Please enter attribute category name',
        ]);

    	$attributecategory = new Attributecategory();
            $attributecategory->category_id             = $request['category_id'];
            $attributecategory->sub_category_id         = $request['sub_category_id'];
            $attributecategory->sub_category_item_id    = $request['sub_category_item_id'];
            $attributecategory->attribute_category_name = $request['attribute_category_name'];
            $attributecategory->status                  = $request['status'];
		$attributecategory->save();

        return redirect()->back()->with('message', 'Attribute category added successfully.');
    }




    /**
     * search attribute category
     *
     * @return \Illuminate\Http\Response
     */
    public function searchattributecategory(Request $request){
        $category = Categorys::where('status','1')->orderBy('category_name')->get();
		return view("admin.attributecategory.attribute-category-list-search",compact('category'));
    }

}
