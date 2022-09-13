<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_with_attribute_item extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_attribute_id',
        'attribute_item_id',
     ];

    public function Productattribute(){
        return $this->belongsTo(Product_with_attribute::class,'product_attribute_id');
    }

    public function Attributeitem(){
        return $this->belongsTo(Attribute::class,'attribute_item_id');
    }

}
