<?php

use Illuminate\Database\Seeder;

class RepeatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Repeat::class, 20)->create();
    }
}
