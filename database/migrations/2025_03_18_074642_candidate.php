<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id('CandidateID');              // Cột CandidateID (khóa chính, auto_increment)
            $table->string('FullName', 100);        // Cột FullName (nvarchar(100) -> varchar(100))
            $table->string('Email', 100);           // Cột Email (varchar(100))
            $table->string('PhoneNumber', 15)->nullable(); // Cột PhoneNumber (varchar(15), có thể NULL)
            $table->string('CVFile', 255)->nullable();     // Cột CVFile (varchar(255), có thể NULL)
            $table->string('PositionApplied', 100)->nullable(); // Cột PositionApplied (nvarchar(100), có thể NULL)
            $table->string('Status', 50)->nullable();      // Cột Status (nvarchar(50), có thể NULL)
            $table->integer('JobID')->nullable();          // Cột JobID (int, có thể NULL)
            $table->timestamps();                          // Thêm created_at và updated_at (tùy chọn)
        });
    }

    public function down()
    {
        Schema::dropIfExists('candidates'); // Xóa bảng nếu rollback
    }
};
