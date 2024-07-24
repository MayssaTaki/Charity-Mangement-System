<?php

namespace App\Http\Controllers;

use App\Models\Cach_payment;
use App\Models\campaign;
use Illuminate\Http\Request;
use DB;
use App\Http\Exports\Cach_paymentViewExport;
use Maatwebsite\Excel\Facades\Excel;

class Cach_paymentController extends Controller
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
        $data=Cach_payment::select('*')
        ->where('Name','like','%'.$search['value'].'%')
        ->skip($start)
        ->take($length)->get();
        $arr=array();
        foreach($data as $d){
            $type=campaign::find($d->campaign_id)->Name;
            $arr[]=array(
            'Name'=>$d->Name,
            'address'=>$d->address,
            'phone'=>$d->phone,
            'campaign'=>$type,
            'Amount'=>$d->Amount,
           
            
    
            
            
       
            );
        }
        $total_members=Cach_payment::count();
       
       $count=DB::select("select * from Cach_payments where Name like '%".$search['value']."%'");
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
        return view('Cach_payment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Cach_payment=campaign::all();
        return view("Cach_payment.create",["campaignIds"=>$Cach_payment]);
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
		
            'Amount'=>'required',
            'Name'=>'required',
           
            ]);
            
            
            
            
            $Cach_payment=new Cach_payment();
            $Cach_payment->Name=$request->Name;
            $Cach_payment->address=$request->address;
            $Cach_payment->phone=$request->phone;
            $Cach_payment->campaign_id=$request->campaign_id;
            $Cach_payment->Amount=$request->Amount;
           
          
            
             $Cach_payment->save();	
             
             
             
    
            return redirect()->route("Cach_payment.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cach_payment  $cach_payment
     * @return \Illuminate\Http\Response
     */
    public function show(Cach_payment $cach_payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cach_payment  $cach_payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Cach_payment $cach_payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cach_payment  $cach_payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cach_payment $cach_payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cach_payment  $cach_payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cach_payment $cach_payment)
    {
        //
    } 
    public function exportCach_payment(){
        return Excel::download( new Cach_paymentViewExport, 'Cach_payment.xlsx');
    }
}
