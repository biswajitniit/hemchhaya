<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_with_variation extends Model
{
    use HasFactory;
    protected $fillable = [
        'variation_id',
        'product_id',
        'order',
     ];

    public function Variations(){
        return $this->belongsTo(Variations::class,'variation_id');
    }
    public function Products(){
        return $this->belongsTo(Product::class,'product_id');
    }

}
