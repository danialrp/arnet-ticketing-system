<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->delete();

        /*DB::table('tickets')->insert([

           ['sender' => 3, 'department' => 1, 'project' => 1, 'priority' => 1, 'status' => 1, 'reference_number' => '43232',
               'title' => 'درخواست تغییر کاربران', 'description' => 'توضیحات تیکت با ایدی ۱', 'updated_fa' => '1395-01-23 09:51:08'],

           ['sender' => 3, 'department' => 1, 'project' => 2, 'priority' => 2, 'status' => 2, 'reference_number' => '45656',
               'title' => 'نمایش موجودی سیستم', 'description' => 'توضیحات تیکت با ایدی ۲', 'updated_fa' => '1395-02-23 09:51:08'],

           ['sender' => 4, 'department' => 1, 'project' => 3, 'priority' => 3, 'status' => 3, 'reference_number' => '29984',
               'title' => 'ارائه مستندات سیستم برای جلوگیری از اشتباهات مدیران سیستم', 'description' => 'توضیحات تیکت با ایدی ۳', 'updated_fa' => '1395-03-23 09:51:08'],

           ['sender' => 4, 'department' => 2, 'project' => 3, 'priority' => 3, 'status' => 3, 'reference_number' => '87654',
               'title' => 'ارائه مستندات سیستم برای جلوگیری از اشتباهات مدیران سیستم', 'description' => 'توضیحات تیکت با ایدی ۴', 'updated_fa' => '1395-04-23 09:51:08'],

            ['sender' => 3, 'department' => 1, 'project' => 2, 'priority' => 2, 'status' => 5, 'reference_number' => '23490',
                'title' => 'عنوان درخواست کاربر', 'description' => 'توضیحات تیکت با ایدی ۵', 'updated_fa' => '1395-05-23 09:51:08'],

            ['sender' => 3, 'department' => 1, 'project' => 1, 'priority' => 3, 'status' => 3, 'reference_number' => '12998',
                'title' => 'موجودی یکی از کاربران', 'description' => 'توضیحات تیکت با ایدی ۶', 'updated_fa' => '1395-06-23 09:51:08'],
        ]);*/
    }
}
