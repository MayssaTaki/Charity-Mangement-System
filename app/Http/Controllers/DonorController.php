<?php

namespace App\Http\Controllers;
use App\Models\human_case;
use App\Models\campaign;
use Illuminate\Http\Request;
use App\Models\Donor;
use Illuminate\Support\Facades\DB;


class DonorController extends Controller
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
        $data=Donor::select('*')
        ->where('Name','like','%'.$search['value'].'%')
        ->skip($start)
        ->take($length)->get();
        $arr=array();
        foreach($data as $d){
            $type=human_case::find($d->human_case_id)->Name;
        
            $arr[]=array(
            'Name'=>$d->Name,
            'human_case'=>$type,
            'email'=>$d->email,
            'ID_number'=>$d->ID_number,
            'company_Bank'=>$d->company_Bank,
            'donation_value'=>$d->donation_value,
            'phone'=>$d->phone,
            'action' =>"   <a href='updateStatus/".$d->id."/'  class='btn btn-info'>{$d->status}</a>
            "
            
    
            
            
       
            );
        }
        $total_members=Donor::count();
       
       $count=DB::select("select * from Donors where Name like '%".$search['value']."%'");
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
        return view('Donor.index');
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
     * @param  \App\Models\Donor  $Donor
     * @return \Illuminate\Http\Response
     */
    public function show(Donor $Donor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donor  $Donor
     * @return \Illuminate\Http\Response
     */
    public function edit(Donor $Donor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donor  $Donor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      $donor=Donor::find($id);
      $donor->update([
        'status'=>true,
      ]);
          return redirect()->back();
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donor  $Donor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donor $Donor)
    {
        //
    }
}
