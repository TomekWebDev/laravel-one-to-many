<?php

use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($i = 0; $i < 5; $i++) {

            $new_post = new Post();
            $new_post->title = $faker->words(2, true);
            $new_post->body = $faker->words(10, true);
            $new_post->save();
        }
    }
}
