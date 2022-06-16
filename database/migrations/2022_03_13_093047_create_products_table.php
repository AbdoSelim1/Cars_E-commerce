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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->float('price');
            $table->integer('quantity');
            $table->tinyInteger('status')->comment('0=>not active & 1=>active')->default(0);
            $table->string('image',100);
            $table->string('description',1000);
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('categorey_id');
            $table->unsignedBigInteger('seller_id');
            $table->foreign('categorey_id')->references('id')->on('categories');
            $table->foreign('model_id')->references('id')->on('models');
            $table->foreign('seller_id')->references('id')->on('sellers');
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
        Schema::dropIfExists('products');
    }
};
