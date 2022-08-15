<?php
namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
class CategoryController extends Controller
{

    public function __construct()
    {
		$this->middleware('auth:admin');
    }

    /**
     * Show the Admin Category Page.
     *
     * @return \Illuminate\Http\Response
     */
	public function category_list(Request $request){

		return view("admin.category.category-list");

	}




}
