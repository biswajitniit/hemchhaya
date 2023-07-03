<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Image;
class BannerController extends Controller
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
	public function banner_list(Request $request){
		return view("admin.banner.banner-list");
	}

    /**
     * Show the Admin Add Banner View Page.
     *
     * @return \Illuminate\Http\Response
     */
	public function add_banner(Request $request){
		return view("admin.banner.add-banner");
	}

    /**
     * Save category post data.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_banner_post_data(Request $request){
        $this->validate($request, [
            'banner_order' => 'required',
            'banner_text_top' => 'required',
            'banner_text_middle' => 'required',
            'banner_text_buttom' => 'required',
            'banner_url' => 'required',
            'image' => 'required',
        ],[
            'banner_order.required' => 'Please enter banner order',
            'banner_text_top.required' => 'Please enter banner top text',
            'banner_text_middle.required' => 'Please enter banner middle text',
            'banner_text_buttom.required' => 'Please enter banner buttom text',
            'banner_url.required' => 'Please enter banner url',
            'image.required' => 'Please enter banner image',
        ]);

        $imageurl = '';
        if($request->image){
            $filename = $request->file('image')->hashname();
            $imagelarge = Image::make($request->file('image'))->resize(812, 490);
            Storage::disk('s3')->put('banner/image/'.$filename, $imagelarge->stream(), 'public');
            $imageurl = Storage::disk('s3')->url('banner/image/'.$filename);
        }

    	$banner = new Banner();
			$banner->banner_order            = $request['banner_order'];
			$banner->banner_text_top         = $request['banner_text_top'];
			$banner->banner_text_middle      = $request['banner_text_middle'];
			$banner->banner_text_buttom      = $request['banner_text_buttom'];
			$banner->banner_url              = $request['banner_url'];
            $banner->banner_image            = $imageurl;
			$banner->status                  = $request['status'];
		$banner->save();
        return redirect()->back()->with('message', 'Banner added successfully.');
    }

    /**
     * Edit Category view page
     *
     * @return true or false
     */
    public function edit_banner(Request $request, $bannerid){
		 $banner = Banner::where('id',$bannerid)->first();
		 return view('admin.banner.edit-banner',compact('banner'));
	 }

   /**
     * Edit country after post
     *
     * @return true or false
     */
    public function edit_banner_post(Request $request){
        $this->validate($request, [
            'banner_order' => 'required',
            'banner_text_top' => 'required',
            'banner_text_middle' => 'required',
            'banner_text_buttom' => 'required',
            'banner_url' => 'required',
        ],[
            'banner_order.required' => 'Please enter banner order',
            'banner_text_top.required' => 'Please enter banner top text',
            'banner_text_middle.required' => 'Please enter banner middle text',
            'banner_text_buttom.required' => 'Please enter banner buttom text',
            'banner_url.required' => 'Please enter banner url',
        ]);


        if($request->image){
            $filename = $request->file('image')->hashname();
            $imagelarge = Image::make($request->file('image'))->resize(812, 490);
            Storage::disk('s3')->put('banner/image/'.$filename, $imagelarge->stream(), 'public');
            $imageurl = Storage::disk('s3')->url('banner/image/'.$filename);
        }else{
            $imageurl = $request['bannerimageurl'];
        }

        $data = array(
                        'banner_order'          => $request['banner_order'],
                        'banner_text_top'       => $request['banner_text_top'],
                        'banner_text_middle'    => $request['banner_text_middle'],
                        'banner_text_buttom'	=> $request['banner_text_buttom'],
                        'banner_url'            => $request['banner_url'],
                        'banner_image'          => $imageurl,
                        'status'                => $request['status']
                    );
        Banner::where('id', $request['bannerid'])->update($data);

        return redirect()->back()->with('message', 'Banner updated successfully.');
    }

    /**
     * Soft delets
     *
     * @return \Illuminate\Http\Response
     */
    public function bannertrash(Request $request, $bannerid){
        Banner::where('id',$bannerid)->delete();
        return redirect()->back()->with('message', 'Banner delete successfully.');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bannerlistdata(Request $request){

        $query=Banner::orderby('created_at','desc')->get();
        $totalData =count($query);
        $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
        return Datatables::of($query)
        ->addColumn('banner_order', function ($query) {
            return $query->banner_order;
        })
        ->addColumn('banner_text_top', function ($query) {
            return $query->banner_text_top;
        })
        ->addColumn('banner_text_middle', function ($query) {
            return $query->banner_text_middle;
        })
        ->addColumn('banner_text_buttom', function ($query) {
            return $query->banner_text_buttom;
        })
        ->addColumn('banner_url', function ($query) {
            return $query->banner_url;
        })
        ->addColumn('banner_image', function ($query) {
            return $query->banner_image;
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
