<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_with_variation_item extends Model
{
    use HasFactory;
    protected $fillable = [
        'variation_item_id',
        'product_id',
     ];

    public function Variationitems(){
        return $this->belongsTo(Variationitems::class,'variation_item_id');
    }
    public function Products(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
