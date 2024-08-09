<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    // Izveido atlautas darbibas "permissions" tabula

        $this->call(PermissionSeeder::class);

    // Izveido roli "roles" tabula

        $this->call(RoleSeeder::class);

    // Izveido parastu lietotaju 

        $user = User::factory()->create([
            'name' => 'user',
            'email' => 'user@localhost.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

    // Izveido administratora lietotaju 
        
        $user->assignRole('User');

        $admin = User::factory()->create([
            'name' => 'administrator',
            'email' => 'admin@localhost.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $admin->assignRole('Admin');
    }
}
