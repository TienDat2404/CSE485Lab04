<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\BorrowBook;
use App\Models\Reader;
use App\Models\Book;

class BorrowbookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Lấy danh sách ID của readers và books
        $readerIds = Reader::pluck('id')->toArray();
        $bookIds = Book::pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            Borrowbook::create([
                'reader_id' => $faker->randomElement($readerIds),   
                'book_id' => $faker->randomElement($bookIds),     
                'borrow_date' => $faker->dateTimeBetween('-2 months', 'now')->format('Y-m-d'), 
                'return_date' => $faker->optional()->dateTimeBetween('now', '+1 month')->format('Y-m-d'), 
                'status' => $faker->boolean(50),
            ]);
        }
    }
}
