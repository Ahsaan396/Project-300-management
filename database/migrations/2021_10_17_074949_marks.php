<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Marks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id()->nullable();
            $table->foreignId('supervisorID')->nullable()->references('id')->on('users');
            $table->bigInteger('bMId1')->nullable();
            $table->bigInteger('bMId2')->nullable();
            $table->bigInteger('rRId1')->nullable();
            $table->bigInteger('rRId2')->nullable();
            $table->bigInteger('sM')->nullable();
            $table->bigInteger('bM1')->nullable();
            $table->bigInteger('bM2')->nullable();
            $table->bigInteger('rM1')->nullable();
            $table->bigInteger('rM2')->nullable();
            $table->bigInteger('tot_mark')->nullable();
            $table->string('status')->nullable();
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
        //
    }
}
