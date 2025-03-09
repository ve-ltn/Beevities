<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Organization;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:12',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect based on role
            if (Auth::user()->role == 1) {
                return redirect()->route('admin.dashboard');  // Redirect Admin
            } elseif (Auth::user()->role == 2) {
                return redirect()->route('organization_admin.dashboard');  // Redirect Organization Admin
            } else {
                return redirect()->route('user.dashboard');  // Redirect Normal User
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah!',
        ]);
    }

    public function registerForm()
    {
        $organizations = Organization::all(); // Fetch organizations for org admin registration
        return view('auth.register', compact('organizations'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:40',
            'email' => 'required|email|regex:/@gmail\.com$/|unique:users,email',
            'password' => 'required|confirmed|min:6|max:12',
            'number' => 'required|regex:/^08\d{8,13}$/',
            'role' => 'required|integer|in:0,2', // Ensure only user (0) or organization admin (2) can register
            'organization_id' => 'nullable|exists:organizations,id', // Only required for role = 2
        ], [
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.regex' => 'Email harus menggunakan domain @gmail.com.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password harus diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.max' => 'Password maksimal 12 karakter.',
            'number.required' => 'Nomor HP harus diisi.',
            'number.regex' => 'Nomor HP harus diawali dengan 08.',
            'role.required' => 'Peran harus ditentukan.',
            'organization_id.exists' => 'Organisasi tidak valid.',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'number' => $request->number,
            'role' => $request->role,
            'organization_id' => $request->role == 2 ? $request->organization_id : null, // Assign only if role = 2
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
