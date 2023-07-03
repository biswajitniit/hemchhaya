<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->decimal('product_price', $precision = 8, $scale = 2);
            $table->decimal('product_tax_price', $precision = 8, $scale = 2)->nullable();
            $table->decimal('product_shipping_charge', $precision = 8, $scale = 2)->nullable();
            $table->decimal('product_final_price', $precision = 8, $scale = 2)->nullable();
            $table->bigInteger('product_quantity');
            $table->dateTime('order_date', $precision = 0);
            $table->enum('order_status', ['1', '2', '3', '4', '5', '6', '7', '8'])->comment('1=Pending,2=Order Received,3=In Progress,4=Delivered,5=cancel,6=Refound,7=order delivered not paid,8=return request')->default(1);
			$table->string('transaction_id')->nullable();
            $table->dateTime('return_request_date', $precision = 0)->nullable();
            $table->enum('return_request_status', ['Return Processing', 'Return Reject', 'Not Illigble', 'Complete'])->default('Return Processing');
            $table->longText('return_request_comments')->nullable();
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
        Schema::dropIfExists('order_products');
    }
}
