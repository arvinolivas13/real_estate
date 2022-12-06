<?php

use Illuminate\Database\Seeder;

class AreaDetail extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach (range(1,2) as $index) {
            DB::table('area_details')->insert([
                'area_id' => 1,
                'block' => $index,
                'status' => 'ACTIVE',
                'created_user' => 1
            ]);
        }
    }

}
