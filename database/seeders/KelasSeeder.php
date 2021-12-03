<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $item = Kelas::create([
            'pengguna_id'=>2,
            'kelas_kode'=>'qwe12r',
            'kelas_nama'=>'Matematika',
            'kelas_deskripsi'=>'ini kelas matematika Mahasiswa ISTTS semester 3',
            'waktu_mulai'=>'2021-11-25 16:07:00',
            'waktu_selesai'=>'2021-11-25 19:07:00',
            'status'=>1,
        ]);
        $item->save();
    }
}
