<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(array(
            array(
                'catname' => 'Gift',
            ),
            array(
                'catname' => 'Watches',
            ),
            array(
                'catname' => 'Home Decoration',
            ),
            array(
                'catname' => 'Toys & Hobbies',
            ),
            array(
                'catname' => 'Electronics',
            ),
        ));
    }
}
