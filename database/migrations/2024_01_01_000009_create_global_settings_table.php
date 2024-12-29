<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('global_settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name', 55)->nullable();
            $table->boolean('is_live_tv_enable');
            $table->boolean('is_admob_android')->default(1)->comment('1=on 0=off');
            $table->boolean('is_admob_ios')->default(1)->comment('1=on 0=off');
            $table->boolean('is_custom_android')->default(1)->comment('1=on 0=off');
            $table->boolean('is_custom_ios')->default(1)->comment('1=on 0=off');
            $table->integer('videoad_skip_time')->default(8);
            $table->integer('storage_type')->default(0)->comment('0 = Local / 1 = AWS S3 / 2 = DigitalOcean Space');
            $table->timestamp('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('global_settings');
    }
} 