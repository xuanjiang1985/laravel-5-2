<?php

use Illuminate\Database\Seeder;
use App\Permession;

class PermessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [];
        for ($i=1; $i < 101; $i++) { 
            $arr[] = $i;
        }
        $new = serialize($arr);
        Permession::create(['role_id' => 1,
                            'role_permession' => $new]);
    }
}
