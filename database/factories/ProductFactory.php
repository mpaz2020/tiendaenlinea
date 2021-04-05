<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Provider;
use App\SubCategory;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'code' => $faker->ean8,
        'name' => $faker->streetName,
        'slug' => $faker->slug,
        'stock' => $faker->buildingNumber,
        //'image'=>$faker->imageUrl($width = 270, $height = 270),
        'sell_price' => $faker->randomNumber(2),
        'status' => 'ACTIVE',
        'sub_category_id' => SubCategory::all()->random(),
        'provider_id' => Provider::all()->random(),
        'short_description' => $faker->realText($maxNbChars = 360, $indexSize=2),
        'long_description' => $faker->sentence($nbWords=6, $variableNbWords = true),
    ];
});
