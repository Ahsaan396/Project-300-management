<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
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
            $table->string('name1');
            $table->string('name2')->nullable();
            $table->string('student_id1')->unique();
            $table->string('student_id2')->unique()->nullable();
            $table->string('batch1');
            $table->string('batch2')->nullable();
            $table->string('pname');
            $table->string('number')->nullable();
            $table->foreignId('supervisorID')->nullable()->references('id')->on('users');
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
