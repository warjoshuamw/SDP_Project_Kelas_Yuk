<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanMuridKuis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Jawaban_Murid_Kuis', function (Blueprint $table) {
            $table->id('jawaban_murid_kuis_id');
            $table->foreignId('d_kuis_id');
            $table->foreignId('murid_id');
            $table->text('jawaban');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Jawaban_Murid_Kuis');
    }
}
