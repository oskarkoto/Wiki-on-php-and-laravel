<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Editor'])
            ->givePermissionTo(['wiki-list', 'wiki-create', 'wiki-edit', 'wiki-delete']);
        $role = Role::create(['name' => 'Contributor'])
            ->givePermissionTo(['wiki-list', 'wiki-create', 'wiki-edit', 'wiki-delete']);
    }
}
