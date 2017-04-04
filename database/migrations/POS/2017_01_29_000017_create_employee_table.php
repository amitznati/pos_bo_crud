<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     * @table employee
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('full_name')->nullable()->default(null);
            $table->date('birthday')->nullable()->default(null);
            $table->string('phone', 50)->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('identifier', 50)->unique();
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
       Schema::dropIfExists('employees');
     }
}
