<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BorrowbooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        // Lấy ID của các sách và độc giả
        $books = DB::table('books')->pluck('id');
        $readers = DB::table('readers')->pluck('id');
        
        for ($i = 0; $i < 10; $i++) {
            $borrowDate = $faker->dateTimeBetween('-2 months', 'now');
            $returnDate = $faker->optional()->dateTimeBetween('now', '+1 month');

            // Kiểm tra nếu returnDate không phải là null và sau borrowDate thì mới format
            $formattedReturnDate = $returnDate ? $returnDate->format('Y-m-d') : null;
            
            DB::table('borrowbooks')->insert([
                'reader_id' => $faker->randomElement($readers),
                'book_id' => $faker->randomElement($books),
                'borrow_date' => $borrowDate->format('Y-m-d'),
                'return_date' => $formattedReturnDate,
                'status' => $faker->boolean(80), // 80% xác suất trả sách
            ]);
        }
    }
}
