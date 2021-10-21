<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pengguna', function (Blueprint $table) {
            $table->integer('pengguna_id')->primary();
            $table->string('pengguna_nama', 100);
            $table->string('pengguna_email', 150);
            $table->string('pengguna_password', 50);
            $table->boolean('pengguna_peran');
            $table->boolean('pengguna_tampilan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Pengguna');
    }
}
