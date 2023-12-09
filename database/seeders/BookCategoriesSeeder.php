<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\BookCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books      = Book::all();
        foreach($books  as $book) {
            BookCategory::create([
                'book_id' => $book->id,
                'category_id' => Category::all()->random()->id
            ]);
        }
    }
}
