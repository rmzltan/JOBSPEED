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
            $table->unsignedBigInteger('service_id');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('date');
            $table->time('time');;
            $table->string('email');
            $table->string('contact');
            $table->string('city');
            $table->string('street');
            $table->string('message',1000);
            $table->string('status')->default('pending');
            $table->string('payment')->default('ToPay');
            $table->timestamps();
            $table->foreign('service_id')
            ->references('user_seller_id')
            ->on('service')
            ->onDelete('cascade');
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
