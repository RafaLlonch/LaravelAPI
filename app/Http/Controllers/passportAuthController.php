<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Passport\HasApiTokens;
use Validator;

class passportAuthController extends Controller
{
    use HasApiTokens;
    /**
     * handle user registration request
     */
    public function createUser(Request $request){

        $this->validate($request,[
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8',
        ]);

        $user = new User();

        if ($request->nickname == null){ $user->nickname = 'Anónimo';}
        else {$user->nickname = $request->nickname;}
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();        

        return response()->json([$user, 'usuario creado', 200]);
    }

    /**
     * login user to our application
     */
    public function loginUser(Request $request){

        $login_credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(auth()->attempt($login_credentials)){
            //generate the token for the user
            $user_login_token= auth()->user()->createToken('token')->accessToken;
            //now return this token on success login attempt
            return response()->json(['token' => $user_login_token], 200);
        }
        else{
            //wrong login credentials, return, user not authorised to our system, return error code 401
            return response()->json(['error' => 'UnAuthorised Access'], 401);
        }
    }

    /**
     * This method returns authenticated user details
     */
    public function authenticatedUserDetails(){

        //returns details
        return response()->json(['authenticated-user' => auth()->user()], 200);
    }
}
