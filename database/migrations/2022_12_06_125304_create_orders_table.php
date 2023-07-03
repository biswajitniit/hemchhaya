<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		    $table->string('user_phone');
            $table->string('user_addresses_title')->nullable();
            $table->longText('user_full_shipping_and_billing_details_info');
            $table->dateTime('purchased_date');
            $table->string('edd')->nullable(); // Estimated date of delivery
            $table->enum('order_status', ['1', '2', '3', '4', '5', '6', '7', '8'])->comment('1=Pending,2=Order Received,3=In Progress,4=Delivered,5=cancel,6=Refound,7=order delivered not paid,8=return request')->default(1);
            $table->string('transaction_id')->nullable();
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
        Schema::table('orders', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

    }
}
