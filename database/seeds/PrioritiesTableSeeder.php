<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priorities')->delete();

        DB::table('priorities')->insert([
           ['id' => 1, 'name' => 'normal', 'fa_name' => 'عادی'],
           ['id' => 2, 'name' => 'important', 'fa_name' => 'مهم'],
           ['id' => 3, 'name' => 'critical', 'fa_name' => 'فوری']
        ]);
    }
}
