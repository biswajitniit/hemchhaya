<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;
use Redirect;

class VendorLoginController extends Controller
{
    public function __construct()
    {
		$this->middleware('guest:vendor')->except('logout');
    }

    public function index()
    {
		return view('vendor.signin.signin');

    }

    public function postvendorlogin(Request $request)
    {

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('vendor')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
			 return redirect()->intended('/vendor/dashboard');
        }
        $errors = new MessageBag(['loginerror' => ['Email and/or password invalid.']]);
        return Redirect::back()->withErrors($errors)->withInput($request->only('email', 'remember'));
        return back()->withInput($request->only('email', 'remember'));
    }



}
