<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert(array(
            array(
                'name' => "Angelique de paris",
                'contact' => "+94771234567",
                'email' => "angelique@gmail.com",
            ),

            array(
                'name' => "Zeiko",
                'contact' => "+94774567891",
                'email' => "zeiko@gmail.com",

            ),

            array(
                'name' => "Casio",
                'contact' => "+94754567891",
                'email' => "casio@gmail.com",

            ),

            array(
                'name' => "Wijayasiri",
                'contact' => "+9475456123",
                'email' => "wijayasiri@gmail.com",

            ),

            array(
                'name' => "Q & Q",
                'contact' => "+9475456736",
                'email' => "q&q@gmail.com",

            ),
        ));
    }
}
