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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('email',50)->unique();
            $table->string('phone',11)->unique();
            $table->enum('gender',['male','female']);
            $table->tinyInteger('status')->comment('0=>not active & 1=>active')->default(0);
            $table->string('password',200);
            $table->integer('code')->unique();
            $table->integer('forget_code')->unique()->nullable(true);
            $table->dateTime('email_vreifid_at');
            $table->dateTime('expiretion_code_at');
            $table->dateTime('activetion_code_at');
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
        Schema::dropIfExists('users');
    }
};
