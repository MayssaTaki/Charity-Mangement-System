<?php

namespace App\Http\Controllers;

use App\Models\volunteer_role;
use Illuminate\Http\Request;
use DB;

class volunteer_roleController extends Controller
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
        $data=volunteer_role::select('*')
        ->where('type','like','%'.$search['value'].'%')
        ->skip($start)
        ->take($length)->get();
        $arr=array();
        foreach($data as $d){
             
            $arr[]=array(
            'type'=>$d->type,
       
            'action'=>"<a href='volunteer_role/".$d->id."/edit' class='btn btn-success'><i class='fas fa-edit'></i> Edit</a>
           
            <a href='volunteer_role/".$d->id."/deleted'  class='btn btn-danger'><i class='fas fa-trash'></i> Delete </a>
       
             
            "
       
            );
        }
        $total_members=volunteer_role::count();
       
       $count=DB::select("select * from volunteer_roles where type like '%".$search['value']."%'");
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
        return view('volunteer_role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("volunteer_role.create");
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
		
            'type'=>'required',
        
            ]);
            
            
                    
            $volunteer_role=new volunteer_role();
            $volunteer_role->type=$request->type;
    
            
             $volunteer_role->save();		
    
            return redirect()->route("volunteer_role.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\volunteer_role  $volunteer_role
     * @return \Illuminate\Http\Response
     */
    public function show(volunteer_role $volunteer_role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\volunteer_role  $volunteer_role
     * @return \Illuminate\Http\Response
     */
    public function edit(volunteer_role $volunteer_role)
    {
        return view("volunteer_role.edit",["volunteer_role"=>$volunteer_role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\volunteer_role  $volunteer_role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, volunteer_role $volunteer_role)
    {
        $volunteer_role->type=$request->type;

		
         $volunteer_role->save();	
		 	return redirect()->route("volunteer_role.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\volunteer_role  $volunteer_role
     * @return \Illuminate\Http\Response
     */
    public function destroy(volunteer_role $volunteer_role)
    {
        DD("IA M HERE");
        //
    }
	   public function deleted($id)
    {
		$volunteer_role=volunteer_role::find($id);
		$volunteer_role->delete();
		return redirect()->route("volunteer_role.index");
    }
}
