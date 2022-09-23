<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home', function () {
    return redirect()->route('admin.general');
    // return redirect('/Admin/Project');
});
// Route::get('/login', function () {
//     return redirect('/home');
//     // return redirect('/Admin/Project');
// });
Route::get('/home'     , [App\Http\Controllers\Admin\AdminController::class, 'project']);

Auth::routes();
// Route::get('/', function () {
//     return redirect('/main');
// });
Route::get('/'         , [App\Http\Controllers\Main\MainController::class, 'home'])      ->name('home');
Route::post('/save_message', [App\Http\Controllers\Main\MainController::class,'save_message']) ->name('save.message');
Route::post('/get_sections', [App\Http\Controllers\Main\MainController::class,'get_sections']) ->name('get.sections');
Route::post('/get_details', [App\Http\Controllers\Main\MainController::class,'get_details']) ->name('get.details');



Route::group(['prefix' => 'Admin' , 'namespace' => 'Admin'] ,function()
{

    Route::get('/View_About'    , [App\Http\Controllers\Admin\AdminController::class, 'viewabout'])     ->name('admin.about');
        Route::post('/save_about', [App\Http\Controllers\Admin\AdminController::class,'save_about']) ->name('admin.save.about');

    Route::get('/View_Clients'  , [App\Http\Controllers\Admin\AdminController::class, 'clients'])   ->name('admin.clients');
        Route::post('/save_client', [App\Http\Controllers\Admin\AdminController::class,'save_client']) ->name('admin.save.client');
        Route::post('/delete_client', [App\Http\Controllers\Admin\AdminController::class,'delete_client']) ->name('admin.delete.client');

    Route::get('/CopyRight', [App\Http\Controllers\Admin\AdminController::class, 'copyright']) ->name('admin.copyright');
        Route::post('/save_copyright', [App\Http\Controllers\Admin\AdminController::class,'save_copy']) ->name('admin.save.copyright');

    Route::get('/Social'  , [App\Http\Controllers\Admin\AdminController::class, 'general'])   ->name('admin.general');
        Route::post('/save_social', [App\Http\Controllers\Admin\AdminController::class,'save_social']) ->name('admin.save.social');


    Route::get('/Group'    , [App\Http\Controllers\Admin\AdminController::class, 'group'])   ->name('admin.group');
        Route::post('/save_group', [App\Http\Controllers\Admin\AdminController::class,'save_group']) ->name('admin.save.group');

    Route::get('/Project'  , [App\Http\Controllers\Admin\AdminController::class, 'project'])   ->name('admin.project');
            Route::post('/save_project', [App\Http\Controllers\Admin\AdminController::class,'save_project']) ->name('admin.save.project');
            Route::post('/get_update_project', [App\Http\Controllers\Admin\AdminController::class,'get_update_project']) ->name('admin.get.update.project');
            Route::post('/update_project', [App\Http\Controllers\Admin\AdminController::class,'update_project']) ->name('admin.update.project');
            Route::post('/delete_project', [App\Http\Controllers\Admin\AdminController::class,'delete_project']) ->name('admin.del.project');
            Route::post('/save_all_search', [App\Http\Controllers\Admin\AdminController::class,'save_all_search']) ->name('admin.all.search.project');


    Route::get('/ViewDetails'  , [AdminController::class, 'details'])   ->name('admin.details');
            Route::post('/save_details_project', [AdminController::class,'save_details_project']) ->name('admin.save.details.project');
            Route::post('/search_all_section', [AdminController::class,'search_all_section']) ->name('admin.search.all.section');
            Route::post('/delete_section', [AdminController::class,'delete_section']) ->name('admin.del.section');
            Route::post('/get_data_details', [AdminController::class,'get_data_details']) ->name('admin.get.update.details');
            Route::post('/del_image_details', [AdminController::class,'del_image_details']) ->name('admin.del.image.details');
            Route::post('/update_image_details', [AdminController::class,'update_image_details']) ->name('admin.update.image.details');




    Route::get('/Contact'  , [AdminController::class, 'contact'])   ->name('admin.contact');
            Route::post('/delete_contact', [AdminController::class,'delete_contact']) ->name('admin.delete.contact');

    Route::get('/Register' , [AdminController::class, 'reg'])   ->name('admin.reg');


    Route::get('/View_services'    , [AdminController::class, 'services'])     ->name('admin.services');
        Route::post('/delete_service', [AdminController::class,'delete_service']) ->name('admin.delete.service');
        Route::post('/save_service', [AdminController::class,'save_service']) ->name('admin.save.service');
        Route::post('/update_service', [AdminController::class,'update_service']) ->name('admin.update.services');
        Route::post('/get_update_service', [AdminController::class,'get_update_service']) ->name('admin.get.update.services');

    Route::get('/ViewData',[AdminController::class,'View_data']) ->name('admin.View_data');
        Route::post('/save_datasheet', [AdminController::class,'save_datasheet']) ->name('admin.save_datasheet');
        Route::post('/search_counter', [AdminController::class,'search_counter']) ->name('admin.search.vis');

    Route::get('/View_SortProjects',[AdminController::class,'View_sort_projects']) ->name('admin.View_sort_projects');
        Route::post('/save_sort_project', [AdminController::class,'save_sort_project']) ->name('admin.save_sort_project');

    Route::get('/View_control_page',[AdminController::class,'View_control_page'])->name('admin.View_control_page');
        Route::post('/save_control_page', [AdminController::class,'save_control_page']) ->name('admin.save_control_page');

    Route::get('/update_user/user={id}',[AdminController::class,'update_user'])->name('update_user');
    Route::post('/update_user_now',[AdminController::class,'update_user_now'])->name('update_user_now');

    Route::get('/Services_group'    , [AdminController::class, 'services_group'])   ->name('admin.group_services');
      Route::post('/save_services_group', [AdminController::class,'save_services_group']) ->name('admin.save_services_group');

    Route::get('/View_our_team'      , [AdminController::class, 'view_our_team'])   ->name('admin.View_our_team');
        Route::post('/delete_person' , [AdminController::class,'delete_person'])    ->name('admin.delete.person');
        Route::post('/save_person'   , [AdminController::class,'save_person'])      ->name('admin.save.person');
        Route::post('/update_person' , [AdminController::class,'update_person']) ->name('admin.update.person');
        Route::post('/get_update_person', [AdminController::class,'get_update_person']) ->name('admin.get.update.person');

});


