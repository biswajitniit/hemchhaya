<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductChildVariationItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_child_variation_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_child_variation_id');
            $table->foreign('product_child_variation_id')->references('id')->on('product_child_variations')->onDelete('cascade');

            $table->unsignedBigInteger('variation_item_id');
            $table->foreign('variation_item_id')->references('id')->on('variationitems')->onDelete('cascade');

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
        //Schema::dropIfExists('product_child_variation_items');
        Schema::table('product_child_variation_items', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

    }
}
