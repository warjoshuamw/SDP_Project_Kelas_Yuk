<?php

namespace Database\Seeders;

use App\Models\Murid;
use Illuminate\Database\Seeder;

class MuridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $item = Murid::create([
            'kelas_id'=>1,
            'pengguna_id'=>1,
        ]);
        $item->save();
        Murid::factory()->count(2)->create();
    }
}
