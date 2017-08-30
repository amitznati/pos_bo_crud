<?php

use Illuminate\Database\Seeder;

class SaleryTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('salery_types')->delete();
        
        \DB::table('salery_types')->insert(array (
            0 => 
            array (
                'name' => 'שעתי',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ),
            1 => 
            array (
                'name' => 'יומי',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ),
            2 => 
            array (
                'name' => 'חודשי',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ),
        ));
        
        
    }
}
