<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariationitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variationitems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categorys')->onDelete('cascade');
            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('sub_category_id')->references('id')->on('subcategories')->onDelete('cascade');
            $table->unsignedBigInteger('sub_category_item_id');
            $table->foreign('sub_category_item_id')->references('id')->on('subcategoryitems')->onDelete('cascade');
            $table->unsignedBigInteger('variation_id');
            $table->foreign('variation_id')->references('id')->on('variations')->onDelete('cascade');
            $table->string('variation_item_name');
            $table->string('column_slug');
			$table->string('color')->nullable();
			$table->string('image')->nullable();
            $table->enum('status', ['1', '2'])->comment('1=Active,2=InActive');
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
        //Schema::dropIfExists('variationitems');
        Schema::table('variationitems', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
