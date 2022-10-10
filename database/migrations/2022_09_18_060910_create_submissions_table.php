<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('exam_id');
            $table->foreign('exam_id')->references('id')->on('exams')->cascadeOnDelete();
            $table->foreignId('student_id');
            $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete();
            $table->json('answers');
            $table->unsignedInteger('score');
            $table->boolean('finalized')->default(false);

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
        Schema::dropIfExists('submissions');
    }
}
