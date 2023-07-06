<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('product_category', function (Blueprint $table) {
            $table->id();
            $table->string('product_category_code')->unique();
            $table->string('product_category_name');
            $table->string('product_category_parent_code')->nullable();
            $table->string('product_category_type_code');
            $table->text('description')->nullable();
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
        //
        Schema::dropIfExists('product_category');
    }
}
