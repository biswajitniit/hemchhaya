<?php

namespace App\Http\Controllers\Admin\Variationitems;

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

class VariationitemsController extends Controller
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
     * Show the Admin AVariationitems List Page.
     *
     * @return \Illuminate\Http\Response
     */
	public function variationitem_list(Request $request){
        $category = Categorys::where('status','1')->orderBy('category_name')->get();
		return view("admin.variationitems.variationitem-list",compact('category'));
	}







}
