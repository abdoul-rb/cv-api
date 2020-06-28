<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;

class LoginController extends Controller
{
    public function __invoke(LoginFormRequest $request)
    {
        if (!$token = auth()->attempt($request->only('email', 'password'))) {
            return response()->json([
                'errors' => [
                    'message' => [
                        'Email ou mot de passe incorrect.'
                    ]
                ]
            ], 422);
        }

        return response()->json([
            'data' => compact('token')
        ]);
    }
}
