<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            ['id' => 1, 'fname' => 'علی', 'lname' => 'تکتاز', 'email' => 'ali@me.com',
                'password' => Hash::make('0000'), 'phone' => '09309887428', 'role' => 1,],
        ]);

        /*DB::table('users')->insert([
            ['id' => 1, 'fname' => 'پشتیبانی', 'lname' => 'آرنت', 'email' => 'support@arnet.com',
                'password' => Hash::make('0000'), 'phone' => '09379082376', 'role' => 2],

            ['id' => 2, 'fname' => 'محمد', 'lname' => 'حکمییان', 'email' => 'mamali@me.com',
                'password' => Hash::make('0000'), 'phone' => '09127640981', 'role' => 1],

            ['id' => 3, 'fname' => 'علی', 'lname' => 'تکتاز', 'email' => 'ali@me.com',
                'password' => Hash::make('0000'), 'phone' => '09309887428', 'role' => 1],

            ['id' => 4, 'fname' => 'محسن', 'lname' => 'علیپور', 'email' => 'mohsen@me.com',
                'password' => Hash::make('0000'), 'phone' => '09353420987', 'role' => 1]
        ]);*/
    }
}
