<?php

use App\Http\Controllers\AdminController;
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

Route::get('loginAdmin','AdminController@loginAdmin')->name('login');
Route::post('Authlogin','AdminController@Authlogin')->name('Authlogin');



Route::middleware(['auth:admin'])->group(function(){ 

    

Route::resource('campaign', "campaignController");
Route::get('pagination-campaign',"campaignController@page");
Route::get('campaign/{id}/deleted',"campaignController@deleted");
Route::get('campagins/export',[App\Http\Controllers\campaignController::class, 'exportcampaign'])->name('campaigns.export');

Route::resource('area', "areaController");
Route::get('pagination-area',"areaController@page");
Route::get('area/{id}/deleted',"areaController@deleted");

Route::resource('poor_family', "poor_familyController");
Route::get('pagination-poor_family',"poor_familyController@page");
Route::get('poor_family/{id}/deleted',"poor_familyController@deleted");
Route::get('poor_families/export',[App\Http\Controllers\poor_familyController::class, 'exportpoor_family'])->name('poor_families.export');



Route::resource('send_campaign', "send_campaignController");
Route::get('pagination-send_campaign',"send_campaignController@page");
Route::get('send_campaign/{id}/deleted',"send_campaignController@deleted");
Route::get('send_campaigns/export',[App\Http\Controllers\send_campaignController::class, 'exportsend_campaign'])->name('send_campaigns.export');



Route::resource('human_case', "human_caseController");
Route::get('pagination-human_case',"human_caseController@page");
Route::get('human_case/{id}/deleted',"human_caseController@deleted");



Route::resource('volunteer', "volunteerController");
Route::get('pagination-volunteer',"volunteerController@page");




Route::resource('volunteer_role', "volunteer_roleController");
Route::get('pagination-volunteer_role',"volunteer_roleController@page");
Route::get('volunteer_role/{id}/deleted',"volunteer_roleController@deleted");




Route::resource('volunteer1', "volunteer1Controller");
Route::get('pagination-volunteer1',"volunteer1Controller@page");
Route::get('volunteer1/{id}/deleted',"volunteer1Controller@deleted");
Route::get('volunteer1s/export',[App\Http\Controllers\volunteer1Controller::class, 'exportvolunteer1'])->name('volunteer1s.export');





Route::resource('campaign_request', "campaign_requestController");
Route::get('pagination-campaign_request',"campaign_requestController@page");


Route::resource('Cach_payment', "Cach_paymentController");
Route::get('pagination-Cach_payment',"Cach_paymentController@page");
Route::get('Cach_payments/export',[App\Http\Controllers\Cach_paymentController::class, 'exportCach_payment'])->name('Cach_payments.export');


Route::resource('donor_campaign', "donor_campaignController");
Route::get('pagination-donor_campaign',"donor_campaignController@page");

Route::resource('Donor', "DonorController");
Route::get('pagination-Donor',"DonorController@page");









Route::resource('user', "userController");
Route::get('pagination-user',"userController@page");
Route::get('user/{id}/deleted',"userController@deleted");



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('logout',[AdminController::class,'logoutAdmin']);

Route::get('updateStatus/{id}','DonorController@update');
Route::get('updateStatus/{id}','donor_campaignController@update');






});