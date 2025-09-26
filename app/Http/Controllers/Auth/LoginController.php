<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin; 
class LoginController extends Controller
{
    protected function guard()
    {
        return Auth::guard('admin');
    }
    
    public function showLoginForm()
    {
        return view('admin.login');
    }
     public function userRegister()
    {
        return view('admin.registerUser');
    }
     public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email|unique:admins,email',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        // Create user
        admin::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => $request->password, 
        ]);

      
         return redirect()->route('admin.login')->with('success', 'Registration successful. Please login.');

    }

    public function login(Request $request)
   {
       
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);
     $admin = Admin::where('email', $request->email)->first();

    if (!$admin) {
        return back()->withErrors(['email' => 'Email not found. Please sign up.'])->withInput();
    }
            // if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            //     $user = Auth::guard('admin')->user();  
            //     return redirect()->route('admin.dashboard'); 
            // }
            if (Auth::guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password,
                'status' => 1 
            ])) {
                $user = Auth::guard('admin')->user();  
                return redirect()->route('admin.dashboard'); 
            }
        return back()->withErrors(['email' => 'Invalid credentials.','password' => 'Invalid credentials.']);
   }



    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login');
    }
}
