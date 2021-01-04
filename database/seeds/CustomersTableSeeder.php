<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('customers')->insert([
            'brideforename' => str_random(10),
            'bridesurname' => str_random(10),
            'groomforename' => str_random(10),
            'groomsurname' => str_random(10),
            'telephone' => '07799123123',
            'email' => str_random(11) . '@test.com',
            'address1' => str_random(10),
            'address2' => str_random(10),
            'townCity' => str_random(10),
            'county' => str_random(10),
            'postCode' => str_random(6)


        ]);
    }
}
