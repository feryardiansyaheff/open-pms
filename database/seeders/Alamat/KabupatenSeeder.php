<?php

namespace Database\Seeders\Alamat;

use App\Models\Alamat\Kabupaten;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        array_map(
            fn($record) => Kabupaten::create($record),
            [
                [
                    'nm_kabupaten' => 'Kabupaten A',
                    'provinsi_id' => 1
                ],
                [
                    'nm_kabupaten' => 'Kabupaten B',
                    'provinsi_id' => 1
                ],
                [
                    'nm_kabupaten' => 'Kabupaten C',
                    'provinsi_id' => 2
                ],
            ]
        );
    }
}
