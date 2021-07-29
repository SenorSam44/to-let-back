<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            $token = $user->createToken('access_token');
            $credential['token'] = $token->accessToken;
            $credential['user'] = $user;
            $user->update([
                'access_token' => $token->accessToken
            ]);
            return array($credential, 200);
        } else {
            $message = 'Password does not match';
        }

        return response()->json($message, 401);
    }

}
