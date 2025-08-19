<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        $validated = $request->validated();

        if(Auth::attempt($validated)){
            $request->session()->regenerate();

            return to_route('home');
        }

        return back()->onlyInput('email');
    }
}
