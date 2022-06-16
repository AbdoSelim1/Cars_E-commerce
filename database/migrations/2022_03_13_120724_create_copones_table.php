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
        Schema::create('copones', function (Blueprint $table) {
            $table->id();
            $table->integer('copone_code')->unique();
            $table->dateTime('start_copone');
            $table->dateTime('end_copone');
            $table->tinyInteger('status')->comment('0=>not active & 1=>active')->default(0);
            $table->string('discount',10);
            $table->string('discount_type',20);
            $table->float('min_order_price');
            $table->integer('max_discount_value');
            $table->integer('max_number_of_using');
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
        Schema::dropIfExists('copones');
    }
};
