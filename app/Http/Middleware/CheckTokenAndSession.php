<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
class CheckTokenAndSession
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }       
        $token = $request->query('token') ?? $request->bearerToken();

        if (!$token) {
            return redirect()->route('admin.login')->with('error', 'Token missing.');
        }
        $admin = Admin::where('api_token', $token)->first();
        if (!$admin) {
            return redirect()->route('admin.login')->with('error', 'Invalid or expired token.');
        }
        Auth::guard('admin')->login($admin);
        session(['admin_api_token' => $token]);
        return $next($request);
    }
}
