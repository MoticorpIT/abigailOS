<?php

use Illuminate\Database\Seeder;

class AccountStandingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account_standings')->insert(
        	[
        		[
        			'name' => 'Current',
        			'created_at' => date("Y-m-d H:i:s")
        		],[
        			'name' => 'Past Due',
        			'created_at' => date("Y-m-d H:i:s")
        		],[
        			'name' => 'Evicted',
        			'created_at' => date("Y-m-d H:i:s")
        		]
        	]
        );
    }
}
