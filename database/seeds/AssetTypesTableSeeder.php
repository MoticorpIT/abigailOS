<?php

use Illuminate\Database\Seeder;

class AssetTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asset_types')->insert(
        	[
        		[
        			'name' => 'Retail',
        			'created_at' => date("Y-m-d H:i:s")
        		],[
        			'name' => 'Real Estate',
        			'created_at' => date("Y-m-d H:i:s")
        		],[
        			'name' => 'Automotive',
        			'created_at' => date("Y-m-d H:i:s")
        		]
        	]
        );
    }
}
