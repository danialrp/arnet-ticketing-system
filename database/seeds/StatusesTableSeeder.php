<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->delete();

        DB::table('statuses')->insert([
           ['id' => 1, 'name' => 'new', 'fa_name' => 'جدید', 'color_code' => 'status-new'],
           ['id' => 2, 'name' => 'in-progress', 'fa_name' => 'در حال بررسی', 'color_code' => 'status-in-porgress'],
           ['id' => 3, 'name' => 'processing', 'fa_name' => 'در حال انجام', 'color_code' => 'status-processing'],
           ['id' => 4, 'name' => 'payment-waiting', 'fa_name' => 'در انتظار پرداخت', 'color_code' => 'status-waiting-payment'],
           ['id' => 5, 'name' => 'done', 'fa_name' => 'انجام شده', 'color_code' => 'status-done'],
           ['id' => 6, 'name' => 'paid', 'fa_name' => 'پرداخت شده', 'color_code' => 'status-paid'],
           ['id' => 7, 'name' => 'unpaid', 'fa_name' => 'پرداخت نشده', 'color_code' => 'status-not-paid'],
           ['id' => 8, 'name' => 'answered', 'fa_name' => 'پاسخ داده شده', 'color_code' => 'status-answered'],
        ]);
    }
}
