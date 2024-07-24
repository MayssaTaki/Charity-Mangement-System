<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\volunteer;
use Illuminate\Http\Request;
use Validator;

class volunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
   
       
     
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
            'purpose'=>'required|max:255',
            'Name'=>'required|max:255',
            'Previous_experience'=>'required',
            'phone'=>'required',
       
    
        ]);
        if($validator->fails()){
            return response(['error'=>$validator->errors(),'Validation Error'],400);
        }
              try{
            $volunteer=new volunteer();
            $volunteer->Name=$request->Name;
            $volunteer->study=$request->study;
            $volunteer->Previous_experience=$request->Previous_experience;
            $volunteer->purpose=$request->purpose;
            $volunteer->phone=$request->phone;
            $volunteer->address=$request->address;
             $volunteer->save();}
             catch(\Exception $e){
                return response("internal server error",500);
             }
             return $volunteer;
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
