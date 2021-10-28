<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Kuis', function (Blueprint $table) {
            $table->id('kuis_id');
            $table->foreignId('kelas_id');
            $table->dateTime('batas_awal');
            $table->dateTime('batas_akhir');
            $table->boolean('status');
            $table->boolean('randomable');
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
        Schema::dropIfExists('Kuis');
    }
}
