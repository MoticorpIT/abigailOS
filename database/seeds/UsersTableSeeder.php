<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        	[
        		[
        			'name' => 'bentley',
        			'email' => 'joey@moticorp.com',
        			'password' => bcrypt('12345'),
                    'is_active' => 1,
        			'created_at' => date("Y-m-d H:i:s")
        		],[
                    'name' => 'yosi',
                    'email' => 'yosi@moticorp.com',
                    'password' => bcrypt('12345'),
                    'is_active' => 1,
                    'created_at' => date("Y-m-d H:i:s")
                ],[
        			'name' => 'chad',
        			'email' => 'chad@moticorp.com',
        			'password' => bcrypt('12345'),
                    'is_active' => 1,
        			'created_at' => date("Y-m-d H:i:s")
        		]
        	]
        );
    }
}
