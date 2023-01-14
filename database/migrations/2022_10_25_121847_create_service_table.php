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
        if(!Schema::hasTable('service')){
            Schema::create('service', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_seller_id');
                $table->string('title');
                $table->string('category');
                $table->string('location');
                $table->integer('minPricing');
                $table->integer('maxPricing');
                $table->string('description', 2000);
                $table->string('service_image');
                $table->timestamps();
                $table->foreign('user_seller_id')
                ->references('id')
                ->on('user_sellers')
                ->onDelete('cascade');
            });
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service');
    }
};
