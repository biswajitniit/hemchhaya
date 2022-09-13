<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductChildVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_child_variations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_product_id');
            $table->foreign('parent_product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('child_product_id');
            $table->integer('is_default')->nullable()->unsigned();
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
        //Schema::dropIfExists('product_child_variations');
        Schema::table('product_child_variations', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
