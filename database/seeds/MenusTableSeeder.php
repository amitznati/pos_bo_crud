<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'name' => 'תפריט ראשי',
                'created_at' => '2017-04-14 05:15:11',
                'updated_at' => '2017-04-14 05:15:11',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
