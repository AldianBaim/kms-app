<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Faker as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i <= 10; $i++) {
            DB::table('posts')->insert([
                'user_id' => 1,
                'title' => $faker->sentence(),
                'type' => 'article',
                'cover' => 'https://via.placeholder.com/300',
                'content' => $faker->text(),
                'total_read' => 1
            ]);
        }
    }
}
