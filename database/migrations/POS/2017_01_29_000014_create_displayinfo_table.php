<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisplayinfoTable extends Migration
{
    /**
     * Run the migrations.
     * @table itemdisplayinfo
     *
     * @return void
     */
    public function up()
    {
        Schema::create('display_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id')->unsigned();
            $table->morphs('displayable');
            $table->string('display_name', 50);
            $table->integer('x');
            $table->integer('y');
            $table->integer('width');
            $table->integer('height');
            $table->longText('display_properties')->nullable()->default(null);
            $table->string('backgroundColor', 50)->nullable()->default(null);
            $table->string('text_color', 50)->nullable()->default(null);
            $table->string('font_family', 50)->nullable()->default(null);
            $table->longText('image')->nullable()->default(null);
            $table->string('font_size', 10)->nullable()->default(null);

            $table->foreign('menu_id', 'FK_ItemDisplayInfo_Menu')
                ->references('id')->on('menus')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('item_display_info');
     }
}
