<?php

namespace App\Http\Resources;

use App\Models\Attribute;
use App\Models\Product_with_attribute;
use App\Models\Product_with_attribute_item;
use App\Models\Product_with_variation;
use App\Models\Product_with_variation_item;
use App\Models\Variationitems;
use App\Models\Variations;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $product = [
            'id' => $this->id,
            'category' => $this->Categorys(),
            'sub_category' => $this->Subcategory(),
            'sub_category_item' => $this->Subcategoryitem(),
            'vendor' => $this->Vendors(),
            'brand' => $this->brand,
            'product_name_slug' => $this->product_name_slug,
            'name' => $this->name,
            'highlights' => $this->highlights,
            'description' => $this->description,
            'sku' => $this->sku,
            'price' => $this->price,
            'sale_price' => $this->sale_price,
            'quantity' => $this->quantity,
            'allow_customer_checkout_when_this_product_out_of_stock' => $this->allow_customer_checkout_when_this_product_out_of_stock,
            'weight' => $this->weight,
            'length' => $this->length,
            'breadth' => $this->breadth,
            'height' => $this->height,
            'country_of_origin' => $this->country_of_origin,
            'manufacture_details' => $this->manufacture_details,
            'packer_details' => $this->packer_details,
            'is_variation' => $this->is_variation,
            'views' => $this->views,
            'is_featured' => $this->is_featured,
            'status' => $this->status,
            'search_keywords' => $this->search_keywords,
            'meta_title' => $this->meta_title,
            'meta_keywords' => $this->meta_keywords,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

        // Attributes
        $attributes = Attribute::whereIn(
            'id',
            Product_with_attribute::select('attribute_id')
                ->where('product_id', $this->id)
                ->pluck('attribute_id')
                ->toArray()
        )->get()->toArray();

        foreach ($attributes as $key => $attribute) {
            $attributes[$key]['items'] = Product_with_attribute_item::where('product_id', $this->id)
                ->where('attribute_item_id', $attribute['id'])
                ->get();
        }

        $product['attributes'] = $attributes;

        // Variations
        $variations = Variations::whereIn(
            'id',
            Product_with_variation::select('variation_id')
                ->where('product_id', $this->id)
                ->pluck('variation_id')
                ->toArray()
        )->get()->toArray();

        foreach ($variations as $key => $variation) {
            $variations[$key]['items'] = Variationitems::where('variation_id', $variation['id'])
                ->whereIn(
                    'id',
                    Product_with_variation_item::select('variation_item_id')
                        ->where('product_id', $this->id)
                        ->get()
                        ->toArray()
                )->get();
        }

        $product['variations'] = $variations;

        return $product;
    }
}
