<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Customer::class, function (Faker $faker) {
    return [
        'brideforename' => $faker->firstnamefemale,
        'bridesurname' => $faker->lastname,
        'groomforename' => $faker->firstnamemale,
        'groomsurname' => $faker->lastname,
        'telephone' => $faker->unique()->randomNumber($nbDigits = 11, $strict=false),
        'email' => $faker->unique()->safeEmail,
        'address1' => $faker->streetaddress,
        'address2' => $faker->streetname,
        'townCity' => $faker->city,
        'county' => $faker->state,
        'postCode' => $faker->postcode,
    ];
});
