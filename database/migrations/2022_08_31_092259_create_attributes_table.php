<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categorys')->onDelete('cascade');
            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('sub_category_id')->references('id')->on('subcategories')->onDelete('cascade');
            $table->unsignedBigInteger('sub_category_item_id');
            $table->foreign('sub_category_item_id')->references('id')->on('subcategoryitems')->onDelete('cascade');
            $table->unsignedBigInteger('attribute_category_id');
            $table->foreign('attribute_category_id')->references('id')->on('attributecategories')->onDelete('cascade');
            $table->string('column_name');
            $table->string('column_slug');
            $table->enum('column_type', ['1', '2', '3', '4', '5', '6'])->comment('1=TextBox,2=Password,3=Email,4=Dropdown,5=Multi Select Dropdown,6=Editor');
            $table->string('tags')->nullable();
            $table->enum('column_validation',['1', '2'])->comment('1=Optional,2=Required');
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
        Schema::table('attributes', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
