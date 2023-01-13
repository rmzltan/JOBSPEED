<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('user_seller_id');
            $table->unsignedBigInteger('user_id');
            $table->float('rating')->nullable();
            $table->string('message', 4000);
            $table->timestamps();
            $table
                ->foreign('service_id')
                ->references('id')
                ->on('service')
                ->onDelete('cascade');
            $table
                ->foreign('user_seller_id')
                ->references('id')
                ->on('user_sellers')
                ->onDelete('cascade');
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unique(['user_id', 'service_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
