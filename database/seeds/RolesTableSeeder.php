<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'client', 'fa_name' => 'کاربر'],
            ['id' => 2, 'name' => 'support', 'fa_name' => 'پشتیبانی'],
        ]);
    }
}
