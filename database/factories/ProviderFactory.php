<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Provider;
use Faker\Generator as Faker;

$factory->define(Provider::class, function (Faker $faker) {
    return [
        'name'=>$faker->unique()->lastName,
        'ruc_number'=>$faker->numberBetween($min=10000000000, $max=71111111111),
        'address'=>$faker->address,
        'phone'=>$faker->e164PhoneNumber,
        'email'=>$faker->email,
    ];
});
