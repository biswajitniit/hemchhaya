<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('banner_order')->nullable();
			$table->string('banner_text_top')->nullable();
            $table->string('banner_text_middle')->nullable();
            $table->string('banner_text_buttom')->nullable();
			$table->string('banner_url')->nullable();
			$table->string('banner_image')->nullable();
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
        Schema::dropIfExists('banners');
    }
}
