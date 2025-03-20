<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->string('ContractCode', 20)->primary(); // Cột ContractCode (varchar(20), khóa chính)
            $table->string('ContractType', 50);           // Cột ContractType (nvarchar(50))
            $table->date('StartDate');                    // Cột StartDate (date)
            $table->date('EndDate')->nullable();          // Cột EndDate (date, có thể NULL)
            $table->text('Note')->nullable();             // Cột Note (nvarchar(max) -> text)
            $table->timestamps();                         // Thêm created_at và updated_at (tùy chọn)
        });
    }

    public function down()
    {
        Schema::dropIfExists('contracts');
    }
};
