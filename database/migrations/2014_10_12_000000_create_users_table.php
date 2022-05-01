<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('birthday');
            $table->tinyInteger('sex')->comment('0=男,1=女');
            $table->string('email', 255)->unique();
            $table->string('image')->comment('プロフィール画像')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('skill')->comment('スキル');
            $table->string('experience_year')->comment('実務経験');
            $table->string('github')->nullable()->comment('GitHub');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
          
        });
    }
}
