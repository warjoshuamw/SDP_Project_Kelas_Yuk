<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PenggunaSeeder::class,
            KelasSeeder::class,
            MuridSeeder::class,
            FeedSeeder::class,
            ComentSeeder::class,
            ReplySeeder::class,
        ]);
    }
}
