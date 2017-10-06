<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->delete();

        DB::table('departments')->insert([
            ['id' => 1, 'name' => 'technical', 'fa_name' => 'پشتیبانی فنی'],
            ['id' => 2, 'name' => 'sale', 'fa_name' => 'پشتیبانی فروش']
        ]);
    }
}
