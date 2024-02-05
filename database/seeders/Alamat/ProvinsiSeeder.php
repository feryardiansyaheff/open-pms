<?php

namespace Database\Seeders\Alamat;

use App\Models\Alamat\Provinsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        array_map(
            fn($record) => Provinsi::create($record),
            [
                ['nm_provinsi' => 'Provinsi A'],
                ['nm_provinsi' => 'Provinsi B'],
                ['nm_provinsi' => 'Provinsi C'],
            ]
        );
    }
}
