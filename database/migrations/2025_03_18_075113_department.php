<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->string('DepartmentCode', 20)->primary(); // Cột DepartmentCode (varchar(20), khóa chính)
            $table->string('DepartmentName', 100);           // Cột DepartmentName (nvarchar(100))
            $table->string('Address', 255)->nullable();      // Cột Address (nvarchar(255), có thể NULL)
            $table->string('PhoneNumber', 15)->nullable();   // Cột PhoneNumber (varchar(15), có thể NULL)
            $table->timestamps();                            // Thêm created_at và updated_at (tùy chọn)
        });
    }

    public function down()
    {
        Schema::dropIfExists('departments');
    }
};
