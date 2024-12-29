<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_pages', function (Blueprint $table) {
            $table->id();
            $table->mediumText('privacy')->nullable();
            $table->mediumText('termsofuse')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_pages');
    }
} 