<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $index = Permission::create(['name' => 'project', 'guard_name' => 'admin']);
        $create = Permission::create(['name' => 'job', 'guard_name' => 'admin']);
        $show = Permission::create(['name' => 'admin', 'guard_name' => 'admin']);
        $edit = Permission::create(['name' => 'role', 'guard_name' => 'admin']);
        
        $rootAdmin = Role::create(['name' => 'root-admin', 'guard_name' => 'admin']);
        $rootAdmin->givePermissionTo(Permission::all());
        
        $admin = Role::create(['name' => 'admin', 'guard_name' => 'admin']);
        $admin->givePermissionTo('project', 'job');
    }
}