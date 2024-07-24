<?php

namespace App\Http\Controllers;


use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rules\Password;
class LoginUserController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = validator::make(
            $request->all(),
            [
                'username' => 'required|string|min:3',
                'email'=> 'required',
                'password'=> 'required|confirmed' ,
                'phone' => 'required' ,
            ]
        );
        

        if($data->fails()){
            return Response()->json(['errors'=>$data->errors()],400) ;}

        try{
            $user = User::create([
                'username' => $request['username'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'phone' => $request['phone'] ,
            ]);
        }
        catch (Exception $exception) {
            return $exception;
          //  return Response()->json(['error' => 'email or phone is invalid'],400);
        }

        $token = $user->createToken('authToken')->plainTextToken;
        $user->save();
        return Response()->json([
            'user'=>$user,
            'token' => $token,
        ]);
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return Response()->json([
                'error' => 'Invalid login details'
            ],401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('authToken')->plainTextToken;

        return Response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }





    public function logout(){
        $user=auth()->user();
      
       $user->tokens()->delete();
       
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
