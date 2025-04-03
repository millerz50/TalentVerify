<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('registration_date');
            $table->string('registration_number');
            $table->string('address');
            $table->string('contact_person');
            $table->text('departments')->nullable(); // Comma-separated
            $table->integer('number_of_employees')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamps(); // Automatically adds 'created_at' & 'updated_at'
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
?>


