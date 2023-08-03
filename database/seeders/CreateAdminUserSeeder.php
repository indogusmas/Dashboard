<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name'      => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('1234567')
        ]);

        $userNonAdmin = User::create([
            'name'      => 'nonadmin',
            'email'     => 'nonadmin@gmail.com',
            'password'  => bcrypt('1234567')
        ]);

        $role = Role::create([
            'name'  => 'Admin'
        ]);

        $roleNonAdmin = Role::create([
            'name'  => 'Staf'
        ]);

        $permissions = Permission::all()->pluck('id');

        $permissionNonAdmin = [5,6,7,8,9];

        $role->givePermissionTo($permissions);

        $roleNonAdmin->givePermissionTo($permissionNonAdmin);

        $user->assignRole($role->id);

        $userNonAdmin->assignRole($roleNonAdmin->id);

    }
}
