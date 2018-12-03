<?php

use Illuminate\Database\Seeder;

class AccountTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account_types')->insert(
        	[
        		[
        			'name' => 'Electric',
        			'created_at' => date("Y-m-d H:i:s")
        		],[
        			'name' => 'Internet',
        			'created_at' => date("Y-m-d H:i:s")
        		],[
        			'name' => 'Utilities',
        			'created_at' => date("Y-m-d H:i:s")
        		],[
        			'name' => 'Automotive',
        			'created_at' => date("Y-m-d H:i:s")
        		],[
        			'name' => 'Insurance',
        			'created_at' => date("Y-m-d H:i:s")
        		],[
        			'name' => 'Mortgage',
        			'created_at' => date("Y-m-d H:i:s")
        		]
        	]
        );
    }
}
