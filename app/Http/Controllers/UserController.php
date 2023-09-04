<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            $user = $this->userModel->select('email', 'password')->where('email', '=', $request->input('email'))
            ->first();

            if (Hash::check($request->input('password'), $user->password) && !empty($user)) {
                return response()->json('Sukses login', 200);
            }else{
                return response()->json('gagal login', 200);
            }
        } catch (\Throwable $th) {
            return response()->json('Gagal login', 200);
        }
    }
}
