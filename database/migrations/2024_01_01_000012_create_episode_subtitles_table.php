<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodeSubtitlesTable extends Migration
{
    public function up()
    {
        Schema::create('episode_subtitles', function (Blueprint $table) {
            $table->id();
            $table->integer('episode_id');
            $table->integer('language_id');
            $table->string('file');
            $table->timestamp('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('episode_subtitles');
    }
} 