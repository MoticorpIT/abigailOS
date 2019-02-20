<?php

use Illuminate\Database\Seeder;

class CompanyTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_types')->insert(
        	[
        		[
        			'name' => 'Real Estate',
        			'created_at' => date("Y-m-d H:i:s")
        		],[
        			'name' => 'Retail',
        			'created_at' => date("Y-m-d H:i:s")
        		],[
        			'name' => 'Services',
        			'created_at' => date("Y-m-d H:i:s")
        		]
        	]
        );
    }
}
