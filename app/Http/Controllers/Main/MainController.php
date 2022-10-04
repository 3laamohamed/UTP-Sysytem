<?php

namespace App\Http\Controllers\Main;
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


//        $services = Services::get()->all();
//        $groups   = Group::get()->all();
//        $copyright= CopyRight::get()->first();
//        $projects = Project::orderBy("sort_project")->get();
        return view('main.home',compact([
            'about',
            'servicesGroups',
            'faqs',
            'partners',
//            'services',
//            'groups',
              'clients',
//            'copyright',
              'social',
//            'projects',
              'get_data',
        ]));
    }

  public function save_message(Request $request){
    $flage  = 0;
    $msg = "";
    function checkEmail($email) {
      $find1 = strpos($email, '@');
      $find2 = strpos($email, '.');
      return ($find1 !== false && $find2 !== false && $find2 > $find1);
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

    public function get_sections(Request $request){
        $sections = Section::where(['project_id'=>$request->id])->get();
        if($sections){
            return response()->json([
                'status'=>'true',
                'sections'=>$sections
            ]);
        }
    }

    public function get_details(Request $request){
        if($request->id == 'all'){
            $sections = Section::where(['project_id'=>$request->pro])->select(['id'])->get();
            $details = Details::whereIn('section_id',$sections)->get();
        }else{
            $details = Details::where(['section_id'=>$request->id])->get();
        }
        if($details){
            return response()->json([
                'status'=>'true',
                'details'=>$details
            ]);
        }
    }

    public function about(){
      $about    = About::get()->first();
      $team    = OurTeam::get()->all();
      return view('main.about',compact([
        'about',
        'team',
      ]));
    }

  public function contact(){
    $about    = About::get()->first();
    $team     = OurTeam::get()->all();
    $social   = Social::get()->first();

    return view('main.contact_us',compact([
      'about',
      'team',
      'social',
    ]));
  }
}
