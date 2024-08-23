<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/////////////////////// Doctor Api /////////////////////
Route::post('login/Doctor','ControllerDoctorApi@FunLogin'); //
Route::get('/forgot-password', function () {
    return response()->json([
        'status' => true,
    ]);
});
Route::post('Get_the_code', 'ControllerDoctorApi@Get_the_code');
Route::post('code_confirmation', 'ControllerDoctorApi@code_confirmation');

Route::get('/doctor_profile', 'ControllerDoctorApi@indexProfile');

Route::put('/doctor_profile/update', 'ControllerDoctorApi@updateProfile')
    ->middleware('hasRole:doctor');




/////////////////////// guide Api /////////////////////
Route::post('login/guide','ControllerguideApi@FunLogin'); //
Route::get('/forgot-password', function () {
    return response()->json([
        'status' => true,
    ]);
});
Route::post('Get_the_code', 'ControllerguideApi@Get_the_code');
Route::post('code_confirmation', 'ControllerguideApi@code_confirmation');

Route::get('/guide_profile', 'ControllerguideApi@indexProfile');
Route::put('/guide_profile/update', 'ControllerguideApi@updateProfile');




///////////////////////  Benificary Api /////////////////////
Route::post('register','ControllerBenificaryApi@FunRegister');//
Route::post('login/Benificary','ControllerBenificaryApi@FunLogin'); //
Route::get('/forgot-password', function () {
    return response()->json([
        'status' => true,
    ]);
});
Route::post('Get_the_code', 'ControllerBenificaryApi@Get_the_code');
Route::post('code_confirmation', 'ControllerBenificaryApi@code_confirmation');

Route::get('/Benificary_profile', 'ControllerBenificaryApi@indexProfile');
Route::put('/Benificary_profile/update', 'ControllerBenificaryApi@updateProfile');
/////////////////////////////////////////////////////////////////




































Route::get('post','ControllerContentApi@funPost');//

Route::post('saveask','ControllerContentApi@saveask');//

Route::post('saveanswer','ControllerContentApi@saveanswer'); //

Route::post('showanswer','ControllerContentApi@showanswer');//

Route::post('updateuser','ControllerContentApi@updateuser');//

Route::post('getAsker','ControllerContentApi@getAsker');//



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


