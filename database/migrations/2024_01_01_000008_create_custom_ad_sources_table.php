<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomAdSourcesTable extends Migration
{
    public function up()
    {
        Schema::create('custom_ad_sources', function (Blueprint $table) {
            $table->id();
            $table->integer('custom_ad_id');
            $table->integer('type')->default(0)->comment('0 = Image / 1 = Video');
            $table->string('content');
            $table->string('headline');
            $table->string('description');
            $table->integer('show_time')->nullable();
            $table->integer('is_skippable')->nullable()->comment('0 = Must Watch / 1 = Skippable');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('custom_ad_sources');
    }
} 