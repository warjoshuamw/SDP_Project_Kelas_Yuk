<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('D_Kuis', function (Blueprint $table) {
            $table->increments('d_kuis_id');
            $table->foreignId('kuis_id');
            $table->text('pertanyaan');
            $table->tinyInteger('pilihan')->nullable();
            $table->text('isian')->nullable();
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
        Schema::dropIfExists('D_Kuis');
    }
}
