<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');
        for ($i = 0; $i < 10; $i++) {
            App\Book::create([
                'user_id' => $faker->numberBetween(1, 3),
                'book_name' => $faker->word(),
                'book_price' => $faker->numberBetween(100, 5000),
                'book_page' => $faker->numberBetween(0, 999999),
                'book_description' => $faker->word(),
                'published' => $faker->dateTime('now'),
                'created_at' => $faker->dateTime('now'),
                'updated_at' => $faker->dateTime('now'),
            ]);
        }
    }
}
