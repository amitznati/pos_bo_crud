<?php

use Illuminate\Database\Seeder;

class PosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pos')->delete();
        
        \DB::table('pos')->insert(array (
            0 => 
            array (
                'name' => 'pos1',
                'store_id' => 1,
                'created_at' => '2017-04-26 05:33:21',
                'updated_at' => '2017-04-26 05:33:21',
            ),
            1 => 
            array (
                'name' => 'pos2',
                'store_id' => 1,
                'created_at' => '2017-04-26 05:33:43',
                'updated_at' => '2017-04-26 05:33:43',
            ),
        ));
        
        
    }
}
