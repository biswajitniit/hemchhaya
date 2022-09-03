<?php

namespace App\Http\Controllers\Admin\Subcategoryitem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorys;
use App\Models\Subcategory;
use App\Models\Subcategoryitem;
use DataTables;
use Illuminate\Support\Facades\DB;

class SubCategoryItemController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth:admin');
    }

    /**
     * Show the Admin Category View Page.
     *
     * @return \Illuminate\Http\Response
     */
	public function sub_category_item_list(Request $request){
		return view("admin.subcategoryitem.sub-category-item-list");
	}

    /**
     * Show the Admin Add Category View Page.
     *
     * @return \Illuminate\Http\Response
     */
	public function add_sub_category_item(Request $request){
        $category = Categorys::where('status','1')->orderBy('category_name')->get();
		return view("admin.subcategoryitem.add-sub-category-item",compact('category'));
	}

    /**
     * Save category item post data.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_sub_category_item_post_data(Request $request){
        $this->validate($request, [
            'category_id'            => 'required',
            'sub_category_id'        => 'required',
            'sub_category_item_name' => 'required',
        ],[
            'category_id.required' => 'Please select one category',
            'sub_category_id.required' => 'Please select one sub category',
            'sub_category_item_name.required' => 'Please enter a sub category item name',
        ]);

    	$subcategoryitem = new Subcategoryitem();
            $subcategoryitem->category_id            = $request['category_id'];
            $subcategoryitem->sub_category_id        = $request['sub_category_id'];
            $subcategoryitem->sub_category_item_name = $request['sub_category_item_name'];
            $subcategoryitem->status                 = $request['status'];
		$subcategoryitem->save();

        return redirect()->back()->with('message', 'Sub category item added successfully.');
    }

    /**
     * Edit Category view page
     *
     * @return true or false
     */
    public function edit_sub_category_item(Request $request, $subcategoryitemid){
         $category = Categorys::where('status','1')->orderBy('category_name')->get();
		 $subcategoryitem = Subcategoryitem::where('id',$subcategoryitemid)->first();
		 return view('admin.subcategoryitem.edit-sub-category-item',compact('category','subcategoryitem'));
	 }

   /**
     * Edit category after post
     *
     * @return true or false
     */
    public function edit_sub_category_item_post(Request $request){

        $this->validate($request, [
            'category_id'            => 'required',
            'sub_category_id'        => 'required',
            'sub_category_item_name' => 'required',
        ],[
            'category_id.required' => 'Please select one category',
            'sub_category_id.required' => 'Please select one sub category',
            'sub_category_item_name.required' => 'Please enter a sub category item name',
        ]);

        $data = array(
            'category_id'              => $request['category_id'],
            'sub_category_id'          => $request['sub_category_id'],
            'sub_category_item_name'   => $request['sub_category_item_name'],
            'status'                   => $request['status']
        );
        //DB::enableQueryLog();
        Subcategoryitem::where('id', $request['subcatitemid'])->update($data);
        //dd(DB::getQueryLog());die;
        return redirect()->back()->with('message', 'Sub category item updated successfully.');

    }

    /**
     * Soft delets
     *
     * @return \Illuminate\Http\Response
     */
    public function subcategoryitemtrash(Request $request, $subcategoryitemid){
        Subcategoryitem::where('id',$subcategoryitemid)->delete();
        return redirect()->back()->with('message', 'Sub category item delete successfully.');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subcategoryitemlistdata(Request $request){

        $query=Subcategoryitem::with('categorys','subcategory')->orderby('created_at','desc')->get();
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
            return $query->sub_category_item_name;
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


    /**
     * get subcategory list by categoryid
     *
     * @return void
     */
    public function ajax_sub_category_get_category_id(Request $request){

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
     * soft delete post
     *
     * @return void
     */
    public function destroy($id)
    {
        // Post::find($id)->delete();

        // return redirect()->back();
    }
    /**
     * restore specific post
     *
     * @return void
     */
    public function restore($id)
    {
        // Post::withTrashed()->find($id)->restore();

        // return redirect()->back();
    }

    /**
     * restore all post
     *
     * @return response()
     */
    public function restoreAll()
    {
        // Post::onlyTrashed()->restore();

        // return redirect()->back();
    }

}
