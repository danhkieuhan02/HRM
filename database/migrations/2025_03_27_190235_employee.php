<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create(
            'employees',
            function (Blueprint $table) {
                $table->string('employee_code', 20)->primary();
                $table->string('full_name', 100);
                $table->date('birthday')->nullable();
                $table->string('hometown', 255)->nullable();
                $table->string('image', 255)->nullable();
                $table->string('gender', 10)->nullable();
                $table->string('ethnic', 50)->nullable();
                $table->string('phone_number', 15)->nullable();
                $table->string('status', 20)->nullable();
                $table->string('department_code', 20)->nullable();
                $table->string('employee_position_code', 20)->nullable();
                $table->string('contract_code', 20)->nullable();
                $table->string('education_level_code', 20)->nullable();

                // Định nghĩa khóa ngoại
                $table->foreign('department_code')->references('department_code')->on('departments');
                $table->foreign('employee_position_code')->references('employee_position_code')->on('employee_positions');
                $table->foreign('contract_code')->references('contract_code')->on('contracts');
                $table->foreign('education_level_code')->references('education_level_code')->on('education_levels');

                $table->timestamps();
            }
        );
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
