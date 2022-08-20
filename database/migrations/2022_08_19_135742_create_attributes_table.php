<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('column_name');
            $table->string('column_slug');
            $table->enum('column_type', ['1', '2', '3', '4', '5', '6'])->comment('1=TextBox,2=DropDown,3=Editor,4=Password,5=Email');
            $table->enum('column_validation',['1', '2'])->comment('1=Optional,2=Required');
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
        //Schema::dropIfExists('attributes');
        Schema::table('attributes', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
