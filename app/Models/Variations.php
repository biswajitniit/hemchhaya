<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variations extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'category_id',
        'sub_category_id',
        'sub_category_item_id',
        'attribute_category_name',
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
}
