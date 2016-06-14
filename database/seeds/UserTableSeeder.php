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
        User::create(['name' => 'adminer',
                        'email' => 'admin@admin.com',
                        'admin_id' => 1,
                        'password' => bcrypt(12345678),
                    ]);
    }
}
