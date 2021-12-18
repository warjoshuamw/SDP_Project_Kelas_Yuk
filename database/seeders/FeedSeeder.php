<?php

namespace Database\Seeders;

use App\Models\Feed;
use Illuminate\Database\Seeder;

class FeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $item = Feed::create([
            'kelas_id'=>1,
            'pengguna_id'=>2,
            'feed_creator'=>'Joshua Mishael',
            'keterangan'=>'Halo muridku, jangan lupa besok ada kelas ya !!!!',
        ]);
        $item->save();
    }
}
