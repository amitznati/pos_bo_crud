<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->delete();

        DB::table('languages')->insert([
            'name'        => 'English',
            'flag'        => '',
            'abbr'        => 'en',
            'script'    => 'Latn',
            'native'    => 'English',
            'active'    => '1',
            'default'    => '1',
        ]);

        DB::table('languages')->insert([
            'name'        => 'Hebrew',
            'flag'        => '',
            'abbr'        => 'he',
            'script'    => 'Latn',
            'native'    => 'עברית',
            'active'    => '1',
            'default'    => '0',
        ]);

        $this->command->info('Language seeding successful.');
    }
}
