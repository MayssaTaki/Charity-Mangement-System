<?php

use App\Models\human_case;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;



Route::post('siginUser','LoginUserController@store');
Route::post('loginUser','LoginUserController@login');
Route::post('logoutUser','LoginUserController@logout')->middleware('auth:sanctum');


Route::get("campaign","API\\campaignController@index");
Route::post("human_case","API\\human_caseController@store");
Route::get("human_case","API\\human_caseController@index");
Route::post("volunteer","API\\volunteerController@store");
Route::post("campaign_request","API\\campaign_requestController@store");
Route::post("donor_campaign","API\\donor_campaignController@store");
Route::post("Donor","API\\DonorController@store");




Route::get('/donation_value/human_case/{id}' , function ($id){
    $result = DB::select('select sum(donation_value)  from donor_humen where human_case_id = ?' ,[$id]);
    $value = human_case::find($id);
    if($value){
        
        return Response()->json(['result' => $result]);}
    else{return Response()->json(['message' => 'human case is not exits']);}
}); 


Route::post('/percentage',[human_caseController::class,'show']);