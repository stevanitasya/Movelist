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
        Schema::create('moviegenre', function (Blueprint $table) {
            $table->id();
            $table->foreignId("movies_id");
            $table->foreign('movies_id')
                    ->references('id')
                    ->on('movies')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId("genre_id");
            $table->foreign('genre_id')
                    ->references('id')
                    ->on('genre')
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
        Schema::dropIfExists('moviegenre');
    }
};
