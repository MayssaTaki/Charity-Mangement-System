<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\campaign_request;
use Illuminate\Http\Request;
use Validator;

class campaign_requestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'Name'=>'required|max:255',
            'phone'=>'required',
            'campaign'=>'required',
       
    
        ]);
        if($validator->fails()){
            return response(['error'=>$validator->errors(),'Validation Error'],400);
        }
              try{
            $campaign_request=new campaign_request();
            $campaign_request->Name=$request->Name;
            $campaign_request->Are_you_already_registered=$request->Are_you_already_registered;
            $campaign_request->number_of_family_member=$request->number_of_family_member;
            $campaign_request->study=$request->study;
            $campaign_request->phone=$request->phone;
            $campaign_request->address=$request->address;
            $campaign_request->campaign=$request->campaign;

             $campaign_request->save();}
             catch(\Exception $e){
                return response("internal server error",500);
             }
             return $campaign_request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\campaign_request  $campaign_request
     * @return \Illuminate\Http\Response
     */
    public function show(campaign_request $campaign_request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\campaign_request  $campaign_request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, campaign_request $campaign_request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\campaign_request  $campaign_request
     * @return \Illuminate\Http\Response
     */
    public function destroy(campaign_request $campaign_request)
    {
        //
    }
}
