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
        Schema::create('watch_list_item', function (Blueprint $table) {
            $table->id();
            // $table->foreign('watch_list_id')
            //     ->references('id')
            //     ->on('watch_list')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
            // $table->foreign('movies_id')
            //     ->references('id')
            //     ->on('movies')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
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
        Schema::dropIfExists('watch_list_item');
    }
};
