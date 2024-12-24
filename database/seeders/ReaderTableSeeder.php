<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reader;
use Faker\Factory as Faker;
class ReaderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi');
        for( $i = 0; $i < 10; $i++ ) {
            Reader::create([
                'name' => $faker->name,           
                'birthday' => $faker->date('Y-m-d'),    
                'address' => $faker->address,        
                'phone' => $faker->phoneNumber         
            ]);
        }
    }
}
