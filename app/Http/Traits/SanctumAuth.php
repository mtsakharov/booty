<?php


namespace App\Http\Traits;


use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

trait SanctumAuth
{
    /**
     * @param  RegisterRequest  $request
     * @return mixed
     */
    public function register(RegisterRequest $request): array
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $token = $user->createToken('Bearer')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }

    /**
     * @param  LoginRequest  $request
     * @return array|string
     */
    public function login(LoginRequest $request)
    {
        if (!auth()->attempt($request->only('email', 'password'),  $request->get('remember_me'))) {
            return "User not exists";
        }

        $token = auth()->user()->createToken('Bearer')->plainTextToken;

        return [
            'user' => $request->user(),
            'token' => $token
        ];
    }

    /**
     * @return mixed
     */
    public function user()
    {
        return request()->user();
    }

    /**
     * @return mixed
     */
    public function logout()
    {
        return auth()->user()->tokens()->delete();
    }

    public function verify()
    {

    }

    public function resend()
    {

    }

    public function forgotPassword()
    {

    }

    public function resetPassword()
    {

    }
}
