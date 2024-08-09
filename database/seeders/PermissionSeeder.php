<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ar produktu atlautas darbibas - visas

        $permission = Permission::create(['name' => 'create.product']);
        $permission = Permission::create(['name' => 'read.product']);
        $permission = Permission::create(['name' => 'update.product']);
        $permission = Permission::create(['name' => 'delete.product']);
    }
}
