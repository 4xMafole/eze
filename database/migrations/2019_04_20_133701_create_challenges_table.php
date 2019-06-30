<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_post');
            $table->string('user_post_id');
            $table->string('user_avatar')->nullable();
            $table->string('user_name');
            $table->integer('user');
            $table->string('challenger_post');
            $table->string('challenger_post_id');
            $table->string('challenger_avatar')->nullable();
            $table->string('challenger_name');
            $table->integer('challenger');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challenges');
    }
}
