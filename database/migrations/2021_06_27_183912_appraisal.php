<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Appraisal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisal', function(Blueprint $table) {
        $table->integer('iduser')->unsigned();
        $table->integer('appraisal')->unsigned();
        $table->integer('idvideo')->unsigned();
        //0-Оценки нету
        //1-Лайк поставлен
        //2-Дизлайк поставлен
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appraisal');
    }
}
