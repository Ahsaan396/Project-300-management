<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Acceptance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acceptances', function (Blueprint $table) {
            $table->id()->nullable();
            $table->foreignId('supervisorID')->nullable()->references('id')->on('users');
            $table->bigInteger('bMId1')->nullable();
            $table->bigInteger('bMId2')->nullable();
            $table->bigInteger('rRId1')->nullable();
            $table->bigInteger('rRId2')->nullable();
            $table->string('acceptance')->nullable();
            $table->string('bMember1')->nullable();
            $table->string('bMember2')->nullable();
            $table->string('rReviewer1')->nullable();
            $table->string('rReviewer2')->nullable();
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
        Schema::dropIfExists('acceptances');
    }
}
