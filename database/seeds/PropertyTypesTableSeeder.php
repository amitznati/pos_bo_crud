<?php

use Illuminate\Database\Seeder;


class PropertyTypesTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('property_types')->delete();
        
        \DB::table('property_types')->insert(array (
            0 => 
            array (
                'name' => 'select',
                'options_required' => true,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ),
            1 => 
            array (
                'name' => 'select-multi',
                'options_required' => true,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ),
            2 => 
            array (
                'name' => 'boolean',
                'options_required' => false,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ),
            3 => 
            array (
                'name' => 'text',
                'options_required' => false,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ),
        ));
    }
}
