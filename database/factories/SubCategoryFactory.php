<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\SubCategory;
use Faker\Generator as Faker;

$factory->define(SubCategory::class, function (Faker $faker) {
    return [
        'category_id'=>Category::all()->random(),
        'slug'=>$faker->unique()->slug,
        'name'=>$faker->unique()->word,
        'description' => $faker->sentence($nbWords=6, $variableNbWords = true),
    ];
});
