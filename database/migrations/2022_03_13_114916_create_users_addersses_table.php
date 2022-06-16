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
        Schema::create('users_addersses', function (Blueprint $table) {
            $table->id();
            $table->string('floor',50)->nullable(true);
            $table->string('flat',50)->nullable(true);
            $table->string('blading',50)->nullable(true);
            $table->string('street',50)->nullable(true);
            $table->string('notes',500)->nullable(true);
            $table->tinyInteger('status')->comment('0 => not active 1=>active')->default(0);
            $table->float('latable',3,3)->nullable(true);
            $table->float('longable',3,3)->nullable(true);
            $table->foreignId('user_id');
            $table->foreignId('region_id');
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
        Schema::dropIfExists('users_addersses');
    }
};
