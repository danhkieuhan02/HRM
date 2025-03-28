<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employee_positions', function (Blueprint $table) {
            $table->string('employee_position_code', 20)->primary();
            $table->string('employee_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_positions');
    }
};
