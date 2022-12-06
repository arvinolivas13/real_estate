<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach (range(1,10) as $index) {
                DB::table('customers')->insert([
                    'subscriber_no' => str_random(5),
                    'firstname' => $faker->firstname,
                    'middlename' => $faker->lastname,
                    'lastname' => $faker->lastname,
                    'email' => $faker->email,
                    'address' => $faker->address,
                    'contact' => $faker->phoneNumber(10),
                    'birthday' => $faker->date() ,
                    'occupation' => str_random(10),
                    'gender' => 'MALE',
                    'status' => 'ACTIVE',
                    'created_user' => 1
                ]);
        }
    }
}
