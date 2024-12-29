<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname', 50)->nullable();
            $table->string('email', 55)->nullable();
            $table->boolean('login_type')->default(0)->comment('1 = Google / 2 = Apple / 3 = Email');
            $table->text('identity')->nullable();
            $table->text('profile_image')->nullable();
            $table->string('watchlist_content_ids')->nullable();
            $table->boolean('device_type')->default(0)->comment('0 = Andriod, 1 = iOS');
            $table->text('device_token')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
} 