<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;
class UserdashboardController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function user_dashboard()
    {
        return view('dashboardarea.user-dashboard');
    }

    public function user_update_profile(Request $request){

		$this->validate(request(),[
			'name'                         => 'required',
			'phone'                        => 'required',
		]);

		$data = array(
						'name'         => $request['name'],
						'phone'        => $request['phone']
					);

		User::where('id', Auth::user()->id)->update($data);

		Session::flash('message', "Profile Updated successfully.");
		return redirect('user/dashboard');

    }


}
