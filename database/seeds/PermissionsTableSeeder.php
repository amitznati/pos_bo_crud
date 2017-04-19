<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'name' => 'פנל אדמין',
                'created_at' => '2017-04-14 07:11:52',
                'updated_at' => '2017-04-14 07:11:52',
            ),
            1 => 
            array (
                'name' => 'פנל ניהול',
                'created_at' => '2017-04-14 07:12:06',
                'updated_at' => '2017-04-14 07:12:06',
            ),
            2 => 
            array (
                'name' => 'סגירת קופה',
                'created_at' => '2017-04-14 07:12:29',
                'updated_at' => '2017-04-14 07:12:29',
            ),
        ));
        
        
    }
}
