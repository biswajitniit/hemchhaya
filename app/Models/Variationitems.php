<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Variationitems extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'category_id',
        'sub_category_id',
        'sub_category_item_id',
        'variation_id',
        'variation_item_name',
        'column_slug',
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
     public function Variation(){
        return $this->belongsTo(Variations::class,'variation_id');
     }
}
