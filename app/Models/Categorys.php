<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Categorys extends Model
{
    use HasFactory, SoftDeletes;
    //use HasFactory;
    //protected $softDelete = true;
    protected $fillable = [
        'category_name','category_sort_no','menu_dropdown','menu_show_div_type','menu_show_in_header','status',
     ];
}
