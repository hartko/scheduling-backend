<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\AuthService;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    // AuthService instance for handling authentication logic
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Handle user login.
     *
     * @param  LoginRequest  $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request)
    {
        try {
            // Attempt to perform user login using the AuthService
            $loginData = $this->authService->login($request);

            // Check if login was successful
            if ($loginData) {
                // Return JSON response for successful login
                return response()->json([
                    'result' => 'successful',
                    'data' => $loginData
                ], 200);
            } else {
                // Return JSON response for unsuccessful login (Unauthorized)
                return response()->json([
                    'result' => 'failed',
                    'error' => 'Unauthorized'
                ], 401);
            }
        } catch (\Exception $e) {
            // Handle any exceptions that occur during login
            return response()->json([
                'result' => 'failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Handle user registration.
     *
     * @param  RegistrationRequest  $request
     * @return JsonResponse
     */
    public function register(RegistrationRequest $request)
    {
        try {
            // Validate the incoming registration request
            // Register the user using the AuthService
            $user = $this->authService->register($request);

            // Check if user registration was successful
            if ($user) {
                // Return JSON response for successful registration
                return response()->json([
                    'result' => 'successful',
                    'data' => $user,
                    'message' => 'Registration successful'
                ], 200);
            } else {
                // Return JSON response for unsuccessful registration
                return response()->json([
                    'result' => 'failed',
                    'error' => 'Registration failed'
                ], 400);
            }
        } catch (\Exception $e) {
            // Handle any exceptions that occur during registration
            return response()->json([
                'result' => 'failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
