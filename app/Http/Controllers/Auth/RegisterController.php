<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = User::create([$request->only('name', 'email', 'password')]);

        return new UserResource($user);
    }
}
