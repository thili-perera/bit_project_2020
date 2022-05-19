<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->insert(array(
            array(
                'id' => 1,
                'district' => 'Colombo',
                'delivery_fee' => 150,
            ),

            array(
                'id' => 2,
                'district' => 'Kaluthara',
                'delivery_fee' => 250,
            ),

            array(
                'id' => 3,
                'district' => 'Gampaha',
                'delivery_fee' => 250,
            ),
        ));
    }
}
