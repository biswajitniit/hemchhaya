<?php

namespace App\Http\Controllers\Admin\Subcategoryitem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorys;
use App\Models\Subcategory;
use App\Models\Subcategoryitem;
use DataTables;

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
     * Save category post data.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_sub_category_post_data(Request $request){
        $this->validate($request, [
            'category_id'       => 'required',
            'sub_category_name' => 'required',
        ],[
            'category_id.required' => 'Please select one category',
            'sub_category_name.required' => 'Please enter a sub category name',
        ]);

    	$subcategory = new Subcategory();
            $subcategory->category_id           = $request['category_id'];
            $subcategory->sub_category_name     = $request['sub_category_name'];
            $subcategory->sub_category_sort_no  = $request['sub_category_sort_no'];
            $subcategory->menu_dropdown         = $request['menu_dropdown'];
            $subcategory->menu_show_sub_item    = $request['menu_show_sub_item'];
            $subcategory->menu_show_div         = $request['menu_show_div'];
            $subcategory->status                = $request['status'];
		$subcategory->save();
        return redirect()->back()->with('message', 'Sub Category added successfully.');
    }

    /**
     * Edit Category view page
     *
     * @return true or false
     */
    public function edit_sub_category(Request $request, $subcategoryid){
         $category = Categorys::where('status','1')->orderBy('category_name')->get();
		 $subcategory = subcategory::where('id',$subcategoryid)->first();
		 return view('admin.subcategory.edit-sub-category',compact('category','subcategory'));
	 }

   /**
     * Edit country after post
     *
     * @return true or false
     */
    public function edit_sub_category_post(Request $request){

        $this->validate($request, [
            'category_id'       => 'required',
            'sub_category_name' => 'required',
        ],[
            'category_id.required' => 'Please select one category',
            'sub_category_name.required' => 'Please enter a sub category name',
        ]);

        $data = array(
                        'category_id'            => $request['category_id'],
                        'sub_category_name'      => $request['sub_category_name'],
                        'sub_category_sort_no'   => $request['sub_category_sort_no'],
                        'menu_dropdown'          => $request['menu_dropdown'],
                        'menu_show_sub_item'     => $request['menu_show_sub_item'],
                        'menu_show_div'          => $request['menu_show_div'],
                        'status'                 => $request['status']
                    );

        subcategory::where('id', $request['subcatid'])->update($data);

        return redirect()->back()->with('message', 'Sub Category updated successfully.');

    }

    /**
     * Soft delets
     *
     * @return \Illuminate\Http\Response
     */
    public function subcategorytrash(Request $request, $subcategoryid){
        subcategory::where('id',$subcategoryid)->delete();
        return redirect()->back()->with('message', 'Sub category delete successfully.');
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
