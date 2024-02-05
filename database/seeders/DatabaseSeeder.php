<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Alamat\DesaSeeder;
use Database\Seeders\Alamat\KabupatenSeeder;
use Database\Seeders\Alamat\KecamatanSeeder;
use Database\Seeders\Alamat\ProvinsiSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@mail.com',
        ]); // password
        $this->seederCalls();
    }

    function seederCalls(): void
    {
        $this->call([
                // Seeder untuk alamat.
            ProvinsiSeeder::class,
            KabupatenSeeder::class,
            KecamatanSeeder::class,
            DesaSeeder::class,
        ]);
    }

}
