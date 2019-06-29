<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'about' => 'Lorem quis nostrudvoluptate velit esse cillum sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'avatar' => 'uploads/avatars/Capture.png',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com',
            'twitter' => 'twitter.com'
        ]);
    }
}
