<?php

namespace App\Http\Controllers\Main;
use App\Models\Control_Page;
use App\Models\FAQ;
use App\Models\Group;
use App\Models\CopyRight;
use App\Models\About;
use App\Models\OurTeam;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Contact;
use App\Models\Section;
use App\Models\Details;
use App\Models\ServicesGroup;
use App\Models\Social;
use App\Models\Client;
use App\Models\Services;
use App\Models\DataSheet;
use App\Models\counter_visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\VisitorController;

class MainController extends Controller
{
    public function home(){
        $getbrowser = VisitorController::get_browsers();
        $getdevice  = VisitorController::get_device();
        $getos      = VisitorController::get_os();
        $getip      = VisitorController::get_ip();
        $data       = VisitorController::get_user_agent();

        date_default_timezone_set("Africa/Cairo");
        $date = date("Y-m-d");
        $get_data = DataSheet::get()->first();
        $update_data = DataSheet::where(['id'=>$get_data->id])->update([
            'visitors'=>$get_data->visitors + 1,
        ]);
        $save_vis = counter_visitor::create([
            'date'      =>$date,
            'mac'       =>$getip,
            'device'    =>$getdevice,
            'browser'   =>$getbrowser,
            'os'        =>$getos,
        ]);

         $about    = About::get()->first();
         $servicesGroups = ServicesGroup::orderBy("sort_project")->get();
         $faqs = FAQ::get()->all();
         $partners = Partner::get()->all();
         $clients  = Client::inRandomOrder()->get()->all();
         $social   = Social::get()->first();
         $pages = Control_Page::get()->all();
         $copy = CopyRight::select(['name'])->get()->first();

      return view('main.home',compact([
            'about',
            'servicesGroups',
            'faqs',
            'partners',
            'clients',
            'social',
            'get_data',
            'pages',
            'copy'
        ]));
    }

  public function save_message(Request $request){
    $flage  = 0;
    $msg = "";
    function checkEmail($email) {
      $find1 = strpos($email, '@');
      $find2 = strpos($email, '.');
      return ($find1 !== false && $find2 !== false);
    }
    if(checkEmail($request->email)){$flage=0;}else{$flage=1;$msg="incorrect Email";return response()->json(['status'=>'false','msg'=>$msg]);}
    $size_phone = strlen($request->phone);
    if($size_phone >= 5 && $size_phone <= 13){$flage=0;}else{$flage = 1;$msg="incorrect Phone";return response()->json(['status'=>'false','msg'=>$msg]);}
    $size_name = strlen($request->name);
    if($size_name <= 17){$flage=0;}else{$flage = 1;$msg="incorrect Name length less than 17 character";return response()->json(['status'=>'false','msg'=>$msg]);}
    if($request->message == ''){$msg="please Enter Message";}

    $data = Contact::create([
      'name'  => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'disc'  => $request->message,
    ]);
    if($data){
      return response()->json(['status'=>'true']);
    }
  }
    public function about(){
      $pages = Control_Page::get()->all();
      $about    = About::get()->first();
      $team    = OurTeam::get()->all();
      $copy = CopyRight::select(['name'])->get()->first();
      return view('main.about',compact([
        'about',
        'team',
        'pages',
        'copy'
      ]));
    }

  public function contact(){
    $pages = Control_Page::get()->all();
    $about    = About::get()->first();
    $team     = OurTeam::get()->all();
    $social   = Social::get()->first();
    $copy = CopyRight::select(['name'])->get()->first();

    return view('main.contact_us',compact([
      'about',
      'team',
      'social',
      'pages',
      'copy'
    ]));
  }

  public function projects(){
    $pages = Control_Page::get()->all();
    $about    = About::get()->first();
    $projects = Project::orderBy("sort_project")->get();
    $copy = CopyRight::select(['name'])->get()->first();

    return view('main.project',compact([
      'about',
      'projects',
      'pages',
      'copy'
    ]));
  }

  public function show_services($id){
    $about    = About::get()->first();
    $pages = Control_Page::get()->all();
     $group = ServicesGroup::limit(1)->where(['id'=>$id])->select(['group'])->first();
     $services = Services::where(['group_id'=>$id])->orderBy("sort_service")->get();
     $copy = CopyRight::select(['name'])->get()->first();
     return view('main.services',compact('group','services','pages','about','copy'));
  }

  public function allServices(){
    $about    = About::get()->first();
    $pages = Control_Page::get()->all();
    $copy = CopyRight::select(['name'])->get()->first();
    $groups = ServicesGroup::with(['Services'])->orderBy("sort_project")->get();
    return view('main.allservices',compact('groups','pages','about','copy'));
  }


}
