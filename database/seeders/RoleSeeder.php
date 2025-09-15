<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $contexts = ['system', 'tenant'];
        $types = ['admin', 'user'];

        foreach ($contexts as $context) {
            foreach ($types as $type) {
                Role::firstOrCreate([
                    'name' => $type,
                    'guard_name' => $context
                ]);
            }
        }
    }
}
