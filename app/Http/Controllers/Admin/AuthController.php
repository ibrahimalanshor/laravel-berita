<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{   
    /**
     * login
     *
     * @return void
     */
    public function login()
    {
        return view('admin.login', [
            'title' => 'Login - ' . setting('name')
        ]);    
    }
    
    /**
     * submitLogin
     *
     * @param  mixed $request
     * @return void
     */
    public function submitLogin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', Password::min(8)]
        ]);

        $user = User::where('email', $request->input('email'))
            ->where('role', 'admin')
            ->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return back()
                ->withInput()
                ->with('error', 'Kombinasi email dan password tidak ditemukan.');
        }

        Auth::guard('admin')->login($user);
        
        return redirect()->route('admin.dashboard');
    }
}
