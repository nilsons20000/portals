<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    public function up()
    {
       Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('role_id')->unsigned()->default('0');
            $table->string('name');
            $table->string('email');
            $table->string('provider');
            $table->string('provider_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    }