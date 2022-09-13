<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_with_attribute extends Model
{
    use HasFactory;
    protected $fillable = [
        'attribute_id',
        'product_id',
        'order',
     ];

    public function Attributes(){
        return $this->belongsTo(Attributecategory::class,'attribute_id');
    }
    public function Products(){
        return $this->belongsTo(Product::class,'product_id');
    }

}
