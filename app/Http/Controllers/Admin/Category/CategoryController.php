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
     * Show the Admin Add Category View Page.
     *
     * @return \Illuminate\Http\Response
     */
	public function add_category(Request $request){
		return view("admin.category.add-category");
	}

    /**
     * Save category post data.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_category_post_data(Request $request){
        $this->validate($request, [
            'category_name' => 'required'
        ],[
            'category_name.required' => 'Please enter a category name',
        ]);

    	$category = new Categorys();
			$category->category_name           = $request['category_name'];
			$category->category_sort_no        = $request['category_sort_no'];
			$category->menu_dropdown           = $request['menu_dropdown'];
			$category->menu_show_div_type      = $request['menu_show_div_type'];
			$category->menu_show_in_header     = $request['menu_show_in_header'];
			$category->status                  = $request['status'];
		$category->save();
        return redirect()->back()->with('message', 'Category added successfully.');
    }

    /**
     * Edit Category view page
     *
     * @return true or false
     */
    public function edit_category(Request $request, $categoryid){
		 $category = Categorys::where('id',$categoryid)->first();
		 return view('admin.category.edit-category',compact('category'));
	 }

   /**
     * Edit country after post
     *
     * @return true or false
     */
    public function edit_category_post(Request $request){

        $this->validate($request, [
            'category_name' => 'required'
        ],[
            'category_name.required' => 'Please enter a category name',
        ]);

        $data = array(
                        'category_name'          => $request['category_name'],
                        'category_sort_no'       => $request['category_sort_no'],
                        'menu_dropdown'          => $request['menu_dropdown'],
                        'menu_show_div_type'	 => $request['menu_show_div_type'],
                        'menu_show_in_header'    => $request['menu_show_in_header'],
                        'status'                 => $request['status']
                    );

        Categorys::where('id', $request['catid'])->update($data);

        return redirect()->back()->with('message', 'Category updated successfully.');

    }

    /**
     * Soft delets
     *
     * @return \Illuminate\Http\Response
     */
    public function categorytrash(Request $request, $categoryid){
        Categorys::where('id',$categoryid)->delete();
        return redirect()->back()->with('message', 'Category delete successfully.');
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
