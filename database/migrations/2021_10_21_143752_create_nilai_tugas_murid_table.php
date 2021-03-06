<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTugasMuridTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Nilai_Tugas_Murid', function (Blueprint $table) {
            $table->increments('nilai_tugas_murid_id');
            $table->foreignId('tugas_id');
            $table->foreignId('murid_id');
            $table->string('url_pengumpulan', 255)->nullable();
            $table->tinyInteger('nilai');
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
        Schema::dropIfExists('Nilai_Tugas_Murid');
    }
}
