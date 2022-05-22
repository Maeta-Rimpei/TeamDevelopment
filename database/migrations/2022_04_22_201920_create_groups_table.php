<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50);
            $table->text('content')->comment('仕事内容');
            $table->string('deadline')->comment('納期');
            $table->string('reword')->comment('報酬');
            $table->string('number_applicants')->comment('応募人数');
            $table->string('count_applicants')->comment('応募中の人数');
            $table->string('number_selection')->comment('選抜人数');
            $table->string('required_skill')->comment('必要なスキル');
            $table->integer('user_id');
            $table->dateTime('term_of_apply');
            $table->dateTime('term_of_selection');
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
        Schema::dropIfExists('groups');
    }
}
