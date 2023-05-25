<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('employee_code')->unique();
            $table->string('employee_name');
            $table->string('nik');
            $table->string('department_code');
            $table->string('section_code');
            $table->string('birth_date');
            $table->string('birth_place');
            $table->string('phone_number');
            $table->string('phone_number_2')->nullable();
            $table->string('email');
            $table->string('gender');
            $table->string('religion');
            $table->string('grade_title_code');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('address');
            $table->string('address_2')->nullable();
            $table->string('direct_leader_code')->nullable()->comment('employee_code leader');
            $table->string('status_job');
            $table->text('job_title')->nullable();
            $table->string('marital_status_code');
            $table->string('bank_code');
            $table->string('rekening_number');
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
        Schema::dropIfExists('employee');
    }
}
