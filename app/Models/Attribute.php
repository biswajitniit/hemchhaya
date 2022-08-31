<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Attribute extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'column_name',
        'column_slug',
        'column_type',
        'column_validation',
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
     public function Attributecategory(){
        return $this->belongsTo(Attributecategory::class,'attribute_category_id');
     }
}
