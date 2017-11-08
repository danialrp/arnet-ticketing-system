<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->delete();

        /*DB::table('projects')->insert([
            ['id' => 1, 'title' => 'پروژه مهم اول', 'owner' => 3, 'status' => 2],
            ['id' => 2, 'title' => 'پروژه مهم دوم', 'owner' => 3, 'status' => 3],
            ['id' => 3, 'title' => 'پروژه مهم سوم', 'owner' => 4, 'status' => 4]
        ]);*/
    }
}
