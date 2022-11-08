<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUseraddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('useraddresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->enum('address_type', ['0', '1'])->comment('0=Home,1=Work')->default('0');
            $table->string('name');
            $table->string('mobileno');
            $table->string('pincode');
            $table->string('locality')->nullable();;

            $table->longText('address_area_and_street')->nullable();
            $table->string('city_or_district_or_town')->nullable();
            $table->string('state')->nullable();
            $table->string('landmark')->nullable();
            $table->string('alternate_phone')->nullable();

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
        Schema::table('useraddresses', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
