<?php

namespace App\Http\Controllers;

use App\Models\Categorys;
use App\Models\Subcategory;
use App\Models\Subcategoryitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
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
        return view('sub-category-wise-page',compact('subcategory','subcategoryitem'));
    }



}
