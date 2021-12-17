<?php

namespace Database\Factories;

use App\Models\Kelas;
use App\Models\Pengguna;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class KelasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kelas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'pengguna_id'=> $this->faker->randomElement(Pengguna::where('pengguna_peran','=',0)->get()->pluck('pengguna_id')),
            // 'pengguna_id'=> 2,
            'kelas_kode' => $this->faker->unique()->randomElement(['asd123','k93mmf','oeb09c','dzo3ds','p10czo']),
            'kelas_nama'=> $this->faker->unique()->randomElement(['Sejarah','Ekonomi','PKN','Inggris','Indonesia']),
            'kelas_deskripsi'=> '',
            'waktu_mulai'=> Carbon::now(),
            'waktu_selesai'=> Carbon::now()->addHours(2),
            'status'=> '1',
        ];
    }
}
