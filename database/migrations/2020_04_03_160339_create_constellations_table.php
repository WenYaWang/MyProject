<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstellationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constellations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('datadate');
            $table->string('name', 5);
            $table->integer('overall_score');
            $table->string('overall_desc', 200);
            $table->integer('love_score');
            $table->string('love_desc', 200);
            $table->integer('cause_score');
            $table->string('cause_desc', 200);
            $table->integer('forune_score');
            $table->string('forune_desc', 200);
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
        Schema::dropIfExists('constellations');
    }
}
