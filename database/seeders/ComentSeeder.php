<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class ComentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $item = Comment::create([
            'feed_id'=>1,
            'pengguna_id'=>1,
            'comment_creator'=>'Andre Sugianto putra',
            'keterangan'=>'Tidak mau pak, saya mau bolos !!',
        ]);
        $item->save();
    }
}
