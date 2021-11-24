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
            $table->increments('jawaban_murid_kuis_id');
            $table->foreignId('d_kuis_id');
            $table->foreignId('murid_id');
            $table->text('jawaban');
            $table->integer('nilai')->nullable();
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
        Schema::dropIfExists('Jawaban_Murid_Kuis');
    }
}
