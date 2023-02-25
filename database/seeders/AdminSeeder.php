<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $admin=\App\Models\User::create([
           'name'=>'admin',
           'password'=>bcrypt('password'),
           'email'=>'admin@admin.com',
           'is_active'=>1,
           'is_admin'=>1,
       ]);
       $role=Role::create([
           'name'=>'super_admin',
           'name_display'=>'مدير عام',
           'guard_name'=>'web',
       ]);
       $permissions=Permission::all()->pluck('id');
       $role->permissions()->sync($permissions);
       $admin->roles()->sync($role->id);
    }
}
