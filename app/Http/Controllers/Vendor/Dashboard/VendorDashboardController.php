<?php
namespace App\Http\Controllers\Vendor\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
class VendorDashboardController extends Controller
{

    public function __construct()
    {
		$this->middleware('auth:vendor');
    }

    /**
     * Show the Admin Dashboard Page.
     *
     * @return \Illuminate\Http\Response
     */
	public function dashboard(Request $request){

		return view("vendor.dashboard.index");

	}




}
