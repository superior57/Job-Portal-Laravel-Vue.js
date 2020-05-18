<?php

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\User as UserResource;

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

Route::get('v1/listing/get-freelancers', 'RestAPIController@getFreelancer');
Route::get('v1/listing/get-employers', 'RestAPIController@getEmployer');
Route::get('v1/listing/get-jobs', 'RestAPIController@getJobs');
Route::post('v1/user/update-profile', 'RestAPIController@updateProfile');
Route::post('v1/user/do-login', 'RestAPIController@userLogin');
Route::post('v1/user/do-logout', 'RestAPIController@userLogout');
Route::post('v1/media/upload-media', 'RestAPIController@uploadMedia');
Route::post('v1/user/update-favourite', 'RestAPIController@updateWishlist');
Route::post('v1/user/submit-proposal', 'RestAPIController@submitProposal');
Route::get('v1/taxonomies/get-list', 'RestAPIController@listings');
Route::get('v1/list/get-categories', 'RestAPIController@getCategories');
Route::post('v1/user/reporting', 'RestAPIController@storeReport');
Route::post('v1/user/send-offer', 'RestAPIController@sendProjectOffers');
Route::get('v1/taxonomies/get-taxonomy', 'RestAPIController@taxonomies');
Route::get('v1/profile/setting', 'RestAPIController@getUserInfo');
Route::post('v1/password/reset', 'RestAPIController@sendResetLinkEmail');
Route::get('v1/employer-jobs', 'RestAPIController@getEmployerJobs');
Route::post('v1/listing/add-jobs', 'RestAPIController@postJob');
Route::get('v1/listing/services', 'RestAPIController@getServices');
Route::get('v1/service/detail', 'RestAPIController@getService');
Route::post('v1/create-user', 'RestAPIController@createUser');
Route::post('v1/listing/add-service', 'RestAPIController@postService');
