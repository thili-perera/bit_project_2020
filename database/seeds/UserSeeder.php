<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            array(
                'username' => "thili",
                'fname' => "Thilini",
                'lname' => "Perera",
                'email' => "thili@gmail.com",
                'password' => Hash::make('123'),
            ),

            array(
                'username' => "thari",
                'fname' => "Tharindu",
                'lname' => "Perera",
                'email' => "thari@gmail.com",
                'password' => Hash::make('123'),

            )
        ));
    }
}
