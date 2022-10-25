<?php

namespace App\Http\Controllers;

use App\Models\Categorys;

use App\Models\Subcategory;
use App\Models\Subcategoryitem;

use App\Models\Product;
use App\Models\Product_child_variation;
use App\Models\Product_child_variation_item;
use App\Models\Product_with_variation;
use App\Models\Product_with_variation_item;
use App\Models\Product_with_attribute;
use App\Models\Product_with_attribute_item;
use App\Models\Variationitems;
use App\Models\Variations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * user registration page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function registration()
    {
        return view('registration');
    }

    /**
     * save user post data
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function save_user(Request $request){
        $this->validate($request, [
			'name'                          => 'required',
			'email'                         => 'required|unique:users|max:191',
			'phone'                         => 'required',
			'password'                      => 'required',
			'confirmpassword'               => 'required',
        ],[
            'name.required' => 'Please your name',
            'email.required' => 'Please enter your email',
            'phone.required' => 'Please enter your phone',
            'password.required' => 'Please enter your password',
            'confirmpassword.required' => 'Please enter your confirm password',
        ]);

        $user = new User();
            $user->name                   = $request['name'];
            $user->email                  = $request['email'];
            $user->phone                  = $request['phone'];
            $user->password               = Hash::make($request['password']);
            $user->status                 = '1';
        $user->save();

        return redirect()->back()->with('message', 'Thanks for signing up. Welcome to our salesanta. We are happy to have you on board.');

    }


    /**
     * Open Landing Page On Category WIse
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function category_wise_landing_page(Request $request){
        $category = Categorys::where('id',Crypt::decryptString($request->catid))->where('status','1')->first();
        $subcategory = Subcategory::where('category_id',Crypt::decryptString($request->catid))->where('status','1')->get();
        return view('category-wise-landing-page',compact('category','subcategory'));
    }
    /**
     * Page open sub category wise
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sub_category_wise_page(Request $request){
        $subcategory = Subcategory::where('id',Crypt::decryptString($request->subcatid))->where('status','1')->first();
        $subcategoryitem = Subcategoryitem::where('sub_category_id',Crypt::decryptString($request->subcatid))->where('status','1')->get();
        //GET ALL PRODUCT FOR THIS SUB CATEGORY WISE
        //$product = Product::with('categorys','subcategory','subcategoryitem','vendors','productchildveriation','productchildveriationitem','productwithvariation','productwithvariationitem','productwithattribute','productwithattributeitem')->where('is_variation','0')->get();
        \DB::statement("SET SQL_MODE=''");//this is the trick use it just before your query
        $product = Product::with('categorys','subcategory','subcategoryitem','vendors','productchildveriation','productchildveriationitem','productwithvariation','productwithvariationitem','productwithattribute','productwithattributeitem')->where('products.sub_category_id',Crypt::decryptString($request->subcatid))->get();
        //echo "<pre>";
        //print_r($product->toArray()); // you will see the `fee` array
        //echo "</pre>";
        //die();

        //dd($productall); die;
        return view('sub-category-wise-page',compact('subcategory','subcategoryitem','product'));
    }

    /**
     * View product details
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function view_product_details(Request $request){
        $category = Categorys::where('id',Crypt::decryptString($request->cid))->first();
        $subcategory = Subcategory::where('id',Crypt::decryptString($request->scid))->first();
        $subcategoryitem = Subcategoryitem::where('id',Crypt::decryptString($request->scitemid))->first();
        $variation = Variations::where('status','1')->get();
        $variationitem = Variationitems::where('status','1')->get();

        $productatwithattribute = Product_with_attribute::where('product_id',Crypt::decryptString($request->pid))->get();
        $productatwithattributeitem = Product_with_attribute_item::where('product_id',Crypt::decryptString($request->pid))->get();
        //GET PRODUCT Details
        $product = Product::with('categorys','subcategory','subcategoryitem','vendors','productchildveriation','productchildveriationitem','productwithvariation','productwithvariationitem','productwithattribute','productwithattributeitem')->where('id',Crypt::decryptString($request->pid))->first();

         //echo "<pre>";
        //print_r($productatwithattribute->toArray()); // you will see the `fee` array
        //echo "</pre>";
        //die();

        return view('view-product-details',compact('category','subcategory','subcategoryitem','product','variation','variationitem','productatwithattribute','productatwithattributeitem'));
    }


    /**
     * View about us
     *
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about_us(){
        return view('about-us');
    }

    /**
     * View contact us
     *
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact_us(){
        return view('contact-us');
    }
}
