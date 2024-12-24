<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Book;
class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     public function run(): void
    {
        $faker = Faker::create('vi_VN');
        for( $i = 0; $i < 10; $i++ ) {
            Book::create([
                'name' => $faker->sentence(3), 
                'author' => $faker->name,      
                'category' => $faker->word,    
                'year' => $faker->year,        
                'quantity' => $faker->numberBetween(1, 100)
            ]);
        }
    }
}
