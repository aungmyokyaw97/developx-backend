<?php

namespace Database\Seeders;

use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rootAdmin = Admin::create([
            'role_id' => 1,
            'name' => "RootAdmin",
            'email' => "root@admin.com",
            'password' => bcrypt('rootadmin')
        ]);
        $rootAdmin->assignRole('root-admin');

        $admin = Admin::create([
            'role_id' => 2,
            'name' => "Admin",
            'email' => "admin@admin.com",
            'password' => bcrypt('admin')
        ]);
        $admin->assignRole('admin');
    }
}