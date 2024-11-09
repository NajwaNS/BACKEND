<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){
        $input = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
        ];

    $user = User::create($input);
    $data = [
        'massage' => 'User is created successfully'
    ];
    return response()->json($data,200);
    }

    public function login(Request $request){
        $input = [
            'email' =>$request->email
            'password' => $request->password
        ];

        $user = User::where('email',$input['email'])->first();

        $isLoginSuccessfully = (
            $input['email'] == $user->email
            &&
            Hash::check($input['password'], $user->password)
        );

        if($isLoginSuccessfully){
            $token = $user->createToken('auth_token');

            $data = [
                'messege' => 'Login successfully'
                'token'=> $token->plainTextToken
            ];
            return response()->json($data,200);
         } else{
            $data = [
                'message'=> 'Username or Password is wrong'
                ];
                return response()->json($data,401);
         }
     }

     public function login(Request $request){
        $input = [
            'email' =>$request->email
            'password' => $request->password
        ];

        if($isLoginSuccessfully){
            $token = $user->createToken('auth_token');

            $data = [
                'messege' => 'Login successfully'
                'token'=> $token->plainTextToken
            ];
            
            return response()->json($data,200);
         } else{
            $data = [
                'message'=> 'Username or Password is wrong'
                ];
                return response()->json($data,401);
         }
     }



}