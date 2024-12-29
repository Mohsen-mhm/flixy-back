<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTvCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('tv_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tv_categories');
    }
} 