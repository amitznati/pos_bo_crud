<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZreportTable extends Migration
{
    /**
     * Run the migrations.
     * @table zreport
     *
     * @return void
     */
    public function up()
    {
        Schema::create('z_reports', function (Blueprint $table) {
            $table->increments('z_number');
            $table->integer('employee_id')->unsigned();
            $table->timestamp('reportDate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->decimal('reprot_total_amount', 19, 4);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('z_reports');
     }
}
