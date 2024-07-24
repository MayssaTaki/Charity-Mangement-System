<?php

namespace App\Http\Controllers;

use File;
use Image;
use Storage;
use App\Models\human_case;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class human_caseController extends Controller
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
        $data=human_case::select('*')
        ->where('Name','like','%'.$search['value'].'%')
        ->skip($start)
        ->take($length)->get();
        $arr=array();
        foreach($data as $d){
             
            $arr[]=array(
            'Name'=>$d->Name,
            'work'=>$d->work,
            'phone'=>$d->phone,
            'address'=>$d->address,
            'situation'=>$d->situation,
            'Explanation_of_the_situation'=>$d->Explanation_of_the_situation,
            'The_amount_required'=>$d->The_amount_required,
            'action'=>"
            <a href='human_case/".$d->id."/deleted'  class='btn btn-danger'><i class='fas fa-trash'></i> Delete </a>
       
            <a href='human_case/".$d->id."' class='btn btn-info'><i class='fas fa-info'></i> View </a>
            
            "
           
          
            
       
           
       
            );
        }
        $total_members=human_case::count();
       
       $count=DB::select("select * from human_cases where Name like '%".$search['value']."%'");
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
        return view('human_case.index');
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
     * @param  \App\Models\human_case  $human_case
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return view("human_case.show",["human_case"=>$human_case]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\human_case  $human_case
     * @return \Illuminate\Http\Response
     */
    public function edit(human_case $human_case)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\human_case  $human_case
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, human_case $human_case)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\human_case  $human_case
     * @return \Illuminate\Http\Response
     */
    public function destroy(human_case $human_case)
    {
        DD("IA M HERE");
        //
    }
       public function deleted($id)
    {
        $human_case=human_case::find($id);
        $human_case->delete();
        return redirect()->route("human_case.index");
        
        //
    }

    }
