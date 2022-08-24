<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('fname');
            $table->string('user_id');
            $table->bigInteger('total');
            $table->string('lname');
            $table->string('email');
            $table->integer('phone');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('country');
            $table->string('pincode');
            $table->tinyInteger('o_status')->default('0');
            $table->string('message')->nullable();
            $table->string('track_no');
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
        Schema::dropIfExists('orders');
    }
};
