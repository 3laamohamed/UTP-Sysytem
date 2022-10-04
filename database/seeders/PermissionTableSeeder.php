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
            'services',
            'social',
            'copyright',
            'contact',
            'groups',
            'projects',
            'details',
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
