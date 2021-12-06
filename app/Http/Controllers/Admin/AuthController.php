<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required| string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return $this->RespondWithEorror('validation registration error ', $validator->errors(), 422);
        }
        try {
            $user = User::create(array_merge(
                $request->except('password'),
                [
                    'password' => bcrypt($request->password),
                ]
            ));
            return $this->RespondWithSuccess('registration  successful', $user, 200);
        } catch (Exception $e) {
            return $this->RespondWithEorror('registration not successful  ', $e->getMessage(), 400);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->RespondWithEorror('validation registration error ', $validator->errors(), 422);
        }
        $credentails = $request->only('email', 'password');
        if (Auth::attempt(
            $credentails
        )) {
            $user = Auth::user();
            $data['name'] = $user->name;
            $data['access_token'] = $user->createToken('accessToken')->accessToken;
            return $this->RespondWithSuccess('login  successful', $data, 200);
        } else {
            return $this->RespondWithSuccess('login  successful', 401);
        }
    }
    public function logout(Request $request){

        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }


}
