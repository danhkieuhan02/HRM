<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('RoleID')->constrained('Role', 'RoleID')->onDelete('cascade')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('IsAdmin')->default(false); // Thêm cột IsAdmin
            $table->timestamps();
            $table->string('remember_token', 100)->nullable();
            $table->unsignedBigInteger('RoleID')->default(1)->change();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
