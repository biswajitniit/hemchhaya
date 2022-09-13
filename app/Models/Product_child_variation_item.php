<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_child_variation_item extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_child_variation_id',
        'variation_item_id',
     ];

    public function Productchildvariation(){
        return $this->belongsTo(Product_child_variation::class,'product_child_variation_id');
    }

    public function Variationitem(){
        return $this->belongsTo(Variationitems::class,'variation_item_id');
    }

}
