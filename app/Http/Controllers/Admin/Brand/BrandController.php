<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorys;
use App\Models\Subcategory;
use App\Models\Subcategoryitem;
use App\Models\Brand;
use DataTables;
use Illuminate\Support\Facades\Storage;
class BrandController extends Controller
{
    //
    public function __construct()
    {
		$this->middleware('auth:admin');
    }
    /**
     * Show the vendor product slugify
     *
     * @return \Illuminate\Http\Response
    */
    function slugify($text, string $divider = '-')
    {
      // replace non letter or digits by divider
      $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      // trim
      $text = trim($text, $divider);

      // remove duplicate divider
      $text = preg_replace('~-+~', $divider, $text);

      // lowercase
      $text = strtolower($text);

      if (empty($text)) {
        return 'n-a';
      }

      return $text;
    }
    /**
     * Show the admin brand list page.
     *
     * @return \Illuminate\Http\Response
     */
	public function brand_list(Request $request){
        $category = Categorys::where('status','1')->orderBy('category_name')->get();
		return view("admin.brand.brand-list",compact('category'));
	}
    /**
     * Show the add brand view page.
     *
     * @return \Illuminate\Http\Response
     */
	public function add_brand(Request $request){
        $category = Categorys::where('status','1')->orderBy('category_name')->get();
		return view("admin.brand.add-brand",compact('category'));
	}
  /**
     * Save brand post data.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_brand_post_data(Request $request){
        $this->validate($request, [
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'sub_category_item_id' => 'required',
            'brand_name' => 'required',

        ],[
            'category_id.required' => 'Please select category',
            'sub_category_id.required' => 'Please select sub category',
            'sub_category_item_id.required' => 'Please select sub category item',
            'brand_name.required' => 'Please enter brand name',
        ]);

        if($request['brand_image']){
            $file = $request['brand_image'];
            $filename = time().'.'.$request['brand_image']->extension();

            $path = Storage::disk('s3')->put("brand/" . $filename, $file, 'public');
            $path = Storage::disk('s3')->url($path);
        }else{
            $filename = '';
            $path = '';
        }

    	$brand = new Brand();
            $brand->category_id             = $request['category_id'];
            $brand->sub_category_id         = $request['sub_category_id'];
            $brand->sub_category_item_id    = $request['sub_category_item_id'];
            $brand->brand_name              = $request['brand_name'];
            $brand->brand_name_slug         = $this->slugify($request['brand_name'],'-');
            $brand->brand_image_name        = $filename;
            $brand->brand_image_path        = $path;
            $brand->status                  = $request['status'];
		$brand->save();

        return redirect()->back()->with('message', 'Brand added successfully.');
    }

    /**
     * Edit brand view page.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_brand(Request $request, $brandid){
        $category = Categorys::where('status','1')->orderBy('category_name')->get();
        $brand = Brand::where('id',$brandid)->first();
        return view('admin.brand.edit-brand',compact('category','brand'));
    }

    /**
     * Edit brand post view page.
     *
     * @return \Illuminate\Http\Response
    */
    public function edit_brand_post(Request $request){
        $this->validate($request, [
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'sub_category_item_id' => 'required',
            'brand_name' => 'required',

        ],[
            'category_id.required' => 'Please select category',
            'sub_category_id.required' => 'Please select sub category',
            'sub_category_item_id.required' => 'Please select sub category item',
            'brand_name.required' => 'Please enter brand name',
        ]);


        if($request['brand_image']){

            if(!empty($request['brand_image_old_file_name'])){
                $file = Storage::disk('s3')->get("brand/" .$request['brand_image_old_file_name']);
                Storage::disk('s3')->delete("brand/" .$request['brand_image_old_file_name']);
            }

            $file = $request['brand_image'];
            $filename = time().'.'.$request['brand_image']->extension();

            $path = Storage::disk('s3')->put("brand/" . $filename, $file, 'public');
            $path = Storage::disk('s3')->url($path);
        }else{
            if(!empty($request['brand_image_old_file_name'])){
                $path = $request['brand_image_old_path'];
                $filename = $request['brand_image_old_file_name'];
            }else{
                $path = '';
                $filename = '';
            }
        }





        $data = array(
            'category_id'               => $request['category_id'],
            'sub_category_id'           => $request['sub_category_id'],
            'sub_category_item_id'      => $request['sub_category_item_id'],
            'brand_name'                => $request['brand_name'],
            'brand_name_slug'           => $this->slugify($request['brand_name'],'-'),
            'brand_image_name'          => $filename,
            'brand_image_path'          => $path,
            'status'                    => $request['status']
        );

        Brand::where('id', $request['brandid'])->update($data);

        return redirect()->back()->with('message', 'Brand updated successfully.');
    }

    /**
     * search brand list
     *
     * @return \Illuminate\Http\Response
     */
    public function brand_list_search(Request $request){
        $category = Categorys::where('status','1')->orderBy('category_name')->get();
		return view("admin.brand.brand-list-search",compact('category'));
    }

    /**
     * Soft delets attribute category
     *
     * @return \Illuminate\Http\Response
     */
    public function brand_trash(Request $request, $brandid){
        Brand::where('id',$brandid)->delete();
        return redirect()->back()->with('message', 'Record deleted successfully.');
    }


   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax_search_brand_list_datatable(Request $request){

        $query=Brand::where('category_id',$request->categoryid)->where('sub_category_id',$request->subcategoryid)->where('sub_category_item_id',$request->subcategoryitemid)->orderby('created_at','desc')->get();
        $totalData =count($query);
        $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
        return DataTables::of($query)
        ->addColumn('brand_name', function ($query) {
            return $query->brand_name;
        })
        ->addColumn('brand_image_path', function ($query) {
            return $query->brand_image_path;
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



}
