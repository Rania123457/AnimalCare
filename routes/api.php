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

Route::get('/', function () {
    return response()->json([
        'status' => true,
    ]);
});

Route::post('login/Doctor','ControllerApi\ControllerDoctorApi@FunLogin'); //
Route::get('forgot-password_D', function () {
    return response()->json([
        'status' => true,
    ]);
});
Route::get('Get_the_code', 'ControllerApi\ControllerDoctorApi@Get_the_code')->middleware('hasRole:doctor');
Route::post('code_confirmation', 'ControllerApi\ControllerDoctorApi@code_confirmation')->middleware('hasRole:doctor');

Route::get('doctor_profile', 'ControllerApi\ControllerDoctorApi@indexProfile');

Route::post('doctor_profile/update', 'ControllerApi\ControllerDoctorApi@updateProfile');
/////// البوستات
Route::get('PostIndex_D','ControllerApi\ControllerDoctorApi@funPost');//
Route::post('StorePost_D','ControllerApi\ControllerDoctorApi@storepost');
Route::get('ShowPost_D/{id}','ControllerApi\ControllerDoctorApi@ShowPost');
Route::post('UpdatePost_D/{id}','ControllerApi\ControllerDoctorApi@UpdatePost');
Route::delete('deletePost_D/{id}','ControllerApi\ControllerDoctorApi@deletePost');


///// الاستشارات
Route::get('AskIndex_D','ControllerApi\ControllerDoctorApi@funAsk');//
Route::post('commentAsk_D','ControllerApi\ControllerDoctorApi@CommentAsk'); //

///////  الدردشات الخاصه
Route::post('getAsker','ControllerApi\ControllerDoctorApi@getAsker');//
Route::post('saveanswer','ControllerApi\ControllerDoctorApi@saveanswer'); //

/////////////////////// guide Api /////////////////////

Route::get('/', function () {
    return response()->json([
        'status' => true,
    ]);
});

Route::post('login/guide','ControllerApi\ControllerguideApi@FunLogin'); //
Route::get('forgot-password_G', function () {
    return response()->json([
        'status' => true,
    ]);
})->middleware('hasRole:guide');
Route::get('Get_the_code', 'ControllerApi\ControllerguideApi@Get_the_code')->middleware('hasRole:guide');
Route::post('code_confirmation', 'ControllerApi\ControllerguideApi@code_confirmation')->middleware('hasRole:guide');

Route::get('guide_profile', 'ControllerApi\ControllerguideApi@indexProfile');
Route::post('guide_profile/update', 'ControllerApi\ControllerguideApi@updateProfile');

Route::get('PostIndex_G','ControllerApi\ControllerguideApi@funPost');//
Route::POST('StorePost_G','ControllerApi\ControllerguideApi@storepost');
Route::get('ShowPost_G/{id}','ControllerApi\ControllerguideApi@ShowPost');
Route::post('UpdatePost_G/{id}','ControllerApi\ControllerguideApi@UpdatePost');
Route::delete('deletePost_G/{id}','ControllerApi\ControllerguideApi@deletePost');

///// الاستشارات
Route::get('AskIndex_G','ControllerApi\ControllerguideApi@funAsk');//
Route::post('commentAsk_G','ControllerApi\ControllerguideApi@CommentAsk'); //

///////////////////////  Benificary Api /////////////////////

Route::get('/', function () {
    return response()->json([
        'status' => true,
    ]);
});

Route::post('register','ControllerApi\ControllerBenificaryApi@FunRegister');//
Route::post('login/Benificary','ControllerApi\ControllerBenificaryApi@FunLogin'); //
Route::get('forgot-password_B','ControllerApi\ControllerBenificaryApi@forgot-password');
Route::get('Get_the_code', 'ControllerApi\ControllerBenificaryApi@Get_the_code');
Route::post('code_confirmation', 'ControllerApi\ControllerBenificaryApi@code_confirmation');
////////// profile
Route::get('Benificary_profile', 'ControllerApi\ControllerBenificaryApi@indexProfile');
Route::post('Benificary_profile/update', 'ControllerApi\ControllerBenificaryApi@updateProfile');
///////// post
Route::get('PostIndex_BD','ControllerApi\ControllerBenificaryApi@funPost_d');//
Route::get('ShowPost_BD/{id}','ControllerApi\ControllerBenificaryApi@ShowPost_d');
Route::get('PostIndex_BG','ControllerApi\ControllerBenificaryApi@funPost_g');//
Route::get('ShowPost_BG/{id}','ControllerApi\ControllerBenificaryApi@ShowPost_g');
///////// comment
Route::post('comment','ControllerApi\ControllerBenificaryApi@StoreComment'); //

///// الاستشارات
Route::get('AskIndex_B','ControllerApi\ControllerBenificaryApi@funAsk');//
Route::post('UpdateAsk/{id}','ControllerApi\ControllerBenificaryApi@UpdateAsk');
Route::post('storeAsk','ControllerApi\ControllerBenificaryApi@storeAsk');//
Route::delete('deleteAsk','ControllerApi\ControllerBenificaryApi@deleteAsk');//

///////  الدردشات الخاصه
Route::get('Index_chat','ControllerApi\ControllerBenificaryApi@Index_chat');//

Route::post('saveask','ControllerApi\ControllerBenificaryApi@saveask');//

Route::get('showanswer','ControllerApi\ControllerBenificaryApi@showanswer');//

//////////////////////////////deleteAsk///////////////////////////////////storeAsk




































// Route::get('post','ControllerContentApi@funPost');//

// Route::post('saveask','ControllerContentApi@saveask');//

// Route::post('saveanswer','ControllerContentApi@saveanswer'); //

// Route::post('showanswer','ControllerContentApi@showanswer');//

// Route::post('updateuser','ControllerContentApi@updateuser');//

// Route::post('getAsker','ControllerContentApi@getAsker');//



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


