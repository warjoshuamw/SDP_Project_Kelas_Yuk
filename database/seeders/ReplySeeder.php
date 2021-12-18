<?php

namespace Database\Seeders;

use App\Models\Reply;
use Illuminate\Database\Seeder;

class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $item = Reply::create([
            'comment_id'=>1,
            'pengguna_id'=>1,
            'reply_creator'=>'Andre Sugianto putra',
            'keterangan'=>'hehe saya bercanda pak',
        ]);
        $item->save();
    }
}
