<?php

namespace Database\Factories;

use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class PenggunaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pengguna::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $first_name = $this->faker->unique()->firstName();
        $last_name = $this->faker->unique()->lastName();
        return [
            //
            'pengguna_nama'=> $first_name." ".$last_name,
            'pengguna_email'=>$first_name.".".$last_name."@gmail.com",
            'pengguna_password'=> Hash::make("123"),
            'pengguna_peran'=> $this->faker->numberBetween(0,1),
            'pengguna_tampilan'=> $this->faker->numberBetween(0,1),
        ];
    }
}
