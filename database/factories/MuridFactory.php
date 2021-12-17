<?php

namespace Database\Factories;

use App\Models\Kelas;
use App\Models\Murid;
use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Factories\Factory;

class MuridFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Murid::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'kelas_id' => $this->faker->randomElement(Kelas::all()->pluck('kelas_id')),
            // 'kelas_id' => '1',
            'pengguna_id' =>$this->faker->randomElement(Pengguna::where('pengguna_peran','=',1)->get()->pluck('pengguna_id')),
        ];
    }
}
