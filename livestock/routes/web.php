<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => 'admin'],function(){
    //////////////////////////login/////////////////////////////

    Route::get('login','ControllerAdminpost@login') -> name('login');


 //////////////////////////forget password/////////////////////////////

    Route::get('/forgot-password', function () {
        return view('admin.change-password');
    })->middleware('guest')->name('password.request');

    Route::post('Get_the_code', 'ControllerAdminpost@Get_the_code')-> name('Get_the_code');

    Route::post('code_confirmation', 'ControllerAdminpost@code_confirmation')-> name('code_confirmation');
 ////////////

    Route::POST('checklogin','ControllerAdminpost@CreateLogin') -> name('checklogin');

    Route::get('exit','ControllerAdminpost@funExit') -> name('exit');



//////////////////////////////////////Begin route doctor and home ////////////////////////done
    Route::get('home','Controllerdoctor@home') -> name('admin.home');
    Route::get('create','Controllerdoctor@create') -> name('admin.create');
    Route::POST('storedoctor','Controllerdoctor@store') -> name('admin.store');
    Route::get('edit/{doctor_id}','Controllerdoctor@edit') -> name('admin.edit');
    Route::POST('updatedoctor/{doctorr_id}','Controllerdoctor@updatedoctor') -> name('admin.update');
    Route::get('view','Controllerdoctor@getalldata') -> name('admin.view');
    Route::get('delete/{doctor_id}','Controllerdoctor@delete') -> name('doctor.delete');
///////////////////////////////End route admin ////////////////////////////////////////////////done

//////////////////////////////////////Begin route guide and home ////////////////////////done
Route::get('home','Controllerdoctor@home') -> name('admin.home');
Route::get('create','Controllerdoctor@create') -> name('admin.create');
Route::POST('storeguide','Controllerdoctor@store') -> name('admin.store');
Route::get('edit/{guide_id}','Controllerdoctor@edit') -> name('admin.edit');
Route::POST('updateguide/{guide_id}','Controllerdoctor@updateguide') -> name('admin.update');
Route::get('view','Controllerdoctor@getalldata') -> name('admin.view');
Route::get('delete/{guide_id}','Controllerdoctor@delete') -> name('guide.delete');
///////////////////////////////End route admin ////////////////////////////////////////////////done


    Route::get('binfitview','Controllerdoctor@viewbinfit') -> name('binfit.view');
    Route::get('binfitdelete/{binfit_id}','Controllerdoctor@binfitdelete') -> name('binfit.delete');
//////////////////show Binfit table /////////////////////////////////////////////////////

    Route::get('showPosts','Controllernews@showPosts') -> name('Posts.show');
    Route::get('deletePost','Controllernews@deletePost') -> name('Post.delete');

  ///////////////////////////////////////End Post Route////////////////done Post.
  Route::get('login','Controllernews@login') ->name('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
