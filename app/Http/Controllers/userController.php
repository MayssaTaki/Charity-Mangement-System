<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\role;
use Illuminate\Http\Request;
use DB;
use Image;
use Storage;
use File;
use Hash;
class userController extends Controller
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
		 $data=user::select('*')
		 ->where('username','like','%'.$search['value'].'%')
		 ->skip($start)
		 ->take($length)->get();
		 $arr=array();
		 foreach($data as $d){
			//   $type=role::find($d->role_id)->name;
			 $arr[]=array(
                'username'=>$d->username,
			 'email'=>$d->email,
			 'password'=>$d->password,
			 'phone'=>$d->phone,
			 'action'=>"<a href='user/".$d->id."/edit' class='btn btn-success'><i class='fas fa-edit'></i> Edit</a>
			
			 <a href='user/".$d->id."/deleted'  class='btn btn-danger'><i class='fas fa-trash'></i> Delete </a>
		
			  
			 "
		
			 );
		 }
		 $total_members=user::count();
		
		$count=DB::select("select * from users where email like '%".$search['value']."%'");
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
		
	
		return view('user.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$user=role::all();
		return view("user.create",["roleIds"=>$user]);
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
		$this->validate($request,[
			'username'=>'required|unique:users',
		'email'=>'required',
		'password'=>'required',
	
		]);
		
		
		
		
		$user=new user();
        $user->username=$request->username;
		$user->email=$request->email;
		$user->password=Hash::make($request->password);
		$user->role_id=$request->role_id;
         $user->save();		

		return redirect()->route("user.index");
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
		return view("user.show",["user"=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
			// $type=role::all();
    return view("user.edit",["user"=>$user]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    { $user->username=$request->username;
			$user->email=$request->email;
		$user->password=$request->password;
	
		
         $user->save();	
		 	return redirect()->route("user.index");
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
		DD("IA M HERE");
        //
    }
	   public function deleted($id)
    {
		$user=user::find($id);
		$user->delete();
		return redirect()->route("user.index");
		
        //
    }
}
