<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for ($i=0; $i < 10; $i++) { 
            $newPost = new Post();
            $newPost->title = $faker->sentence(rand(1,5));
            $newPost->subtitle = $faker->sentence(rand(2,4));
            $newPost->category_id = $faker->numberBetween(1,20);
            $newPost->img = $faker->url();
            $newPost->body = $faker->paragraph(2, true);
            $newPost->created_at = $faker->dateTime();
            $newPost->updated_at = $faker->dateTime();
            $newPost->save();
        }
    }
}
