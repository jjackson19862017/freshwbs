<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\WedEvents;
use Illuminate\Database\Eloquent\Factories\Factory;

class WedEventsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WedEvents::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => Customer::factory(),
            'firstappointmentdate' => $this->faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
            'holdtilldate' => $this->faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
            'contractissueddate' => $this->faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
            'weddingdate' => $this->faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
            'deposittakendate' => $this->faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
            'quarterpaymentdate' => $this->faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
            'finalweddingtalkdate' => $this->faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
            'finalpaymentdate' => $this->faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
            'onhold' => 'No',
            'contractreturned' => 'No',
            'agreementsigned' => 'No',
            'deposittaken' => 'No',
            'quarterpaymenttaken' => 'No',
            'hadfinaltalk' => 'No',
            'cost' => $this->faker->numberBetween($min = 5000, $max = 9000),
            'completed' => 'No',
        ];
    }
}
