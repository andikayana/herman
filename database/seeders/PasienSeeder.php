<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Pasien;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100000; $i++) {
            Pasien::create([
                'nama' => Str::random(20),
                'jenis_kelamin' => ('Perempuan'),
                'alamat' => Str::random(30),
                'tanggal_lahir' => Carbon::now()->subMinutes(rand(1, 55)),
                'keterangan' => Str::random(50),
            ]);
        }
    }
}
