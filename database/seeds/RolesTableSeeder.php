<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'name' => 'Admin',
                'created_at' => '2017-04-14 07:10:32',
                'updated_at' => '2017-04-14 07:10:32',
            ),
            1 => 
            array (
                'name' => 'מנהל',
                'created_at' => '2017-04-14 07:10:40',
                'updated_at' => '2017-04-14 07:10:40',
            ),
            2 => 
            array (
                'name' => 'מנהל משמרת',
                'created_at' => '2017-04-14 07:11:11',
                'updated_at' => '2017-04-14 07:11:11',
            ),
            3 => 
            array (
                'name' => 'מוכר',
                'created_at' => '2017-04-14 07:11:18',
                'updated_at' => '2017-04-14 07:11:18',
            ),
        ));
        
        
    }
}
