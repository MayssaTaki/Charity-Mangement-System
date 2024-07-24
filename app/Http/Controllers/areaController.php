<?php

namespace App\Http\Controllers;

use App\Models\area;
use Illuminate\Http\Request;
use DB;

class areaController extends Controller
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
        $data=area::select('*')
        ->where('name','like','%'.$search['value'].'%')
        ->skip($start)
        ->take($length)->get();
        $arr=array();
        foreach($data as $d){
             
            $arr[]=array(
            'name'=>$d->name,
       
            'action'=>"<a href='area/".$d->id."/edit' class='btn btn-success'><i class='fas fa-edit'></i> Edit</a>
           
            <a href='area/".$d->id."/deleted'  class='btn btn-danger'><i class='fas fa-trash'></i> Delete </a>
       
             
            "
       
            );
        }
        $total_members=area::count();
       
       $count=DB::select("select * from areas where name like '%".$search['value']."%'");
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
        return view('area.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("area.create");
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
		
            'name'=>'required',
        
            ]);
            
            
                    
            $area=new area();
            $area->name=$request->name;
    
            
             $area->save();		
    
            return redirect()->route("area.index");
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(area $area)
    {
        return view("area.edit",["area"=>$area]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, area $area)
    {
        $area->name=$request->name;

		
         $area->save();	
		 	return redirect()->route("area.index");
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(area $area)
    {
        DD("IA M HERE");
        //
    }
	   public function deleted($id)
    {
		$area=area::find($id);
		$area->delete();
		return redirect()->route("area.index");
    }
}
