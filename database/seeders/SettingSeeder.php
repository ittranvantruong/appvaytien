<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('settings')->insert([
            'key' => 'site_name',
            'plain_value' => 'Travel',
        ]);
        DB::table('settings')->insert([
            'key' => 'site_logo',
            'plain_value' => 'public/images/logo-default.png',
            'type_input' => 3
        ]);
        DB::table('settings')->insert([
            'key' => 'site_hotline',
            'plain_value' => '0379266997'
        ]);
        DB::table('settings')->insert([
            'key' => 'site_zalo',
            'plain_value' => '0379266997'
        ]);
        // DB::table('settings')->insert([
        //     'key' => 'site_facebook',
        //     'plain_value' => '0379266997',
        //     'type_input' => 1
        // ]);
        DB::table('settings')->insert([
            'key' => 'site_introduce',
            'plain_value' => '',
            'type_input' => 2
        ]);
    }
}
