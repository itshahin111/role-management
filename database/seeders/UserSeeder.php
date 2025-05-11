<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User

        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('password')
        ]);
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // Create Vendor User
        // $vendor = User::create([
        //     'name' => 'Seller',
        //     'email' => 'seller@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);

        // // Create Wholesale User
        // $wholesale = User::create([
        //     'name' => 'Wholesale',
        //     'email' => 'sholesaler@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);

        //create role
        $role = Role::create(['name' => 'Admin']);

        //Assign Permissions to Role
        $permission = Permission::pluck('id')->all();
        $role->syncPermissions($permission);

        //Assign Role to User
        $superAdmin->assignRole($role);
        $admin->assignRole($role);
        // $vendor->syncRoles($role);
        // $wholesale->syncRoles($role);
    }
}
