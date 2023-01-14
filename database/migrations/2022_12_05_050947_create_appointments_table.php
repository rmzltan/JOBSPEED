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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('user_seller_id');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('date');
            $table->time('time');;
            $table->string('email');
            $table->string('contact');
            $table->string('city');
            $table->string('street');
            $table->string('message',2000);
            $table->string('status')->default('pending');
            $table->string('payment')->default('ToPay');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('service')->onDelete('cascade');
            $table->foreign('user_seller_id')->references('id')->on('user_sellers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
};
