<?php

namespace Database\Seeders;

use App\Models\Publishers;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PublishersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $publishers = [
            ['name' => 'Penerbit Maju Jaya', 'code' => 'MJ001'],
            ['name' => 'Gema Pustaka', 'code' => 'GP002'],
            ['name' => 'Penerbit Bintang', 'code' => 'PB003'],
            ['name' => 'Mitra Penerbit', 'code' => 'MP004'],
            ['name' => 'Cahaya Ilmu', 'code' => 'CI005'],
            ['name' => 'Pustaka Abadi', 'code' => 'PA006'],
            ['name' => 'Penerbit Harmoni', 'code' => 'PH007'],
            ['name' => 'Maju Berkarya', 'code' => 'MB008'],
            ['name' => 'Cemerlang Pustaka', 'code' => 'CP009'],
            ['name' => 'Penerbit Sejahtera', 'code' => 'PS010'],
            ['name' => 'Karya Terang', 'code' => 'KT011'],
            ['name' => 'Pustaka Pintar', 'code' => 'PP012'],
            ['name' => 'Penerbit Visioner', 'code' => 'PV013'],
            ['name' => 'Penerbit Serambi', 'code' => 'PS014'],
            ['name' => 'Maju Lancar', 'code' => 'ML015'],
            ['name' => 'Pustaka Mulia', 'code' => 'PM016'],
            ['name' => 'Penerbit Intan', 'code' => 'PI017'],
            ['name' => 'Terbit Terang', 'code' => 'TT018'],
            ['name' => 'Penerbit Inspirasi', 'code' => 'PI019'],
            ['name' => 'Penerbit Terkini', 'code' => 'PT020'],
        ];

        // Simulasi pembuatan data publisher menggunakan sintaks PHP
        foreach ($publishers as $publisher) {
            Publishers::create([
                'nama' => $publisher['name'],
                'code' => $publisher['code']
            ]);
        }
    }
}