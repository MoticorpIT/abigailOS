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
        			'name' => 'Task Type 1',
        			'created_at' => date("Y-m-d H:i:s")
        		],[
        			'name' => 'Task Type 2',
        			'created_at' => date("Y-m-d H:i:s")
        		],[
        			'name' => 'Task Type 3',
        			'created_at' => date("Y-m-d H:i:s")
        		]
        	]
        );
    }
}
