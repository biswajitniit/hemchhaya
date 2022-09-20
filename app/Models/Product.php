<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'category_id',
        'sub_category_id',
        'sub_category_item_id',
        'vendor_id',
        'brand',
        'product_name_slug',
        'name',
        'highlights',
        'description',
        'front_view_image',
        'back_view_image',
        'side_view_image',
        'open_view_image',
        'sku',
        'price',
        'sale_price',
        'quantity',
        'allow_customer_checkout_when_this_product_out_of_stock',
        'weight',
        'length',
        'breadth',
        'height',
        'country_of_origin',
        'manufacture_details',
        'packer_details',
        'is_variation',
        'views',
        'is_featured',
        'status',
        'search_keywords',
        'meta_title',
        'meta_keywords',
        'status',
     ];

     public function Categorys(){
        return $this->belongsTo(Categorys::class,'category_id');
     }
     public function Subcategory(){
        return $this->belongsTo(Subcategory::class,'sub_category_id');
     }
     public function Subcategoryitem(){
        return $this->belongsTo(Subcategoryitem::class,'sub_category_item_id');
     }
     public function Vendors(){
        return $this->belongsTo(Vendor::class,'vendor_id');
     }
     public function Productchildveriation(){
        return $this->belongsTo(Product_child_variation::class,'parent_product_id');
     }
     public function Productchildveriationitem(){
        return $this->belongsTo(Product_child_variation_item::class,'product_child_variation_id');
     }
     public function productwithvariation(){
        return $this->belongsTo(Product_with_variation::class,'product_id');
     }
     public function productwithvariationitem(){
        return $this->belongsTo(Product_with_variation_item::class,'product_id');
     }
     public function productwithattribute(){
        return $this->belongsTo(Product_with_attribute::class,'product_id');
     }
     public function productwithattributeitem(){
        return $this->belongsTo(Product_with_attribute_item::class,'product_id');
     }
}
