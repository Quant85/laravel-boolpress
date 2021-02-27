<?php

use Illuminate\Database\Seeder;

use App\Tag;
use Faker\Generator as Faker;

class TagSeeder extends Seeder
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
            $newTag = new Tag();
            $newTag->name = $faker->sentence(rand(1,5));
            $newTag->slug = $faker->slug();
            $newTag->description = $faker->text();
            $newTag->created_at = $faker->dateTime();
            $newTag->updated_at = $faker->dateTime();
            $newTag->save();
        }
    }
}
