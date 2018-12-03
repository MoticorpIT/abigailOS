<?php

use Illuminate\Database\Seeder;

class PrioritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priorities')->insert(
        	[
        		[
        			'name' => 'Low',
        			'created_at' => date("Y-m-d H:i:s")
        		],[
        			'name' => 'Medium',
        			'created_at' => date("Y-m-d H:i:s")
        		],[
        			'name' => 'High',
        			'created_at' => date("Y-m-d H:i:s")
        		]
        	]
        );
    }
}
