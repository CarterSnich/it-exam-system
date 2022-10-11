<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            // user account credentials
            $table->string('student_id')->nullable();
            $table->string('password');

            // identity
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();

            // personal information
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();

            // contact information
            $table->string('email')->nullable();
            $table->string('mobile_no', 11);

            // address
            $table->string('address')->nullable();

            // student information
            $table->string('section')->nullable();
            $table->string('course')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
