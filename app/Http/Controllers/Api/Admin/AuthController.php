<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth; 
class AuthController extends Controller
{
    

   public function login(Request $request)
{
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    $admin = Admin::where('email', $request->email)->first();

   
    if (!$admin) {
        return response()->json([
            'status'  => false,
            'message' => 'Email not found. Please sign up.',
        ], 404);
    }

    
    if ($admin->status != 1) {
        return response()->json([
            'status'  => false,
            'message' => 'Account is inactive. Please contact administrator.',
        ], 403);
    }

  
    if (!Hash::check($request->password, $admin->password)) {
        return response()->json([
            'status'  => false,
            'message' => 'Invalid credentials.',
        ], 401);
    }

   
    $token =Str::random(60);
    $baseurl = env('APP_URL');

    $admin->api_token =$token;
    $admin->save();

    return response()->json([
        'status'  => true,
        'message' => 'Login successful.',
        'data'    => [
            'id'    => $admin->id,
            'name'  => $admin->name,
            'email' => $admin->email,
            'token' => $token, 
            'baseurl' =>$baseurl,
        ],
    ]);
}
public function logout(Request $request)
{
    // Step 1️⃣: Try to read Authorization header
    $header = $request->header('Authorization');
    $token = null;

    if ($header && preg_match('/Bearer\s+(.+)/', $header, $matches)) {
        $token = $matches[1];
    } elseif (session()->has('admin_api_token')) {
        // if stored in session by middleware
        $token = session('admin_api_token');
    }

    // Step 2️⃣: If token found, clear it in DB
    if ($token) {
        $admin = Admin::where('api_token', $token)->first();
        if ($admin) {
            $admin->api_token = null;
            $admin->save();
        }
    }

    // Step 3️⃣: Logout from session (if logged in)
    if (Auth::guard('admin')->check()) {
        Auth::guard('admin')->logout();
    }

    if ($request->hasSession()) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    // Step 4️⃣: Decide response type
    if ($request->expectsJson() || $request->is('api/*')) {
        return response()->json([
            'status' => true,
            'message' => 'Logout successful. Token and session cleared.',
        ]);
    }

    return redirect()->route('admin.login')->with('success', 'Logout successful.');
}

public function profile($id)
{
    $user = Admin::find($id);

    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'User not found.'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'data' => $user
    ]);
}

public function profile_Update(Request $request, $id)
{
    
$user = Admin::findOrFail($id);
if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'User not found.'
        ], 404);
    }

if ($request->hasFile('image')) {
if ($user->image && \Storage::disk('public')->exists($user->image)) {
\Storage::disk('public')->delete($user->image);
}
$user->image = $request->file('image')->store('profile_images', 'public');
}
$user->name            = $request->name;
$user->email           = $request->email;
$user->contact_number  = $request->contact_number;
$user->department      = $request->department;
$user->role            = $request->role;
$user->bank_name       = $request->bank_name;
$user->account_number  = $request->account_number;
$user->ifsc_code       = $request->ifsc;
$user->account_type    = $request->account_type;
if ($request->filled('password')) {
$user->password = $request->password;
}
if($user->save()){
    return response()->json([
        'success' => true,
        'message' => 'User profile updated successfully.', ], 200);
}

}

}

