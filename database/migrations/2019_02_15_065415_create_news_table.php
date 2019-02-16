<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()// titleとbodyとimage_pathを追記
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); //ニュースのタイトル保存するカラム
            $table->string('body'); //ニュースの本文保存
            $table->string('image_path')->nullable(); //画像のパスを保存
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
        Schema::dropIfExists('news');
    }
}
