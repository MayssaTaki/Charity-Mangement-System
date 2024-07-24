<?php

namespace App\Http\Controllers;

use File;
use Storage;

use App\Models\campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;
use App\Http\Exports\campaignViewExport;

class campaignController extends Controller
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
        $data=campaign::select('*')
        ->where('Name','like','%'.$search['value'].'%')
        ->skip($start)
        ->take($length)->get();
        $arr=array();
        foreach($data as $d){
            $arr[]=array(
            'Name'=>$d->Name,
            'Description'=>$d->Description,
            'Donation_amount'=>$d->Donation_amount,
            'action'=>"<a href='campaign/".$d->id."/edit' class='btn btn-success'><i class='fas fa-edit'></i> Edit</a>
           
            <a href='campaign/".$d->id."/deleted'  class='btn btn-danger'><i class='fas fa-trash'></i> Delete </a>
       
            <a href='campaign/".$d->id."' class='btn btn-info'><i class='fas fa-info'></i> View </a>
            
            "
       
            );
        }
        $total_members=campaign::count();
       
       $count=DB::select("select * from campaigns where Name like '%".$search['value']."%'");
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
        return view('campaign.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("campaign.create");
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
		
            'Description'=>'required',
            'Name'=>'required',
           
            ]);
            
            
            
            
            $campaign=new campaign();
            $campaign->Name=$request->Name;
            $campaign->Description=$request->Description;
            $campaign->Donation_amount=$request->Donation_amount;
        
            if( $request->hasFile('image'))    {    
                $img = $request->file('image');     		
                $filename =  'campaign/'.$img->getClientOriginalName(); 
                $campaign->img=$filename;		
                $location = storage_path('app/public/') . $filename;
                Image::make($img)->save($location);  
                }
            
             $campaign->save();		
    
            return redirect()->route("campaign.index");
            //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(campaign $campaign)
    {
        return view("campaign.show",["campaign"=>$campaign]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(campaign $campaign)
    {
        return view("campaign.edit",["campaign"=>$campaign]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, campaign $campaign)
    { 
        $campaign->Name=$request->Name;
        $campaign->Description=$request->Description;
		$campaign->Donation_amount=$request->Donation_amount;
	   if( $request->hasFile('image'))    {    
		$img = $request->file('image');     		
		$filename =  'campaign/'.$img->getClientOriginalName(); 
		$campaign->img=$filename;		
		$location = storage_path('app/public/') . $filename;
        Image::make($img)->save($location);  
		}
		
         $campaign->save();	
		 	return redirect()->route("campaign.index");
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(campaign $campaign)
    {
        DD("IA M HERE");
        //
    }
	   public function deleted($id)
    {
		$campaign=campaign::find($id);
		$campaign->delete();
		return redirect()->route("campaign.index");
		
        //
    }
    public function exportcampaign(){
        return Excel::download( new campaignViewExport, 'campaign.xlsx');
    }
}
