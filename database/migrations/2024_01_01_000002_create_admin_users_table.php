<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUsersTable extends Migration
{
    public function up()
    {
        Schema::create('admin_user', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('user_password');
            $table->integer('user_type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin_user');
    }
} 