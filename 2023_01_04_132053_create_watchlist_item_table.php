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
        Schema::create('watchlist_item', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('watchlist_id');
            // $table->foreign('watchlist_id')
            //     ->references('id')
            //     ->on('watchlist')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
            // $table->foreignId('movies_id');
            // $table->foreign('movies_id')
            //     ->references('id')
            //     ->on('movies')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
            $table->string('status');
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
        Schema::dropIfExists('watchlist_item');
    }
};
