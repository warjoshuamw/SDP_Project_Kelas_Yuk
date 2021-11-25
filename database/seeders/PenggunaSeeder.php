<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pass=Hash::make("123");
        $item = Pengguna::create([
            'pengguna_nama'=>'Andre Sugianto putra',
            'pengguna_email'=>'andrehebat95@gmail.com',
            'pengguna_password'=>$pass,
            'pengguna_peran'=>0,
            'pengguna_tampilan'=>0,
        ]);
        $item->save();
        $item = Pengguna::create([
            'pengguna_nama'=>'Joshua Mishael',
            'pengguna_email'=>'warjoshua@gmail.com',
            'pengguna_password'=>$pass,
            'pengguna_peran'=>1,
            'pengguna_tampilan'=>0,
        ]);
        $item->save();
    }
}
