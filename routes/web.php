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

    Route::get('login','Controllernews@login') -> name('login')->middleware('hasRole:manager');

    Route::POST('checklogin','Controllernews@CreateLogin') -> name('checklogin');

    Route::get('exit','Controllernews@funExit') -> name('exit');

//////////////////////////////////////Begin route doctor  ////////////////////////done
Route::get('home','Controllerdoctor@home') -> name('admin.home');
Route::get('create','Controllerdoctor@create') -> name('admin.create');
Route::POST('storedoctor','Controllerdoctor@store') -> name('admin.store');
Route::get('edit/{doctorr_id}','Controllerdoctor@edit') -> name('admin.edit');
Route::POST('updatedoctor/{doctorr_id}','Controllerdoctor@updatedoctor') -> name('admin.update');
Route::get('view','Controllerdoctor@getalldata') -> name('admin.view');
Route::get('delete/{doctor_id}','Controllerdoctor@delete') -> name('doctor.delete');
Route::get('showPosts/doctor','Controllerdoctor@showposts') -> name('Posts.show');
Route::get('deletePost/doctor/{doctor_id}','Controllerdoctor@deletePost') -> name('Post.delete');
///////////////////////////////End route admin ////////////////////////////////////////////////done

//////////////////////////////////////Begin route guide  ////////////////////////done
Route::get('home','Controllerdoctor@home') -> name('admin.home');
Route::get('create/guide','Controllerguide@create') -> name('admin.guide.create');
Route::POST('storeguide','Controllerguide@store') -> name('admin.guide.store');
Route::get('edit/guide/{guidee_id}','Controllerguide@edit') -> name('admin.guide.edit');
Route::POST('updateguide/{guidee_id}','Controllerguide@updateguide') -> name('admin.guide.update');
Route::get('view/guide','Controllerguide@getalldata') -> name('admin.guide.view');
Route::get('delete/guide/{guide_id}','Controllerguide@delete') -> name('guide.delete');
Route::get('showPosts/guide','Controllerguide@showposts_guide') -> name('Posts.guide.show');
Route::get('deletePost/guide/{guide_id}','Controllerguide@deletePost_guide') -> name('Post.guide.delete');
///////////////////////////////End route admin ////////////////////////////////////////////////done

Route::get('binfitview','Controllerdoctor@viewbinfit') -> name('binfit.view');
Route::get('binfitdelete/{binfit_id}','Controllerdoctor@binfitdelete') -> name('binfit.delete');

//////////////////show Binfit table /////////////////////////////////////////////////////

    // Route::get('showPosts','Controllernews@showposts') -> name('Posts.show');
    // Route::get('deletePost','Controllernews@deletePost') -> name('Post.delete');

  ///////////////////////////////////////End Post Route////////////////done Post.
  Route::get('login','Controllernews@login') ->name('login');



});



