<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentSourcesTable extends Migration
{
    public function up()
    {
        Schema::create('content_sources', function (Blueprint $table) {
            $table->id();
            $table->integer('content_id');
            $table->string('title');
            $table->string('quality');
            $table->string('size')->nullable();
            $table->integer('is_download')->default(0)->comment('0 = no/ 1 = yes');
            $table->boolean('access_type')->default(0)->comment('1 = Free / 2 = Paid/ 3 = Unlock With Video Ads');
            $table->integer('type')->default(0)->comment('1 for Youtube URL, 2 for M3u8 Url, 3 for Mov Url, 4 for Mp4 Url, 5 for Mkv Url, 6 for Webm Url, 7 for File Upload');
            $table->text('source')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('content_sources');
    }
} 