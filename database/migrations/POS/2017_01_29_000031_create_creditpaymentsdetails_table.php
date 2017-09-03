<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditpaymentsdetailsTable extends Migration
{
    /**
     * Run the migrations.
     * @table creditpaymentsdetails
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_payments_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('credit_payment_id')->unsigned();
            $table->integer('PaymentNumber');
            $table->decimal('Amount', 19, 4);
            $table->timestamp('pay_date')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('credit_payments_details');
     }
}
