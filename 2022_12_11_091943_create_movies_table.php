<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations. 
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            // $table->foreignId("actors_id");
            // $table->foreign('actors_id')
            //         ->references('id')
            //         ->on('actors')
            //         ->onUpdate('cascade')
            //         ->onDelete('cascade');
            // $table->foreignId("genre_id");
            // $table->foreign('genre_id')
            //         ->references('id')
            //         ->on('genre')
            //         ->onUpdate('cascade')
            //         ->onDelete('cascade');
            $table->string('title');
            $table->string('description');
            $table->string('director');
            $table->string('release_date');
            $table->string('thumbnail');
            $table->string('background');
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
        Schema::dropIfExists('movies');
    }
};
