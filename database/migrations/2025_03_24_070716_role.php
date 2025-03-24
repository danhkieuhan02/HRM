<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('Role', function (Blueprint $table) {
            $table->id('RoleID'); // Khóa chính RoleID
            $table->string('RoleName', 50)->unique();
            $table->string('Description', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('Role');
    }
};
