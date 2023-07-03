<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTrackingShiprocketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_tracking_shiprockets', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('shiprocket_order_id');
            $table->string('shipment_id')->nullable();
            $table->string('status')->nullable();
            $table->string('status_code')->nullable();
            $table->string('onboarding_completed_now')->nullable();
            $table->string('awb_code')->nullable();
            $table->string('courier_company_id')->nullable();
            $table->string('courier_name')->nullable();
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
        Schema::dropIfExists('order_tracking_shiprockets');
    }
}
