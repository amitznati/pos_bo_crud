<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderlineTable extends Migration
{
    /**
     * Run the migrations.
     * @table orderline
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->double('quantity');
            $table->decimal('product_unit_price', 19, 4);
            $table->decimal('product_total_price', 19, 4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('order_lines');
     }
}
