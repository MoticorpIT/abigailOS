<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert(
        	[
        		[
        			'name' => 'Active',
        			'created_at' => date("Y-m-d H:i:s")
        		],[
        			'name' => 'Inactive',
        			'created_at' => date("Y-m-d H:i:s")
        		]
        	]
        );
    }
}
