<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubtitlesTable extends Migration
{
    public function up()
    {
        Schema::create('subtitles', function (Blueprint $table) {
            $table->id();
            $table->string('content_id', 8);
            $table->integer('language_id');
            $table->string('file', 555);
            $table->timestamp('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subtitles');
    }
} 