<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAuthenticationFieldsToEmployeesTable extends Migration
{
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('username')->unique()->after('name'); // Add username
            $table->string('email')->unique()->after('username'); // Add email
            $table->string('password')->after('email'); // Add password
        });
    }

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn(['username', 'email', 'password']);
        });
    }
}
?>