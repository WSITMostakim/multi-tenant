<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $types = ['admin', 'user'];

        foreach ($types as $type) {
            Role::firstOrCreate([
                'name' => $type,
            ]);
        }
    }
}
