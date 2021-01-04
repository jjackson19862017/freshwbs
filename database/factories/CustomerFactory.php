<?php

namespace Database\Factories;

use App\Models\Customer;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [

            'brideforename' => $this->faker->firstnamefemale,
            'bridesurname' => $this->faker->lastname,
            'groomforename' => $this->faker->firstnamemale,
            'groomsurname' => $this->faker->lastname,
            'telephone' => $this->faker->unique()->randomNumber($nbDigits = Null, $strict=false),
            'email' => $this->faker->unique()->safeEmail,
            'address1' => $this->faker->streetaddress,
            'address2' => $this->faker->streetname,
            'townCity' => $this->faker->city,
            'county' => $this->faker->state,
            'postCode' => $this->faker->postcode,
        ];
    }
}
