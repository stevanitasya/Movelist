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
        Schema::create('movieactors', function (Blueprint $table) {
            $table->id();
            $table->foreignId("actors_id");
            $table->foreign('actors_id')
                    ->references('id')
                    ->on('actors')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId("movies_id");
            $table->foreign('movies_id')
                    ->references('id')
                    ->on('movies')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('movieactors');
    }
};
