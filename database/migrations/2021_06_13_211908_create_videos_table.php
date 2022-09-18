<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('categories');
            $table->string('filename');
            $table->integer('iduser')->unsigned();
            $table->integer('likes')->unsigned();
            $table->integer('dislikes')->unsigned();
            $table->integer('warning')->unsigned();
            //1-Нарушение – ролик не выводится на главной, не доступен на странице ролика, доступен для автора на его странице с роликами
            //2-Теневой бан – ролик не выводится на главной, доступен на странице ролика, доступен для автора на его странице с роликами
            //3-Бан – ролик не отображается нигде кроме панели администратора.
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
        Schema::dropIfExists('videos');
    }
}
