<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();

            // identity
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();

            // personal information
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female']);

            // contact information
            $table->string('email')->unique();
            $table->string('mobile_no', 11);

            // address
            $table->string('address');

            // user account credentials
            $table->string('password');


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
        Schema::dropIfExists('teachers');
    }
}
