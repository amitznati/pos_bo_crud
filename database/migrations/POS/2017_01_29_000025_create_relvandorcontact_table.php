<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelvandorcontactTable extends Migration
{
    /**
     * Run the migrations.
     * @table relvandorcontact
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_vandor_contact', function (Blueprint $table) {
            $table->integer('vendor_id')->unsigned();
            $table->integer('contact_id')->unsigned();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('rel_vandor_contact');
     }
}
