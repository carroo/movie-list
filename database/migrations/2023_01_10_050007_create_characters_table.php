<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('actor_id');
            $table->foreign('actor_id')->references('id')->on('actors')->onDelete('cascade');
            $table->unsignedBigInteger('movie_id');
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->string('play_as');
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
        Schema::dropIfExists('characters');
    }
}
