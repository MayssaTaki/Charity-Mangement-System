<?php

namespace App\Http\Controllers\API;

use File;
use Storage;

use App\Models\campaign;
use Illuminate\Http\Request;
use App\Models\Donor;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;


class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $validator=Validator::make($request->all(),[
            'donation_value' => 'required|integer|min:1',
            'ID_number' => 'required|string|min:11',
            'image' => 'required|image',
            'company_Bank' => 'required|string|min:1',
            'email'=>'required',
            'phone'=>'required',
    
        ]);
        if($validator->fails()){
            return response(['error'=>$validator->errors(),'Validation Error'],400);
        }
          try{
        if( $request->hasFile('image')) 
           {    
        
            $img = $request->file('image');     		
           
            $location =request('image')->store('Donor','public');
           
            $imageArray=['image' => $location];
           
    
          
            $Donor=new Donor();
            $Donor->Name=$request->Name;
            $Donor->human_case_id=$request->human_case_id;
            $Donor->email=$request->email;
            $Donor->ID_number=$request->ID_number;
            $Donor->company_Bank=$request->company_Bank;
            $Donor->donation_value=$request->donation_value;
            $Donor->phone=$request->phone;
            $Donor->image=$imageArray['image'];
}

        $Donor->save();
}

        catch(\Exception $e){
            return response("internal server error",500);
         }

       
        return $Donor;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donor  $Donor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donor $Donor)
    {
        //
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
