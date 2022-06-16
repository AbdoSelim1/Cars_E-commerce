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
            $table->integer('order_code')->unique();
            $table->tinyInteger('status')->comment('0=>not active & 1=>active')->default(0);
            $table->float('total_price');
            $table->integer('count_products');
            $table->dateTime('deliver_date');
            $table->unsignedBigInteger('copone_id');
            $table->unsignedBigInteger('user_address_id');
            $table->foreign('copone_id')->references('id')->on('copones');
            $table->foreign('user_address_id')->references('id')->on('users_addersses');
            $table->foreignid('payment_id');
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
