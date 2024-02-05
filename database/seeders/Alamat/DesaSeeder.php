<?php

namespace Database\Seeders\Alamat;

use App\Models\Alamat\Desa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        array_map(
            fn($record) => Desa::create($record),
            [
                [
                    'nm_desa' => 'Desa A',
                    'nm_kades' => 'Bpk. A',
                    'kecamatan_id' => 1,
                ],
                [
                    'nm_desa' => 'Desa B',
                    'nm_kades' => 'Bpk. B',
                    'kecamatan_id' => 1
                ],
                [
                    'nm_desa' => 'Desa C',
                    'nm_kades' => 'Ibu. C',
                    'kecamatan_id' => 2
                ],
            ]
        );
    }
}
