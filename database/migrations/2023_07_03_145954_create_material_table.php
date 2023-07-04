<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material', function (Blueprint $table) {
            $table->string('material_code')->unique();
            $table->string('material_name');
            $table->string('material_nickname');
            $table->string('uom_code');
            $table->foreign('uom_code')->references('uom_code')->on('uom');
            $table->string('composit')->nullable();
            $table->string('merk');
            $table->string('type');
            $table->text('spesification')->nullable();
            $table->string('serial_number');
            $table->string('material_category_1');
            $table->foreign('material_category_1')->references('material_category_code')->on('material_category');
            $table->text('description')->nullable();
            $table->string('user_updated')->nullable();
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
        Schema::dropIfExists('material');
    }
}
