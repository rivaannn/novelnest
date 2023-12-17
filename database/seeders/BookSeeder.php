<?php

namespace Database\Seeders;

use App\Models\Books;
use App\Models\Writter;
use App\Models\Category;
use App\Models\Publishers;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            ['title' => 'To Kill a Mockingbird', 'description' => 'A novel by Harper Lee about racial injustice and moral growth.'],
            ['title' => '1984', 'description' => 'George Orwell\'s dystopian novel exploring surveillance, censorship, and totalitarianism.'],
            ['title' => 'The Great Gatsby', 'description' => 'F. Scott Fitzgerald\'s portrayal of the American Dream and its corruption in the 1920s.'],
            ['title' => 'Pride and Prejudice', 'description' => 'Jane Austen\'s classic novel about love, marriage, and social standing in 19th-century England.'],
            ['title' => 'The Catcher in the Rye', 'description' => 'J.D. Salinger\'s exploration of teenage alienation and angst.'],
            ['title' => 'Brave New World', 'description' => 'Aldous Huxley\'s vision of a futuristic, dystopian society.'],
            ['title' => 'The Lord of the Rings', 'description' => 'J.R.R. Tolkien\'s epic fantasy trilogy set in the world of Middle-earth.'],
            ['title' => 'Moby-Dick', 'description' => 'Herman Melville\'s novel about Captain Ahab\'s obsessive quest for revenge against a white whale.'],
            ['title' => 'War and Peace', 'description' => 'Leo Tolstoy\'s panoramic depiction of Russian society during the Napoleonic era.'],
            ['title' => 'The Odyssey', 'description' => 'Homer\'s ancient Greek epic poem following the hero Odysseus\' journey home after the Trojan War.'],
            ['title' => 'Frankenstein', 'description' => 'Mary Shelley\'s Gothic novel exploring themes of science, creation, and humanity.'],
            ['title' => 'The Picture of Dorian Gray', 'description' => 'Oscar Wilde\'s novel about a young man\'s moral corruption and eternal youth.'],
            ['title' => 'Wuthering Heights', 'description' => 'Emily Brontë\'s passionate and tragic tale of love and revenge.'],
            ['title' => 'The Alchemist', 'description' => 'Paulo Coelho\'s allegorical novel about a young shepherd Santiago\'s journey to find treasure.'],
            ['title' => 'One Hundred Years of Solitude', 'description' => 'Gabriel García Márquez\'s magical realist novel portraying the Buendía family.'],
            ['title' => 'The Road', 'description' => 'Cormac McCarthy\'s post-apocalyptic novel following a father and son\'s journey across a desolate landscape.'],
            ['title' => 'The Adventures of Sherlock Holmes', 'description' => 'Sir Arthur Conan Doyle\'s collection of detective stories featuring Sherlock Holmes.'],
            ['title' => 'A Song of Ice and Fire', 'description' => 'George R.R. Martin\'s epic fantasy series known for political intrigue and complex characters.'],
            ['title' => 'The Handmaid\'s Tale', 'description' => 'Margaret Atwood\'s dystopian novel exploring a society where women are oppressed.'],
            ['title' => 'The Hobbit', 'description' => 'J.R.R. Tolkien\'s adventure novel preceding "The Lord of the Rings."'],
            ['title' => 'The Grapes of Wrath', 'description' => 'John Steinbeck\'s novel depicting the struggles of the Joad family during the Great Depression.'],
            ['title' => 'The Little Prince', 'description' => 'Antoine de Saint-Exupéry\'s philosophical tale about a young prince traveling through space.'],
            ['title' => 'The Shining', 'description' => 'Stephen King\'s horror novel set in an isolated hotel with a haunted history.'],
            ['title' => 'Dracula', 'description' => 'Bram Stoker\'s classic Gothic novel about Count Dracula\'s attempt to move to England to spread the undead curse.'],
            ['title' => 'The Hitchhiker\'s Guide to the Galaxy', 'description' => 'Douglas Adams\' comedic science fiction series following Arthur Dent\'s space travels.'],
            ['title' => 'Great Expectations', 'description' => 'Charles Dickens\' bildungsroman about the orphan Pip\'s journey to becoming a gentleman.'],
            ['title' => 'The Count of Monte Cristo', 'description' => 'Alexandre Dumas\' adventure novel of revenge and redemption.'],
            ['title' => 'A Tale of Two Cities', 'description' => 'Charles Dickens\' historical novel set in London and Paris during the French Revolution.'],
            ['title' => 'The Scarlet Letter', 'description' => 'Nathaniel Hawthorne\'s novel exploring sin, guilt, and redemption in Puritanical society.'],
            ['title' => 'Crime and Punishment', 'description' => 'Fyodor Dostoevsky\'s psychological novel about a young man\'s moral dilemmas after committing a crime.'],
        ];

        foreach ($books as $book) {
            $writter_id     = Writter::all()->random()->id;
            $publisher      = Publishers::all()->random();
            $category       = Category::all()->random();
            $book_number    = date('Y') . $category->code . $publisher->code;
            Books::create([
                'title' => $book['title'],
                'description' => $book['description'],
                'writter_id' => $writter_id,
                'publisher_id' => $publisher->id,
                'price' => (string)rand(50, 1000) . "000",
                'category_id' => $category->id,
                'book_number' => $book_number
            ]);
        }
    }
}
