<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\WedEvents;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(CustomersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('customers')->truncate();
        DB::table('wed_events')->truncate();


        Customer::factory(25)->create();
        WedEvents::factory(35)->create();
    }
}
