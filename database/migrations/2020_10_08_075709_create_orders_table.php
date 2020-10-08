<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_id');
            $table->double('subtotal');
            $table->double('grandtotal');
            $table->double('cash');
            $table->unsignedBigInteger('cashiers_id');
            $table->unsignedBigInteger('shifts_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->foreign('cashiers_id')->references('id')->on('cashiers');
            $table->foreign('shifts_id')->references('id')->on('shifts');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('discount_id')->references('id')->on('discounts');
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
}
