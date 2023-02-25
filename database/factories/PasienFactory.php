<?php

namespace Database\Factories;

use App\Models\Pasien;
use Illuminate\Database\Eloquent\Factories\Factory;

class PasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Pasien::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->nama(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki - laki', 'Perempuan']),
            'alamat' => $this->faker->alamat(),
            'tanggal_lahir' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'keterangan' => $this->faker->keterangan(),
        ];
    }
}
