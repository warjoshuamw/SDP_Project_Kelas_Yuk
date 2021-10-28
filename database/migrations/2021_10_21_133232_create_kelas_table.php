<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Kelas', function (Blueprint $table) {
            $table->integer('kelas_id')->primary();
            $table->foreignId('pengguna_id');
            $table->string('kelas_kode')->unique();
            $table->string('kelas_nama');
            $table->date('waktu_mulai');
            $table->date('waktu_selesai');
            $table->boolean('status');
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
        Schema::dropIfExists('Kelas');
    }
}
