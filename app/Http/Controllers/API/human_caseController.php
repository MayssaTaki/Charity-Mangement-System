<?php

namespace App\Http\Controllers\API;

use DB;
use File;
use Image;

use Storage;
use App\Models\human_case;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class human_caseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return human_case::all();
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
            'Name'=>'required|max:255',
            'situation'=>'required|max:255',
            'Explanation_of_the_situation'=>'required|max:255',
          
        ]);
        if($validator->fails()){
            return response(['error'=>$validator->errors(),'Validation Error'],400);
        }
              try{
                  
        if( $request->hasFile('image')) 
           {    
        
            $img = $request->file('image');     		
           
            $location =request('image')->store('human_case','public');
           
            $imageArray=['image' => $location];
           
    
          
            $human_case=new human_case();
            $human_case->Name=$request->Name;
            $human_case->work=$request->work;
            $human_case->phone=$request->phone;
            $human_case->address=$request->address;
            $human_case->situation=$request->situation;
            $human_case->Explanation_of_the_situation=$request->Explanation_of_the_situation;
             $human_case->The_amount_required=$request->The_amount_required;
            $human_case->image=$imageArray['image'];}
             $human_case->save();
           }

             catch(\Exception $e){
                return response("internal server error",500);
             }
             return $human_case;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\human_case  $human_case
     * @return \Illuminate\Http\Response
     */
    public function show(human_case $human_case)
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
        //
    }
}
