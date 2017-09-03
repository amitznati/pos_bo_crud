<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesaleryTable extends Migration
{
    /**
     * Run the migrations.
     * @table employeesalery
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_salery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->integer('salery_type_id')->unsigned();
            $table->decimal('amount', 19, 4);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('employee_salery');
     }
}
