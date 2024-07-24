<?php

namespace App\Http\Controllers\API;

use File;
use Storage;

use App\Models\campaign;
use Illuminate\Http\Request;
use App\Models\donor_campaign;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;


class donor_campaignController extends Controller
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
           
            $location =request('image')->store('donor_campaign','public');
           
            $imageArray=['image' => $location];
           
    
          
            $donor_campaign=new donor_campaign();
            $donor_campaign->Name=$request->Name;
            $donor_campaign->campaign_id=$request->campaign_id;
            $donor_campaign->email=$request->email;
            $donor_campaign->ID_number=$request->ID_number;
            $donor_campaign->company_Bank=$request->company_Bank;
            $donor_campaign->donation_value=$request->donation_value;
            $donor_campaign->phone=$request->phone;
            $donor_campaign->image=$imageArray['image'];
}

        $donor_campaign->save();
}

        catch(\Exception $e){
            return response("internal server error",500);
         }

       
        return $donor_campaign;
}
              
        
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\donor_campaign  $donor_campaign
     * @return \Illuminate\Http\Response
     */
    public function show(donor_campaign $donor_campaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\donor_campaign  $donor_campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, donor_campaign $donor_campaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\donor_campaign  $donor_campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(donor_campaign $donor_campaign)
    {
        //
    }
}
