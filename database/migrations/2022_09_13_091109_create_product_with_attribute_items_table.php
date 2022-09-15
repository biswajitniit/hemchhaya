<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductWithAttributeItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_with_attribute_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('attribute_id')->references('id')->on('attributecategories')->onDelete('cascade');
            $table->unsignedBigInteger('attribute_item_id');
            $table->foreign('attribute_item_id')->references('id')->on('attributes')->onDelete('cascade');
            $table->longText('attribute_item_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_with_attribute_items');
    }
}
