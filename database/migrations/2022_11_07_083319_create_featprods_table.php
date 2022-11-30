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
        Schema::create('featprods', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('featprod_id')->unique();
            $table->string('name');
            $table->bigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->bigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('featprods');
    }
};
