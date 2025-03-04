<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Handle the login logic
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check for admin credentials
        $admin = User::where('email', $request->email)->where('role', 'admin')->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Store admin details in session
            session(['admin_logged_in' => true, 'admin_id' => $admin->id]);

            return redirect()->route('home');
        }

        return back()->with('error', 'Invalid email or password');
    }

    // Show the admin dashboard
    public function dashboard()
    {   
        
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login.form')->with('error', 'You must be logged in to access the dashboard');
        }

        return view('home');
    }

    // Handle admin logout
    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_id']);
        return redirect()->route('admin.login.form')->with('success', 'You have been logged out');
    }
}

