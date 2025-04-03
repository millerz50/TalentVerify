<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('employee_id')->nullable(); // Optional employee ID
            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete();
            $table->string('department');
            $table->string('role');
            $table->date('start_date');
            $table->date('end_date')->nullable(); // Nullable for ongoing roles
            $table->text('duties')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}

?>
