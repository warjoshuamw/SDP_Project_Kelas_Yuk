<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tugas', function (Blueprint $table) {
            $table->id('tugas_id');
            $table->foreignId('kelas_id');
            $table->date('batas_awal');
            $table->date('batas_akhir');
            $table->longText('keterangan');
            $table->boolean('status');
            $table->string('url_soal', 255);
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
        Schema::dropIfExists('Tugas');
    }
}
