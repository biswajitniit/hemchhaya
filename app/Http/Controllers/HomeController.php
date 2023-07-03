<?php

namespace App\Http\Controllers;

use App\Models\Banner;

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
use App\Models\Product_image;
use App\Models\Variationitems;
use App\Models\Variations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
        $banner = Banner::where('status','1')->get();
        return view('welcome',compact('banner'));
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
			'password'                      => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
			'confirmpassword'               => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/|same:password',
        ],[
            'name.required' => 'Please enter your name',
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


        $token = Str::random(64);

        UserVerify::create([
              'user_id' => $user->id,
              'token' => $token
        ]);

        Mail::send('email.email-verification-mail', ['token' => $token], function($message) use($request){
              $message->to($request['email']);
              $message->subject('Email Verification Mail');
        });

        //return redirect()->back()->with('message', 'Thanks for signing up. Welcome to our salesanta. We are happy to have you on board.');
        return redirect()->back()->with('message', 'Thanks for signing up. please verify your email account.');
    }

/**
     * Write code on Method
     *
     * @return response()
     */
    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;

            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();

                Mail::send('email.email-verify-account', ['name' => $user->name], function($message) use($user){
                    $message->to($user->email);
                    $message->subject('Email Verification Mail');
                });

                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

      return redirect()->route('login')->with('message', $message);
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
     * Page open sub category item wise landing page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sub_cat_item_landing_page(Request $request){
        $category = Categorys::where('id',Crypt::decryptString($request->cid))->where('status','1')->first();
        $subcategory = Subcategory::where('id',Crypt::decryptString($request->scid))->where('status','1')->first();
        $subcategoryitem = Subcategoryitem::where('sub_category_id',Crypt::decryptString($request->scid))->where('status','1')->get();
        \DB::statement("SET SQL_MODE=''");//this is the trick use it just before your query
        $product = Product::with('productimage')->where('category_id',Crypt::decryptString($request->cid))->where('sub_category_id',Crypt::decryptString($request->scid))->where('sub_category_item_id',Crypt::decryptString($request->sciid))->get();
        return view('sub-category-item-wise-landing-page',compact('category','subcategory','subcategoryitem','product'));
    }

        /**
     * Page open sub category item wise landing page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function all_subcategory_item_list(Request $request){
        $subcategoryitem =  Subcategoryitem::where('status','1')->get();
        return view('all-subcategory-item-list',compact('subcategoryitem'));
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
        $productimage = Product_image::where('product_id',Crypt::decryptString($request->pid))->get();
        $frontviewimage = Product_image::where('product_id',Crypt::decryptString($request->pid))->where('image_size','large')->where('image_category','front_view_image')->first();

        //  echo "<pre>";
        //  print_r($productatwithattributeitem->toArray()); // you will see the `fee` array
        //  echo "</pre>";
        //  die();

        return view('view-product-details',compact('category','subcategory','subcategoryitem','product','variation','variationitem','productatwithattribute','productatwithattributeitem','productimage','frontviewimage'));
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
