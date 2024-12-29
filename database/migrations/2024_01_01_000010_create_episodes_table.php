<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('season_id');
            $table->integer('number');
            $table->string('thumbnail')->nullable();
            $table->string('title');
            $table->string('description', 900);
            $table->string('duration', 50);
            $table->integer('total_view')->default(0);
            $table->integer('total_download')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('episodes');
    }
} 