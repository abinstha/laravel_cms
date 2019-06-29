<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name' => "Laravel's Blog",
            'address' => 'Russia, Nepal',
            'contact_number' => '98415426533',
            'contact_email' => 'hello@info.com'
        ]);
    }
}
