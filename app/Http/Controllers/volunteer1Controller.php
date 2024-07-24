<?php

namespace App\Http\Controllers;

use App\Models\volunteer1;
use Illuminate\Http\Request;
use App\Models\volunteer_role;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Exports\volunteer1ViewExport;

class volunteer1Controller extends Controller
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
        $data=volunteer1::select('*')
        ->where('name','like','%'.$search['value'].'%')
        ->skip($start)
        ->take($length)->get();
        $arr=array();
        foreach($data as $d){
             $type=volunteer_role::find($d->role_id)->type;
            $arr[]=array(
               'name'=>$d->name,
            'email'=>$d->email,
            'phone'=>$d->phone,
            'address'=>$d->address,
            'study'=>$d->study,
            'previous_experience'=>$d->previous_experience,
            'role'=>$type,
            'action'=>"
           
            <a href='volunteer1/".$d->id."/deleted'  class='btn btn-danger'><i class='fas fa-trash'></i> Delete </a>
       
             
            "
       
            );
        }
        $total_members=volunteer1::count();
       
       $count=DB::select("select * from volunteer1s where name like '%".$search['value']."%'");
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
        return view('volunteer1.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $volunteer1=volunteer_role::all();
		return view("volunteer1.create",["volunteer_roleIds"=>$volunteer1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->all();
        $this->validate($request,[
			'name'=>'required',
		'email'=>'required',
		'phone'=>'required',
	
		]);
		$volunteer1=new volunteer1();
        $volunteer1->name=$request->name;
		$volunteer1->email=$request->email;
        $volunteer1->phone=$request->phone;
        $volunteer1->address=$request->address;
        $volunteer1->study=$request->study;
        $volunteer1->previous_experience=$request->previous_experience;

		$volunteer1->role_id=$request->role_id;
         $volunteer1->save();		

		return redirect()->route("volunteer1.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\volunteer1  $volunteer1
     * @return \Illuminate\Http\Response
     */
    public function show(volunteer1 $volunteer1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\volunteer1  $volunteer1
     * @return \Illuminate\Http\Response
     */
    public function edit(volunteer1 $volunteer1)
    {
        $type=volunteer_role::all();
		return view("volunteer1.edit",["volunteer_roleIds"=>$type,"volunteer1"=>$volunteer1]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\volunteer1  $volunteer1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, volunteer1 $volunteer1)
    {
        $volunteer1->name=$request->name;
			$volunteer1->email=$request->email;
            $volunteer1->phone=$request->phone;
            $volunteer1->address=$request->address;
            $volunteer1->study=$request->study;
            $volunteer1->previous_experience=$request->previous_experience;
		
	
		
         $volunteer1->save();	
		 	return redirect()->route("volunteer1.index");
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\volunteer1  $volunteer1
     * @return \Illuminate\Http\Response
     */
    public function destroy(volunteer1 $volunteer1)
    {
        DD("IA M HERE");
        //
    }
	   public function deleted($id)
    {
		$volunteer1=volunteer1::find($id);
		$volunteer1->delete();
		return redirect()->route("volunteer1.index");
    }
    public function exportvolunteer1(){
        return Excel::download( new volunteer1ViewExport, 'volunteer1.xlsx');
    }


    
    
}
