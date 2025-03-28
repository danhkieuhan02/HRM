<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id('CandidateID');
            $table->string('FullName', 100);
            $table->string('Email', 100);
            $table->string('PhoneNumber', 15)->nullable();
            $table->string('CVFile', 255)->nullable();
            $table->string('PositionApplied', 100)->nullable();
            $table->string('Status', 50)->nullable();
            $table->integer('JobID')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('candidates'); // Xóa bảng nếu rollback
    }
};
