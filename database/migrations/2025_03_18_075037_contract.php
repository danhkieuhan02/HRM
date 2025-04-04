    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        public function up()
        {
            Schema::create('contracts', function (Blueprint $table) {
                $table->string('contract_code', 20)->primary();
                $table->string('ContractType', 50);
                $table->date('StartDate');
                $table->date('EndDate')->nullable();
                $table->text('Note')->nullable();
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('contracts');
        }
    };
