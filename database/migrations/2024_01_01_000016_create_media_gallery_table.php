<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaGalleryTable extends Migration
{
    public function up()
    {
        Schema::create('media_gallery', function (Blueprint $table) {
            $table->id();
            $table->string('title', 55);
            $table->string('file', 555);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('media_gallery');
    }
} 