<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('education_levels', function (Blueprint $table) {
            $table->string('education_level_code', 20)->primary();
            $table->string('education_level_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('education_levels');
    }
};
