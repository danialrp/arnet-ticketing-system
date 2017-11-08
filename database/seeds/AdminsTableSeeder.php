<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();

        DB::table('admins')->insert([
            ['id' => 1, 'fname' => 'پشتیبانی', 'lname' => 'آرنت', 'email' => 'admin@arnetcode.com',
                'password' => Hash::make('00000000'), 'phone' => '09153032608', 'department' => 1],

            ['id' => 2, 'fname' => 'پشتیبانی', 'lname' => 'آرنت-2', 'email' => 'info@arnetcode.com',
                'password' => Hash::make('00000000'), 'phone' => '09354505250', 'department' => 1],

        ]);

        /*DB::table('admins')->insert([
            ['id' => 1, 'fname' => 'پشتیبانی', 'lname' => 'آرنت', 'email' => 'admin@root.com',
                'password' => Hash::make('0000'), 'phone' => '09900000000', 'department' => 1],

            ['id' => 2, 'fname' => 'پشتیبانی', 'lname' => 'آرنت-۲', 'email' => 'support@root.com',
                'password' => Hash::make('0000'), 'phone' => '09344442233', 'department' => 1],

            ['id' => 3, 'fname' => 'پشتیبانی', 'lname' => 'فروش', 'email' => 'sale@root.com',
                'password' => Hash::make('0000'), 'phone' => '09355558866', 'department' => 2]

        ]);*/
    }
}
