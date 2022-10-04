<?php

namespace Database\Seeders;

use App\Models\Control_Page;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\DataSheet;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = DataSheet::create([
          'visitors'=>0,
          'projects'=>0,
          'status_v'=>0,
          'status_p'=>0
        ]);

      $pages = array('about','project','contact','clients','copyright','social','services','team','FAQ','partner');
      foreach ($pages as $page){
        $control_page = Control_Page::create([
          'page'   =>$page,
          'status' =>1,
        ]);
      }

        $user = User::create([
            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
