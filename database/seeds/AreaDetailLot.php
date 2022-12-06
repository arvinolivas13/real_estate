<?php

use Illuminate\Database\Seeder;

class AreaDetailLot extends Seeder
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
            DB::table('area_detail_lots')->insert([
                'subscriber_no' => str_random(5),
                'block_id' => 1,
                'lot' => $index,
                'area' => 100,
                'psqm' => 100,
                'tcp' => 450000,
                'reservation_percent' => 15,
                'reservation_fee' => 67500,
                'balance' => 382500,
                'monthly_amortization' => 10625,
                'status' => 'OPEN',
                'created_user' => 1
            ]);
        }
        foreach (range(11, 30) as $index) {
            DB::table('area_detail_lots')->insert([
                'subscriber_no' => str_random(5),
                'block_id' => 2,
                'lot' => $index,
                'area' => 100,
                'psqm' => 100,
                'tcp' => 450000,
                'reservation_percent' => 15,
                'reservation_fee' => 67500,
                'balance' => 382500,
                'monthly_amortization' => 10625,
                'status' => 'OPEN',
                'created_user' => 1
            ]);
        }
    }
}
