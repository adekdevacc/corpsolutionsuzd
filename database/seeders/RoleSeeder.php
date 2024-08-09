<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Izveido Admin role

        $adminRole = Role::create(['name' => 'Admin']);

        // Pieskir visas tiesibas

        $adminRole->givePermissionTo('create.product');
        $adminRole->givePermissionTo('read.product');
        $adminRole->givePermissionTo('update.product');
        $adminRole->givePermissionTo('delete.product');

        // Izveido User role

        $userRole = Role::create(['name' => 'User']);

        // Pieskir read tiesibas

        $userRole->givePermissionTo('read.product');

    }
}
