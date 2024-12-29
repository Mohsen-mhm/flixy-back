<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomAdsTable extends Migration
{
    public function up()
    {
        Schema::create('custom_ads', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('brand_logo', 555)->nullable();
            $table->string('button_text')->nullable();
            $table->integer('is_android')->nullable()->comment('1=yes 0=no');
            $table->string('android_link', 555)->nullable();
            $table->boolean('is_ios')->nullable()->comment('1=yes 0=no');
            $table->string('ios_link', 555)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('status')->default(0)->comment('0=off 1=on');
            $table->integer('views')->default(0);
            $table->integer('clicks')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('custom_ads');
    }
} 