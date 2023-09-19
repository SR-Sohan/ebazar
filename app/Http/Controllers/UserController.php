<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function CreateUser(Request $request){
        try {
            User::create([
                "name" => $request->input("name"),
                "email" => $request->input("email"),
                "password" => $request->input("password")
            ]);

            return response()->json([
                "status" => "success",
                "message" => "User Regstrion Successfuly"
            ],200);
        } catch (Exception $e) {
            return response()->json([
                "status" => "failed",
                "message" => "User Regstrion Failed"
            ]);
        }
    }

    public function LoginUser(Request $request){
        $user = User::where("email","=",$request->input("email"))
        ->where("password","=",$request->input("password"))
        ->with("userprofile")->first();


            if($user !== null){

            $token = JWTToken::CreateJwt($request->input("email"),$user->id,$user->name,$user->role,$user->userprofile?->image);

            return response()->json([
                "status" => "Success",
                "message" => "User Login Successful",
                "token" => $token,60*24*15
            ]);

            }else{
            return response()->json([
                "status" => "Failed",
                "message" => "User Unauthorized"
            ]);
            }
    }
}
