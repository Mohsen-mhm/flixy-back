<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodeSourcesTable extends Migration
{
    public function up()
    {
        Schema::create('episode_sources', function (Blueprint $table) {
            $table->id();
            $table->integer('episode_id');
            $table->string('title', 50);
            $table->string('quality', 50);
            $table->string('size', 30)->nullable();
            $table->integer('is_download')->default(0)->comment('0 = no / 1 = yes');
            $table->boolean('access_type')->default(0)->comment('1 = Free/ 2 = Paid / 3 = Unlock With Video Ads');
            $table->tinyInteger('type')->default(0)->comment('1 for Youtube URL, 2 for M3u8 Url, 3 for Mov Url, 4 for Mp4 Url, 5 for Mkv Url, 6 for Webm Url, 7 for File Upload');
            $table->string('source')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('episode_sources');
    }
} 