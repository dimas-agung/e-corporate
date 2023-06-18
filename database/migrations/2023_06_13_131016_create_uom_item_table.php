<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUomItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uom_item', function (Blueprint $table) {
            $table->id();
            $table->string('uom_code');
            $table->text('uom_desc');
            $table->string('to_uom_code');
            $table->text('to_uom_desc');
            $table->text('item_number');
            $table->float('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uom_item');
    }
}