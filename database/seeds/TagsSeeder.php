<?php

use Illuminate\Database\Seeder;
use App\Tags;
use Faker\Generator as Faker;
class TagsSeeder extends Seeder
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
            $newTags = new Tags();
            $newTags->name = $faker->sentence(rand(1,5));
            $newTags->slug = $faker->slug();
            $newTags->description = $faker->text();
            $newTags->created_at = $faker->dateTime();
            $newTags->updated_at = $faker->dateTime();
            $newTags->save();
        }
    }
}
