<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorys;
use App\Models\Subcategory;
use App\Models\Subcategoryitem;
use App\Models\Attributecategory;
use App\Models\Variations;
use DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class CatController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth:vendor');
    }

    /**
     * get subcategory list by categoryid
     *
     * @return void
     */
    public function ajax_get_sub_category(Request $request){

        $employees = Subcategory::orderby('sub_category_name')->select('id','sub_category_name')->where('category_id',Crypt::decryptString($request->categoryid))->get();

        $response = array();
        if(count($employees) > 0){
            $response[] = array(
                "id"=>'',
                "text"=>"Select Sub Category"
            );
            foreach($employees as $employee){
            $response[] = array(
                    "id"=>Crypt::encryptString($employee->id),
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
     * get subcategory list by categoryid
     *
     * @return void
     */
    public function ajax_getsubcategoryitem(Request $request){

        $employees = Subcategoryitem::orderby('sub_category_item_name')->select('id','sub_category_item_name')->where('sub_category_id',Crypt::decryptString($request->subcategoryid))->get();

        $response = array();
        if(count($employees) > 0){
            $response[] = array(
                "id"=>'',
                "text"=>"Select Sub Category Item"
            );
            foreach($employees as $employee){
            $response[] = array(
                    "id"=>Crypt::encryptString($employee->id),
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
     * Show subcategory list.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax_getsubcategorycpt(Request $request){
        $employees = Subcategory::orderby('sub_category_name','asc')->select('id','sub_category_name')->where('category_id',$request->categoryid)->get();

        $response = array();
        if(count($employees) > 0){
            $response[] = array(
                "id"=>'',
                "text"=>"Select Sub Category"
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
     * get subcategory item list by sub categoryid
     *
     * @return void
     */
    public function ajax_getsubcategoryitemcpt(Request $request){

        $employees = Subcategoryitem::orderby('sub_category_item_name','asc')->select('id','sub_category_item_name')->where('sub_category_id',$request->subcategoryid)->get();

        $response = array();
        if(count($employees) > 0){
            $response[] = array(
                "id"=>'',
                "text"=>"Select Sub Category Item"
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




}
