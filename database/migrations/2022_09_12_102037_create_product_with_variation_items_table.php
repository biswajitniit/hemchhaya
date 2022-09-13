<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductWithVariationItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_with_variation_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('variation_item_id');
            $table->foreign('variation_item_id')->references('id')->on('variationitems')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       // Schema::dropIfExists('product_with_variation_items');
       Schema::table('product_with_variation_items', function (Blueprint $table) {
        $table->dropSoftDeletes();
       });
    }
}
