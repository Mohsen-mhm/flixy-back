<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmobTable extends Migration
{
    public function up()
    {
        Schema::create('admob', function (Blueprint $table) {
            $table->id();
            $table->string('banner_id');
            $table->string('intersial_id');
            $table->string('rewarded_id');
            $table->integer('type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admob');
    }
} 