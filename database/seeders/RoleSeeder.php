<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    public function run()
    {
        $userRole = Role::create(['name' => 'user', 'guard_name' => 'web' ]);
        $adminRole = Role::create([ 'name' => 'admin', 'guard_name' => 'web' ]);
        $adminRole->User::givePermissionTo('all');
    }
}
