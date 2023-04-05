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

        for($i = 0; $i < 5; $i++) {
            DB::table('posts')->insert([
                'user_id' => 1,
                'title' => $faker->sentence(),
                'type' => 'article',
                'cover' => 'https://picsum.photos/350/150',
                'content' => $faker->text(),
                'attachment' => 'https://picsum.photos/350/150',
                'created_at' => date('Y-m-d H:i:s'),
                'total_read' => 1
            ]);
        }

        for($i = 0; $i < 5; $i++) {
            DB::table('posts')->insert([
                'user_id' => 1,
                'title' => $faker->sentence(),
                'type' => 'photo',
                'cover' => 'https://picsum.photos/350/150',
                'content' => $faker->text(),
                'attachment' => 'https://picsum.photos/350/150',
                'created_at' => date('Y-m-d H:i:s'),
                'total_read' => 1
            ]);
        }

        for($i = 0; $i < 5; $i++) {
            DB::table('posts')->insert([
                'user_id' => 1,
                'title' => $faker->sentence(),
                'type' => 'video',
                'cover' => 'https://picsum.photos/350/150',
                'content' => $faker->text(),
                'attachment' => 'sample.mp4',
                'created_at' => date('Y-m-d H:i:s'),
                'total_read' => 1
            ]);
        }
    }
}
