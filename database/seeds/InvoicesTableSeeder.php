<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoices')->delete();

        DB::table('invoices')->insert([
           ['reference_number' => '32412', 'amount' => 320000, 'owner' => 3, 'ticket_id' => 1, 'status' => 6, 'created_fa' => '1395-01-23 09:51:08'],
           ['reference_number' => '32231', 'amount' => 800000, 'owner' => 4, 'ticket_id' => 3, 'status' => 6, 'created_fa' => '1395-02-23 09:51:08'],
           ['reference_number' => '62236', 'amount' => 15000000, 'owner' => 4, 'ticket_id' => 2, 'status' => 7, 'created_fa' => '1395-03-23 09:51:08'],
           ['reference_number' => '63436', 'amount' => 100000000, 'owner' => 3, 'ticket_id' => 3, 'status' => 7, 'created_fa' => '1395-04-23 09:51:08'],
           ['reference_number' => '12436', 'amount' => 8000000, 'owner' => 3, 'ticket_id' => null, 'status' => 7, 'created_fa' => '1395-05-23 09:51:08'],
        ]);
    }
}
