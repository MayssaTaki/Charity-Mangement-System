<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\area;
use App\Models\campaign;
use App\Models\poor_family;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Exports\poor_familyViewExport;

class poor_familyController extends Controller
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
        $data=poor_family::select('*')
        ->where('name','like','%'.$search['value'].'%')
        ->skip($start)
        ->take($length)->get();
        $arr=array();
        foreach($data as $d){ 
             $type1=area::find($d->area_id)->name;
             $type2=campaign::find($d->campaign_id)->Name;
            $arr[]=array(
               'name'=>$d->name,
               'work'=>$d->work,
               'number_of_family_member'=>$d->number_of_family_member,
               'address'=>$type1,
            'phone'=>$d->phone,
            'campaign'=>$type2,
          
           
            'action'=>"<a href='poor_family/".$d->id."/edit' class='btn btn-success'><i class='fas fa-edit'></i> Edit</a>
           
            <a href='poor_family/".$d->id."/deleted'  class='btn btn-danger'><i class='fas fa-trash'></i> Delete </a>
       
             
            "

        ); } 
        $total_members=poor_family::count();
       
       $count=DB::select("select * from poor_families where name like '%".$search['value']."%'");
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
        return view('poor_family.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poor_family1=area::all();
        $poor_family2=campaign::all();

		return view("poor_family.create",["areaIds"=>$poor_family1 ,"campaignIds"=>$poor_family2]);
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
		'phone'=>'required',
		
	
		]);
		$poor_family=new poor_family();
        $poor_family->name=$request->name;
        $poor_family->work=$request->work;
        $poor_family->number_of_family_member=$request->number_of_family_member;
        $poor_family->area_id=$request->area_id;
        $poor_family->phone=$request->phone;
        $poor_family->campaign_id=$request->campaign_id;
         $poor_family->save();		

		return redirect()->route("poor_family.index");
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\poor_family  $poor_family
     * @return \Illuminate\Http\Response
     */
    public function show(poor_family $poor_family)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\poor_family  $poor_family
     * @return \Illuminate\Http\Response
     */
    public function edit(poor_family $poor_family)
    {
        $type1=area::all();
        $type2=campaign::all();
  
		return view("poor_family.edit",["areaIds"=>$type1,"poor_family"=>$poor_family ,"campaignIds"=>$type2]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\poor_family  $poor_family
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, poor_family $poor_family)
    {
        $poor_family->name=$request->name;
        $poor_family->phone=$request->phone;
  

    
     $poor_family->save();	
         return redirect()->route("poor_family.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\poor_family  $poor_family
     * @return \Illuminate\Http\Response
     */
    public function destroy(poor_family $poor_family)
    {
        DD("IA M HERE");
        //
    }
	   public function deleted($id)
    {
		$poor_family=poor_family::find($id);
		$poor_family->delete();
		return redirect()->route("poor_family.index");
    }
    public function exportpoor_family(){
        return Excel::download( new poor_familyViewExport, 'poor_family.xlsx');
    }
 

    
}
