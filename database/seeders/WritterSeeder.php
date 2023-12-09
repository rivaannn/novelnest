<?php

namespace Database\Seeders;

use App\Models\Writter;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WritterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $writers = [
            ['name' => 'Agatha Christie', 'address' => 'London, England'],
            ['name' => 'Stephen King', 'address' => 'Bangor, Maine, USA'],
            ['name' => 'J.K. Rowling', 'address' => 'Edinburgh, Scotland'],
            ['name' => 'Haruki Murakami', 'address' => 'Tokyo, Japan'],
            ['name' => 'Jane Austen', 'address' => 'Hampshire, England'],
            ['name' => 'George Orwell', 'address' => 'London, England'],
            ['name' => 'Tolkien', 'address' => 'Bournemouth, England'],
            ['name' => 'Fyodor Dostoevsky', 'address' => 'St. Petersburg, Russia'],
            ['name' => 'Mark Twain', 'address' => 'Florida, Missouri, USA'],
            ['name' => 'Gabriel Garcia Marquez', 'address' => 'Aracataca, Colombia'],
            ['name' => 'Margaret Atwood', 'address' => 'Ottawa, Canada'],
            ['name' => 'Virginia Woolf', 'address' => 'London, England'],
            ['name' => 'Leo Tolstoy', 'address' => 'Yasnaya Polyana, Russia'],
            ['name' => 'Ernest Hemingway', 'address' => 'Oak Park, Illinois, USA'],
            ['name' => 'Hermann Hesse', 'address' => 'Calw, Germany'],
        ];

        // Simulasi pembuatan data penulis menggunakan sintaks PHP
        foreach ($writers as $writer) {
            Writter::create([
                'name' => $writer['name'],
                'address' => $writer['address']
            ]);
        }
    }
}