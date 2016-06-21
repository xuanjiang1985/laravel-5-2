<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create adminer
        User::create(['name' => 'adminer',
                        'email' => 'admin@admin.com',
                        'admin_id' => 1,
                        'password' => bcrypt(12345678),
                    ]);
        //create front user
        User::create(['name' => 'zhou',
                        'email' => 'zhou@zhou.com',
                        'admin_id' => 0,
                        'password' => bcrypt(12345678),
                    ]);
    }
}
