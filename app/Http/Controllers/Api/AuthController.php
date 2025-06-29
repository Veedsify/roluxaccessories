<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                return response()->json([
                    'success' => true,
                    'message' => 'Login successful',
                    'data' => [
                        'user' => [
                            'id' => $user->id,
                            'name' => $user->name,
                            'email' => $user->email,
                        ]
                    ]
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials'
            ], 401);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Login failed. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
