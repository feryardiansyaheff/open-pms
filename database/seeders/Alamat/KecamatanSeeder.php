<?php

namespace Database\Seeders\Alamat;

use App\Models\Alamat\Kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        array_map(
            fn($record) => Kecamatan::create($record),
            [
                [
                    'nm_kecamatan' => 'Kecamatan A',
                    'kabupaten_id' => 1
                ],
                [
                    'nm_kecamatan' => 'Kecamatan B',
                    'kabupaten_id' => 1
                ],
                [
                    'nm_kecamatan' => 'Kecamatan C',
                    'kabupaten_id' => 2
                ],
            ]
        );
    }
}
