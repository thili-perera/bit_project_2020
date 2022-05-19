<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->insert(array(
            array(
                'id' => 1,
                'user_id' => 1,
                'role_id' => 1,
            ),

            array(
                'id' => 2,
                'user_id' => 2,
                'role_id' => 2,
            ),
        ));
    }
}
