<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request){
        //validations
        $validator = Validator::make($request->all(),[
            'name'=>'required|min:2|max:12',
            'parent'=>'required|min:2|max:12',
            'email'=> 'required|email|max:191|unique:users,email',
            'password'=>'required|min:8'

        ]);

        if($validator->fails())
        {
            return response()->json([
               'validation_errors'=>$validator->messages(), 
            ]);
        } else {
            $user = User::create([
                'name'=>$request->name,
                'parent'=>$request->parent,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ]);

            $token = $user->createToken( $user->email.'_Token')->plainTextToken;

            return response()->json([
                'status'=>200,
                'username'=>$user->name,
                'token'=> $token,
                'message'=>'Te has registrado correctamente!',
             ]);
        }

    }
}
