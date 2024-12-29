<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopContentsTable extends Migration
{
    public function up()
    {
        Schema::create('top_contents', function (Blueprint $table) {
            $table->id();
            $table->integer('content_index');
            $table->integer('content_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('top_contents');
    }
} 