<?php
namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
use DataTables;
use App\Models\Categorys;
class CategoryController extends Controller
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
	public function category_list(Request $request){
		return view("admin.category.category-list");
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categorylistdata(Request $request){

        $query=Categorys::orderby('created_at','desc')->get();
        $totalData =count($query);
        $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
        return Datatables::of($query)
        ->addColumn('category_name', function ($query) {
            return $query->category_name;
        })
        ->addColumn('category_sort_no', function ($query) {
            return $query->category_sort_no;
        })
        ->addColumn('menu_dropdown', function ($query) {
            if($query->menu_dropdown==1){
                $mdd='Yes';
            }else{
                $mdd='No';
            }
            return $mdd;
        })
         ->addColumn('menu_show_div_type', function ($query) {
            if($query->menu_show_div_type==1){
                $msd='Dropdown';
            }else{
                $msd='Megamenu';
            }
            return $msd;
        })
         ->addColumn('menu_show_in_header', function ($query) {
            if($query->menu_show_in_header==1){
                $msh='Show';
            }else{
                $msh='Not Show';
            }
            return $msh;
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
