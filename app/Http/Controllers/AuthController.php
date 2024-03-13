<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateRequest;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(AuthenticateRequest $request): RedirectResponse
    {

        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'authenticate' => 'Предоставленные учетные данные неверны.',
        ]);
    }

    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
