<?php

use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach (range(1,6) as $index) {
                DB::table('areas')->insert([
                    'code' => str_random(5),
                    'name' => $faker->name,
                    'description' => $faker->word,
                    'address' => $faker->address,
                    'type' => 'FARM LOT',
                    'image' => 'area_'.$index.'.jpg',
                    'status' => 'ACTIVE',
                    'created_user' => 1
                ]);
        }
    }
}
