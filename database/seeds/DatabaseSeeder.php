<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(RolesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(StatusesTableSeeder::class);
         $this->call(PrioritiesTableSeeder::class);
         $this->call(DepartmentsTableSeeder::class);
         $this->call(AdminsTableSeeder::class);
         $this->call(ProjectsTableSeeder::class);
         $this->call(TicketsTableSeeder::class);
         $this->call(InvoicesTableSeeder::class);
         $this->call(ContentsTableSeeder::class);
         $this->call(AttachmentsTableSeeder::class);

        Model::reguard();
    }
}
