<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('stores')->delete();
        
        \DB::table('stores')->insert(array (
            0 => 
            array (
                'name' => 'Store1',
                'created_at' => '2017-04-26 05:23:28',
                'updated_at' => '2017-04-26 05:23:28',
            ),
        ));
        
        
    }
}
