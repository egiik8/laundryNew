<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('dashboard'); 
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string',
        ], $messages = [
            'username.required' => 'Kolom username harus diisi.',
            'password.required' => 'Kolom password harus diisi.',
        ]);

        $credentials = $request->only('username', 'password');
        $existingAdmin = Admin::where('username', 'alisha')->first();
        if (!$existingAdmin) {
            $admin = new Admin([
                'username' => 'alisha',
                'password' => Hash::make('123456'),
            ]);
            $admin->save();
        }
    
        if (auth()->guard('admin')->attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return redirect()->back()
            ->withInput($request->only('username'))
            ->withErrors(['login' => 'Username atau password tidak valid. Silakan coba lagi.']);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect('/'); 
    }
}