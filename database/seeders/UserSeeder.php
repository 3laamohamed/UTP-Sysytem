<?php
namespace Database\Seeders;
use App\Models\Control_Page;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\DataSheet;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'            => 'Admin',
            'email'           => 'admin',
            'password' => Hash::make('admin_utp'),
        ]);

        $data = DataSheet::create([
            'visitors'=>0,
            'projects'=>0,
            'status_v'=>0,
            'status_p'=>0
        ]);
        $pages = array('about','project','contact','clients','copyright','social','services','team');
        foreach ($pages as $page){
          $control_page = Control_Page::create([
            'page'   =>$page,
            'status' =>1,
          ]);
        }
    }
}
