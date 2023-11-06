<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class adminController extends Controller
{
    public function showRegistrationForm()
    {
        $existingAdmin = Admin::count();

        if ($existingAdmin > 0) {
            return redirect()->route('admin.loginForm');
        }

        return view('admin.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string|max:20',
            'password' => 'required|string|min:6|confirmed',
        ],$message=[
            'username.required' => 'Kolom username harus diisi.',
            'username.string' => 'Kolom username harus berupa teks.',
            'username.max' => 'Kolom username tidak boleh lebih dari 20 karakter.',
            'password.required' => 'Kolom password harus diisi.',
            'password.string' => 'Kolom password harus berupa teks.',
            'password.min' => 'Password minimal harus 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai dengan password yang Anda masukkan.',
        ]);

        $admin = new Admin([
            'username' => $request->input('username'),
           
            'password' => bcrypt($request->input('password')),
        ]);

        $admin->save();

        Auth::guard('admin')->login($admin);

        return redirect()->route('dashboard');
    }

    public function showLoginForm()
{
    if (Auth::guard('admin')->check()) {
        return redirect()->route('dashboard'); // Ganti dengan rute yang sesuai
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
