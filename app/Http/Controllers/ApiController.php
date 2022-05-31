<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function login(Request $request){
         # code...
         $user=User::Where('email',$request->email)->first();
        if(!$user){
            return response()->json(['massage'=>"عذرا  البريد الإلكتروني خطا"],401);
        }

        if(Hash::check($request->password,$user->password)){
            $token=$user->createToken('Laravel Password Grant Client')->accessToken;
            $response=['token'=>$token];
            return response($response,200);
        }else{
            $response=["Message"=>'عذرا كلمة المرور خطا'];
            return response($request,422);
        }
     }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'password'=>'required',
            'PhoneNumber'=>'numeric',
            'con_password'=>'required|same:password'
        ],[],[
            'email' => 'البريد الإلكتروني',
            'con_password'=>'تأكيد كلمة المرور',
        ]);

        if($validator->fails()){

            $message="Please Sure on Data Entered";
            $data=$validator->errors();

            return response()->json(compact('message','data'),422);
        }

        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->PhoneNumber=$request->PhoneNumber;
        $user->Image=$request->Image;
        $user->save();
        return response()->json(['Message'=>'تمت العملية بنجاح']);

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
