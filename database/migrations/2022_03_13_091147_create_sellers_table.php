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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('email',50)->unique();
            $table->string('phone',11)->unique();
            $table->string('national_id',14)->unique();
            $table->enum('gender',['male','female']);
            $table->tinyInteger('status')->comment('0=>block & 1=>active')->default(0);
            $table->string('password',200);
            $table->string('social_links')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('sellers');
    }
};
