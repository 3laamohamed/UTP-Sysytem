<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user',
            'role',
            'about',
            'clients',
            'view_data',
            'group_services',
            'sort_group_services',
            'services',
            'sort_services',
            'social',
            'copyright',
            'contact',
            'projects',
            'sort_projects',
            'control_page',
            'our_team',
            'partners',
            'faq'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
