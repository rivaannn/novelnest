<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Fiksi', 'code' => 'FK01'],
            ['name' => 'Non-Fiksi', 'code' => 'NF02'],
            ['name' => 'Sejarah', 'code' => 'SJ03'],
            ['name' => 'Sains', 'code' => 'SN04'],
            ['name' => 'Teknologi', 'code' => 'TK05'],
            ['name' => 'Bisnis', 'code' => 'BS06'],
            ['name' => 'Self-Help', 'code' => 'SH07'],
            ['name' => 'Seni', 'code' => 'SE08'],
            ['name' => 'Pendidikan', 'code' => 'PD09'],
            ['name' => 'Kesehatan', 'code' => 'KS10'],
        ];

        // Simulasi pembuatan data kategori menggunakan sintaks PHP
        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'code' => $category['code']
            ]);
        }
    }
}