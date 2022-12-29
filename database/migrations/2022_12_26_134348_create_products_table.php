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
            $table->foreignId('category_id');
            $table->foreignId('shop_id');
            $table->string('name', 255);
            $table->integer('price');
            $table->integer('stock');
            $table->text('description');
            $table->string('image', 255);
            $table->string('licensing_term', 30);
            $table->string('manufacture', 50);
            $table->integer('max_user');
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
        Schema::dropIfExists('prducts');
    }
};
