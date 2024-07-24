<?php

namespace App\Http\Controllers;

use App\Models\volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class volunteerController extends Controller
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
        $data=volunteer::select('*')
        ->where('Name','like','%'.$search['value'].'%')
        ->skip($start)
        ->take($length)->get();
        $arr=array();
        foreach($data as $d){
             
            $arr[]=array(
            'Name'=>$d->Name,
            'study'=>$d->study,
            'Previous_experience'=>$d->Previous_experience,
            'purpose'=>$d->purpose,
            'phone'=>$d->phone,
            'address'=>$d->address,
          
            
       
           
       
            );
        }
        $total_members=volunteer::count();
       
       $count=DB::select("select * from volunteers where Name like '%".$search['value']."%'");
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
        return view('volunteer.index');
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
     * @param  \App\Models\volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function show(volunteer $volunteer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function edit(volunteer $volunteer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, volunteer $volunteer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function destroy(volunteer $volunteer)
    {
        //
    }
}
