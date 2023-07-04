<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('product_code')->unique();
            $table->string('product_name');
            $table->string('product_nickname');
            $table->string('uom_code');
            $table->foreign('uom_code')->references('uom_code')->on('uom');
            $table->string('composit')->nullable();
            $table->string('merk');
            $table->string('type');
            $table->text('spesification')->nullable();
            $table->string('serial_number');
            $table->float('price');
            $table->string('valid_start_at')->nullable();
            $table->string('valid_start_end')->nullable();
            $table->string('product_category_1');
            $table->foreign('product_category_1')->references('product_category_code')->on('product_category');
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
        Schema::dropIfExists('product');
    }
}
