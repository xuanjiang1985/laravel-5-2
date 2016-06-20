<?php

use Illuminate\Database\Seeder;
use App\Permession;

class PermessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    Permession::create(['item_id' => 1, 'sort_id' => 10000, 'route_name' => 'manager','man_name' => '查看所有管理员']);
    Permession::create(['item_id' => 1, 'sort_id' => 9998, 'route_name' => 'manager.store','man_name' => '添加管理员']);
    Permession::create(['item_id' => 1, 'sort_id' => 9996, 'route_name' => 'manager.update','man_name' => '编辑管理员']);
    Permession::create(['item_id' => 1, 'sort_id' => 9994, 'route_name' => 'manager.delete','man_name' => '删除管理员']);
    Permession::create(['item_id' => 1, 'sort_id' => 9992, 'route_name' => 'manager.branch','man_name' => '分组管理员']);
    Permession::create(['item_id' => 1, 'sort_id' => 9888, 'route_name' => 'role','man_name' => '查看所有权限组']);
    Permession::create(['item_id' => 1, 'sort_id' => 9886, 'route_name' => 'role.distribute','man_name' => '分配权限']);
    Permession::create(['item_id' => 1, 'sort_id' => 9884, 'route_name' => 'role.store','man_name' => '添加权限组']);
    Permession::create(['item_id' => 1, 'sort_id' => 9882, 'route_name' => 'role.update','man_name' => '编辑权限组']);
    Permession::create(['item_id' => 1, 'sort_id' => 9880, 'route_name' => 'role.delete','man_name' => '删除权限组']);
    }
}
