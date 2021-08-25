<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('apocalypse_id')->unsigned();
            $table->foreign('apocalypse_id')->references('id')->on('apocalypses');
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('flavor');
            $table->string('image')->nullable();
            $table->enum('type', ['pc', 'npc', 'all'])->default('pc');
            $table->json('rules');

            $table->json('attacks');
            $table->json('gear');
            $table->json('moves');
            $table->json('special');

            $table->json('luck');
            $table->json('history');
            $table->json('looks');
            $table->json('ratings');

            $table->json('improvements');

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
        Schema::dropIfExists('classes');
    }
}
