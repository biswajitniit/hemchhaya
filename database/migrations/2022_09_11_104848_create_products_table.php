<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categorys')->onDelete('cascade');
            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('sub_category_id')->references('id')->on('subcategories')->onDelete('cascade');
            $table->unsignedBigInteger('sub_category_item_id');
            $table->foreign('sub_category_item_id')->references('id')->on('subcategoryitems')->onDelete('cascade');

            $table->integer('brand');
            $table->string('product_name_slug');

            $table->string('name');
            $table->longText('highlights')->nullable();
            $table->longText('description')->nullable();

            $table->string('front_view_image');
            $table->string('back_view_image')->nullable();
            $table->string('side_view_image')->nullable();
            $table->string('open_view_image')->nullable();

            $table->string('sku')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('sale_price', 8, 2)->nullable();
            $table->string('quantity')->nullable();
            $table->string('allow_customer_checkout_when_this_product_out_of_stock')->nullable();

            $table->string('weight')->nullable();
            $table->string('length')->nullable();
            $table->string('breadth')->nullable();
            $table->string('height')->nullable();

            $table->string('country_of_origin')->nullable();
            $table->string('manufacture_details')->nullable();
            $table->string('packer_details')->nullable();


            $table->enum('is_variation', ['0', '1'])->comment('0=No,1=Yes');
            $table->longText('views')->nullable();

            $table->enum('is_featured', ['1', '2'])->comment('1=Yes,2=No');
            $table->enum('status', ['1', '2', '3'])->comment('1=Published,2=Draft,3=Pending');



            $table->longText('search_keywords')->nullable();
            $table->longText('meta_title')->nullable();
            $table->longText('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();


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
        //Schema::dropIfExists('products');
        Schema::table('products', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
