<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_sets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('items_id');
            $table->unsignedBigInteger('sets_id');
            $table->integer('quantity');
            $table->foreign('items_id')->references('id')->on('items');
            $table->foreign('sets_id')->references('id')->on('sets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_sets');
    }
}
