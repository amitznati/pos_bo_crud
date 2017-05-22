<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('propertyable');
            $table->integer('type')->unsigned();
            $table->longText('valid_values')->nullable();
            $table->boolean('mandatory')->default(false);
            $table->timestamps();

            $table->foreign('type', 'FK_PType_PropertyType')
                ->references('id')->on('property_types')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
