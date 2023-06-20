<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencysettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencysettings', function (Blueprint $table) {
            $table->id();
            $table->enum('base_code',['INR'])->default('INR');
            $table->string('currency_sort_code');
            $table->string('currency_country_fullname');
            $table->string('conversion_rates');
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
        Schema::dropIfExists('currencysettings');
    }
}
