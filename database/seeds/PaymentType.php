<?php

use Illuminate\Database\Seeder;

class PaymentType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_types')->insert([
            'payment' => 'CASH'
        ]);

        DB::table('payment_types')->insert([
            'payment' => 'BPI'
        ]);

        DB::table('payment_types')->insert([
            'payment' => 'BDO'
        ]);

        DB::table('payment_types')->insert([
            'payment' => 'GCASH'
        ]);

        DB::table('payment_types')->insert([
            'payment' => 'CHEQUE'
        ]);

    }
}
