<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorys', function (Blueprint $table) {
            $table->id();
            $table->string('category_name')->unique();
            $table->bigInteger('category_sort_no')->nullable($value = true);
            $table->enum('menu_dropdown', ['1', '2'])->comment('1=Yes,2=No');
            $table->enum('menu_show_div_type', ['1', '2'])->comment('1=dropdown,2=megamenu');
            $table->enum('menu_show_in_header', ['1', '2'])->comment('1=Show,2=Not Show');
            $table->enum('status', ['1', '2'])->comment('1=Active,2=InActive');
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
        Schema::dropIfExists('categorys');
    }
}
