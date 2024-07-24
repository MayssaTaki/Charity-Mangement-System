<?php

namespace App\Http\Controllers;

use App\Models\area;
use App\Models\campaign;
use Illuminate\Http\Request;
use App\Models\send_campaign;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Exports\send_campaignViewExport;

class send_campaignController extends Controller
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
        $data=send_campaign::select('*')
        ->where('Date_End','like','%'.$search['value'].'%')
        ->skip($start)
        ->take($length)->get();
        $arr=array();
        foreach($data as $d){ 
             $type1=area::find($d->area_id)->name;
             $type2=campaign::find($d->campaign_id)->Name;
            $arr[]=array(
               'area'=>$type1,
               'campaign'=>$type2,
            'Date_first'=>$d->Date_first,
            'Date_End'=>$d->Date_End,
            'Timer'=>$d->Timer,
          
          
           
            'action'=>"<a href='send_campaign/".$d->id."/edit' class='btn btn-success'><i class='fas fa-edit'></i> Edit</a>
           
            <a href='send_campaign/".$d->id."/deleted'  class='btn btn-danger'><i class='fas fa-trash'></i> Delete </a>
       
             
            "

        ); } 
        $total_members=send_campaign::count();
       
       $count=DB::select("select * from send_campaigns where Date_End like '%".$search['value']."%'");
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
        return view('send_campaign.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $send_campaign1=area::all();
        $send_campaign2=campaign::all();
       

		return view("send_campaign.create",["areaIds"=>$send_campaign1,"campaignIds"=>$send_campaign2 ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
			'Date_first'=>'required',
            'Date_End'=>'required',
		'Timer'=>'required',
		
	
		]);
		$send_campaign=new send_campaign();
        $send_campaign->area_id=$request->area_id;
        $send_campaign->campaign_id=$request->campaign_id;
        $send_campaign->Date_first=$request->Date_first;
        $send_campaign->Date_End=$request->Date_End;
        $send_campaign->Timer=$request->Timer;
         $send_campaign->save();		

		return redirect()->route("send_campaign.index");
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\send_campaign  $send_campaign
     * @return \Illuminate\Http\Response
     */
    public function show(send_campaign $send_campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\send_campaign  $send_campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(send_campaign $send_campaign)
    {
        $type1=area::all();
        $type2=campaign::all();
  
		return view("send_campaign.edit",["areaIds"=>$type1,"send_campaign"=>$send_campaign,"campaignIds"=>$type2]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\send_campaign  $send_campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, send_campaign $send_campaign)
    {
        $send_campaign->Date_first=$request->Date_first;
        $send_campaign->Date_End=$request->Date_End;
        $send_campaign->Timer=$request->Timer;
  

    
     $send_campaign->save();	
         return redirect()->route("send_campaign.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\send_campaign  $send_campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(send_campaign $send_campaign)
    {
        DD("IA M HERE");
        //
    }
	   public function deleted($id)
    {
		$send_campaign=send_campaign::find($id);
		$send_campaign->delete();
		return redirect()->route("send_campaign.index");
    }
    public function exportsend_campaign(){
        return Excel::download( new send_campaignViewExport, 'send_campaign.xlsx');
    }
}
