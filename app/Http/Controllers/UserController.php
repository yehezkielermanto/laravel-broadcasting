<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $userModel;
    public function __construct()
    {
        $this->userModel = new User();
    }

    public function login(Request $request)
    {
        try {
            $user = $this->userModel->where('email', '=', $request->input('email'))->first();

            if (Auth::attempt($request->only('email', 'password'))) {
                $user = Auth::user();
                $token = $user->createToken('authToken');
                $accessToken = $token->plainTextToken;
                $user_data = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'access_token' => $accessToken
                ];
                return response()->json($user_data, 200);
            } else {
                return response()->json('gagal login', 200);
            }
        } catch (\Throwable $th) {
            return response()->json('Gagal login', 200);
        }
    }
}
