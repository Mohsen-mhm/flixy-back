<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentCastTable extends Migration
{
    public function up()
    {
        Schema::create('content_cast', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('content_id');
            $table->integer('actor_id');
            $table->text('character_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('content_cast');
    }
} 