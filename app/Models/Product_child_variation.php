<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_child_variation extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_product_id',
        'child_product_id',
        'is_default',
     ];
    public function Products(){
        return $this->belongsTo(Product::class,'parent_product_id','id');
    }

}
