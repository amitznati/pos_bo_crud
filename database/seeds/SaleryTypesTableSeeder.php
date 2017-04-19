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
                'created_at' => '2017-04-14 07:13:16',
                'updated_at' => '2017-04-14 07:13:16',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'name' => 'יומי',
                'created_at' => '2017-04-14 07:14:06',
                'updated_at' => '2017-04-14 07:14:06',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'name' => 'חודשי',
                'created_at' => '2017-04-14 07:14:16',
                'updated_at' => '2017-04-14 07:14:16',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
