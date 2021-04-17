<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request){
        return $this->checkUserForLogin($request->email, $request->password);
    }

    public function register(Request $request){
        error_log($request->name);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return $this->checkUserForLogin($request->email, $request->password);

    }

    public function logout(Request $request){
        auth()->logout();
        DB::table('oauth_access_tokens')->where('id', $request->token)->delete();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }


    private function checkUserForLogin($email, $password){
        if (auth()->attempt(['email' => $email, 'password' => $password])){
            $user = auth()->user();
            $token = $user->createToken('access_token')->accessToken;
            $credential['token']= $token;
            $credential['user']= $user;

            $user->update([
                'access_token' => $token
            ]);
            return response()->json(['success'=> $credential], 200);
        }

        return response()->json('failure', 401);
    }

}
