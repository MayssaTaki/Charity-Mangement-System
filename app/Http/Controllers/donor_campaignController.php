<?php

namespace App\Http\Controllers;

use App\Models\campaign;
use Illuminate\Http\Request;
use App\Models\donor_campaign;
use Illuminate\Support\Facades\DB;


class donor_campaignController extends Controller
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
        $data=donor_campaign::select('*')
        ->where('Name','like','%'.$search['value'].'%')
        ->skip($start)
        ->take($length)->get();
        $arr=array();
        foreach($data as $d){
            $type=campaign::find($d->campaign_id)->Name;
        
            $arr[]=array(
            'Name'=>$d->Name,
            'campaign'=>$type,
            'email'=>$d->email,
            'ID_number'=>$d->ID_number,
            'company_Bank'=>$d->company_Bank,
            'donation_value'=>$d->donation_value,
            'phone'=>$d->phone,
            'action' =>"   <a href='updateStatus/".$d->id."/'  class='btn btn-info'>{$d->status}</a>
            "
            
    
            
            
       
            );
        }
        $total_members=donor_campaign::count();
       
       $count=DB::select("select * from donor_campaigns where Name like '%".$search['value']."%'");
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
        return view('donor_campaign.index');
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\donor_campaign  $donor_campaign
     * @return \Illuminate\Http\Response
     */
    public function show(donor_campaign $donor_campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\donor_campaign  $donor_campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(donor_campaign $donor_campaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\donor_campaign  $donor_campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      $donor=donor_campaign::find($id);
      $donor->update([
        'status'=>true,
      ]);
          return redirect()->back();
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\donor_campaign  $donor_campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(donor_campaign $donor_campaign)
    {
        //
    }
}
