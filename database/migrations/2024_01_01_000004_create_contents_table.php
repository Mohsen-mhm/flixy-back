<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('type')->default(0)->comment('1 = movie / 2 = series');
            $table->string('duration', 50)->nullable();
            $table->integer('release_year');
            $table->float('ratings')->default(0);
            $table->integer('language_id');
            $table->string('trailer_url')->nullable();
            $table->string('vertical_poster')->nullable();
            $table->string('horizontal_poster')->nullable();
            $table->string('genre_ids');
            $table->boolean('is_featured')->default(0)->comment('0 = unfeatured / 1 = featured');
            $table->boolean('is_show')->default(1)->comment('0 = Hide content / 1 = Show Content');
            $table->integer('total_view')->default(0);
            $table->integer('total_download')->default(0);
            $table->integer('total_share')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contents');
    }
} 