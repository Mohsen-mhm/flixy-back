<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTvChannelsTable extends Migration
{
    public function up()
    {
        Schema::create('tv_channels', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('thumbnail')->nullable();
            $table->boolean('access_type')->default(0)->comment('1 = Free / 2 = Paid / 3 = Unlock With Video Ads');
            $table->text('category_ids')->nullable();
            $table->tinyInteger('type')->default(0)->comment('1 = Youtube URL, 2 = M3u8 Url');
            $table->text('source')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tv_channels');
    }
} 