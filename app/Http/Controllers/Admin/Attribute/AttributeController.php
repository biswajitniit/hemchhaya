<?php

namespace App\Http\Controllers\Admin\Attribute;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorys;
use App\Models\Subcategory;
use App\Models\Subcategoryitem;
use App\Models\Attribute;
use DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class AttributeController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth:admin');
    }
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
     * get subcategory list by categoryid
     *
     * @return void
     */
    public function ajax_sub_category_get_category_id(Request $request){

        $employees = Subcategory::orderby('sub_category_name','asc')->select('id','sub_category_name')->where('category_id',Crypt::decryptString($request->categoryid))->get();

        $response = array();
        if(count($employees) > 0){
            foreach($employees as $employee){
            $response[] = array(
                    "id"=>Crypt::encryptString($employee->id),
                    "text"=>$employee->sub_category_name
            );
            }
        }else{
            $response[] = array(
                "id"=>'',
                "text"=>"No Records Found"
            );
        }
        return response()->json($response);
    }
   /**
     * get subcategory item list by sub categoryid
     *
     * @return void
     */
    public function ajax_sub_category_item_get_category_id(Request $request){

        $employees = Subcategoryitem::orderby('sub_category_item_name','asc')->select('id','sub_category_item_name')->where('sub_category_id',Crypt::decryptString($request->subcategoryid))->get();

        $response = array();
        if(count($employees) > 0){
            foreach($employees as $employee){
            $response[] = array(
                    "id"=>Crypt::encryptString($employee->id),
                    "text"=>$employee->sub_category_item_name
            );
            }
        }else{
            $response[] = array(
                "id"=>'',
                "text"=>"No Records Found"
            );
        }
        return response()->json($response);
    }


    /**
     * Show the Admin Attribute Search.
     *
     * @return \Illuminate\Http\Response
     */
	public function searchattribute(Request $request){
        $category = Categorys::where('status','1')->orderBy('category_name')->get();
		return view("admin.attribute.attribute-list-search",compact('category'));
	}


    /**
     * Show the Admin Attribute List Page.
     *
     * @return \Illuminate\Http\Response
     */
	public function attribute_list(Request $request){
        $category = Categorys::where('status','1')->orderBy('category_name')->get();
		return view("admin.attribute.attribute-list",compact('category'));
	}

    /**
     * Show the add attribute view page.
     *
     * @return \Illuminate\Http\Response
     */
	public function add_attribute(Request $request){
		return view("admin.attribute.add-attribute");
	}

   /**
     * Save attribute post data.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_attribute_post_data(Request $request){
        $this->validate($request, [
            'column_name' => 'required',
            'column_type' => 'required',
            'column_validation' => 'required',
        ],[
            'column_name.required' => 'Please enter column name',
            'column_type.required' => 'Please select column type',
        ]);

    	$attribute = new Attribute();
            $attribute->column_name       = $request['column_name'];
            $attribute->column_slug       = $this->slugify($request['column_name'],'_');
            $attribute->column_type       = $request['column_type'];
            $attribute->column_validation = $request['column_validation'];
            $attribute->status            = $request['status'];
		$attribute->save();

        return redirect()->back()->with('message', 'Attribute added successfully.');
    }


    /**
     * Edit attribute view page
     *
     * @return true or false
     */
    public function edit_attribute(Request $request, $attributeid){
        $attribute = Attribute::where('id',$attributeid)->first();
        return view('admin.attribute.edit-attribute',compact('attribute'));
    }

   /**
     * Edit attribute after post
     *
     * @return true or false
     */
    public function edit_attribute_post(Request $request){

        $this->validate($request, [
            'column_name' => 'required',
            'column_type' => 'required',
            'column_validation' => 'required',
        ],[
            'column_name.required' => 'Please enter column name',
            'column_type.required' => 'Please select column type',
        ]);

        $data = array(
            'column_name'              => $request['column_name'],
            'column_slug'              => $this->slugify($request['column_slug'],'_'),
            'column_type'              => $request['column_type'],
            'column_validation'        => $request['column_validation'],
            'status'                   => $request['status']
        );

        Attribute::where('id', $request['attributeid'])->update($data);

        return redirect()->back()->with('message', 'Attribute updated successfully.');

    }

    /**
     * Soft delets
     *
     * @return \Illuminate\Http\Response
     */
    public function attributetrash(Request $request, $attributeid){
        Attribute::where('id',$attributeid)->delete();
        return redirect()->back()->with('message', 'Attribute deleted successfully.');
    }

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attributelistdata(Request $request){

        $query=Attribute::orderby('created_at','desc')->get();
        $totalData =count($query);
        $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
        return Datatables::of($query)
        ->addColumn('column_name', function ($query) {
            return $query->column_name;
        })
        ->addColumn('column_type', function ($query) {
            if($query->column_type==1){
                $ctype='TextBox';
            }elseif($query->column_type==2){
                $ctype='DropDown';
            }elseif($query->column_type==3){
                $ctype='Editor';
            }elseif($query->column_type==4){
                $ctype='Password';
            }elseif($query->column_type==5){
                $ctype='Email';
            }
            return $ctype;
        })
        ->addColumn('column_validation', function ($query) {
            if($query->column_validation==1){
                $cvalivation='Optional';
            }else{
                $cvalivation='Required';
            }
            return $cvalivation;
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
