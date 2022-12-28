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
            $table->foreignId('role_id')->default(1);
            $table->foreignId('shop_id')->default(0);
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->string('name', 50);
            $table->string('phone_number', 13)->unique();
            $table->date('birth_date');
            $table->tinyInteger('gender');
            $table->text('address');
            $table->integer('balance')->default(0);
            $table->string('picture', 255);
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
