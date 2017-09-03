<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     * @table order
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('customer_id')->unsigned()->nullable()->default(null);
            $table->integer('employee_id')->unsigned();
            $table->boolean('IsCloseInZ')->default(false);
            $table->integer('z_num')->unsigned()->nullable()->default(null);
            $table->integer('daily_number')->unsigned()->default('0');
            $table->integer('pos_id')->unsigned();
            $table->integer('order_payment_id')->unsigned();

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
