<?php

use Illuminate\Database\Seeder;

class TaskTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_types')->insert(
        	[
        		[
        			'name' => 'Rent Owed',
        			'created_at' => date("Y-m-d H:i:s")
        		],[
        			'name' => 'Payment Due',
        			'created_at' => date("Y-m-d H:i:s")
        		],[
        			'name' => 'Filing Due',
        			'created_at' => date("Y-m-d H:i:s")
        		]
        	]
        );
    }
}
