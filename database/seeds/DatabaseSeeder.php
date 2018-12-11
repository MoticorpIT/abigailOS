<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AccountsTableSeeder::class);
        $this->call(AccountStandingTableSeeder::class);
        $this->call(AccountTypesTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(CompanyTypesTableSeeder::class);
        $this->call(AssetsTableSeeder::class);
        $this->call(AssetTypesTableSeeder::class);
        $this->call(ContractsTableSeeder::class);
        $this->call(InvoicesTableSeeder::class);
        $this->call(NotesTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(PrioritiesTableSeeder::class);
        $this->call(RepeatsTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(TaskTypesTableSeeder::class);
        $this->call(TenantsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
