<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Subcategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'category_id',
        'sub_category_name',
        'sub_category_sort_no',
        'menu_dropdown',
        'menu_show_sub_item',
        'menu_show_div',
        'status',
     ];

     public function Categorys(){
        return $this->belongsTo(Categorys::class,'category_id');
     }
}
