<?php

namespace App\Http\Controllers;

use App\Models\campaign_request;
use Illuminate\Http\Request;
use DB;

class campaign_requestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function page(Request $r){
        $length=$r->get('length');
        $start=$r->get('start');
        $search=$r->get('search');
        $data=campaign_request::select('*')
        ->where('Name','like','%'.$search['value'].'%')
        ->skip($start)
        ->take($length)->get();
        $arr=array();
        foreach($data as $d){
             
            $arr[]=array(
            'Name'=>$d->Name,
            'Are_you_already_registered'=>$d->Are_you_already_registered,
            'number_of_family_member'=>$d->number_of_family_member,
            'study'=>$d->study,
            'phone'=>$d->phone,
            'address'=>$d->address,
            'campaign'=>$d->campaign,
          
            
       
           
       
            );
        }
        $total_members=campaign_request::count();
       
       $count=DB::select("select * from campaign_requests where Name like '%".$search['value']."%'");
       $recordsFiltered=count($count);
       $data = array(
         
           'recordsTotal' => $total_members,
           'recordsFiltered' => $recordsFiltered,
           'data' => $arr,
       );
        
        echo json_encode($data);
    }
    public function index()
    {
        return view('campaign_request.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\campaign_request  $campaign_request
     * @return \Illuminate\Http\Response
     */
    public function edit(campaign_request $campaign_request)
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
