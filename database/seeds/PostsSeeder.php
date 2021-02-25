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
            $newPost->category_id = $faker->numberBetween(1,25);
            $newPost->img = $faker->image(null, 360, 360, 'animals', true);
            $newPost->body = $faker->paragraph(2, true);
            $newPost->created_at = $faker->dateTime();
            $newPost->updated_at = $faker->dateTime();
            $newPost->save();
        }
    }
}
