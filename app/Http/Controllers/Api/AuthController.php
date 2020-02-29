<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class AuthController extends Controller {
    public $successStatus = 200;

    public function register(Request $request) {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'c_password' => 'required|same:password',
            ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $response = [
            'status' => 'success',
            'data' => [
                'user' => $user,
                'token' => $user->createToken('DnDTomeSite')->accessToken
            ]
        ];
        return response()->json($response, $this->successStatus);
    }


    public function login(Request $request) {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $user = Auth::user();
            $response = [
                'token' => $user->createToken('DnDTomeSite')->accessToken,
                'user' => $user,
                'status' => 'success'
            ];
            return response()->json($response, $this->successStatus);
        }
        else {
            return response()->json([
                'status' => 'error',
                'data' => 'Unauthorized Access'
            ]);
        }
    }

    public function getUser() {
        $user = Auth::user();
        $response = [
            'status' => 'success',
            'user' => $user
        ];
        return response()->json($response, $this->successStatus);
    }
}
