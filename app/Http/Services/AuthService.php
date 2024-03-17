<?php
namespace App\Http\Services;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * Attempt to log in the user.
     *
     * @param  LoginRequest  $request
     * @return bool
     */
    public function login(LoginRequest $request)
    {
        // Extract email and password from the validated request
        $credentials = $request->only(["email", "password"]);
        // Attempt to log in using Laravel's Auth
        return Auth::attempt($credentials);
    }

    /**
     * Register a new user
     * 
     */
    public function register(RegistrationRequest $request)
    {

        return User::create(
        [
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  Hash::make($request->password)
        ]);
    }

    /**
     * Log the user out.
     */
    public function logout()
    {
        // Log the user out using Laravel's Auth
        Auth::logout();
    }




}