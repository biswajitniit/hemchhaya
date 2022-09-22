<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categorys')->onDelete('cascade');
            $table->string('sub_category_name');
            $table->string('sub_category_image')->nullable($value = true);
            $table->bigInteger('sub_category_sort_no')->nullable($value = true);
            $table->enum('menu_dropdown', ['1', '2'])->comment('1=Yes,2=No');
            $table->enum('menu_show_sub_item', ['1', '2'])->comment('1=Show,2=Not Show');
            $table->enum('menu_show_div', ['1', '2', '3', '4'])->comment('1=Col-A,2=Col-B,3=Col-C,4=Col-D');
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
        //Schema::dropIfExists('subcategories');
        Schema::table('subcategories', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
