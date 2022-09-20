<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categorys')->onDelete('cascade');
            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('sub_category_id')->references('id')->on('subcategories')->onDelete('cascade');
            $table->unsignedBigInteger('sub_category_item_id');
            $table->foreign('sub_category_item_id')->references('id')->on('subcategoryitems')->onDelete('cascade');
            $table->string('brand_name');
            $table->string('brand_name_slug');
            $table->string('brand_image_name')->nullable();
            $table->string('brand_image_path')->nullable();
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
        Schema::table('brands', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
