<?php

use Illuminate\Database\Seeder;
use App\Category;
use Faker\Generator as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for ($i=0; $i < 20; $i++) { 
            $newCategory = new Category();
            $newCategory->name = $faker->sentence(rand(1,5));
            $newCategory->adult = $faker->boolean();
            $newCategory->icon = $faker->url();
            $newCategory->created_at = $faker->dateTime();
            $newCategory->updated_at = $faker->dateTime();
            $newCategory->save();
        }
    }
}
