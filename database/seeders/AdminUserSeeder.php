<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Create a system admin user
        $user = User::firstOrCreate([
            'email' => 'admin@system.com',
        ], [
            'name' => 'System Admin',
            'password' => bcrypt('password'), // Change this in production
        ]);

        // Assign the 'admin' role with guard 'system'
        $user->assignRole(
            \Spatie\Permission\Models\Role::where('name', 'admin')->where('guard_name', 'system')->first()
        );
    }
}
