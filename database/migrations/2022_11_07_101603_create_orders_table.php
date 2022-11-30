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
            $table->bigInteger('order_id')->unique();
            $table->string('serving_method');
            $table->tinyInteger('applied_coupons')->default(0);
            $table->double('total_price');
            $table->integer('unit');
            $table->string('payment_method');
            $table->string('delivery_address')->nullable();
            $table->string('delivery_status')->nullable();
            $table->string('tran_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->bigInteger('store_id');
            $table->foreign('store_id')->references('id')->on('stores');
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
