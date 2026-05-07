<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ValidateSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Skip validation for guest users
        if (!Auth::check()) {
            return $next($request);
        }

        // Validate user agent hasn't changed (prevents session hijacking)
        $storedUserAgent = $request->session()->get('user_agent');
        if ($storedUserAgent && $storedUserAgent !== $request->userAgent()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            \Log::warning('Session hijacking attempt detected', [
                'user_id' => Auth::id(),
                'stored_agent' => $storedUserAgent,
                'current_agent' => $request->userAgent(),
                'ip' => $request->ip(),
            ]);
            
            return redirect()->route('login')->withErrors([
                'email' => 'Your session has been terminated for security reasons. Please login again.',
            ]);
        }

        // Validate IP address hasn't changed drastically (optional, can be strict)
        $storedIp = $request->session()->get('ip_address');
        if ($storedIp && $storedIp !== $request->ip()) {
            // Log IP change but don't logout (IPs can change legitimately)
            \Log::info('User IP address changed', [
                'user_id' => Auth::id(),
                'old_ip' => $storedIp,
                'new_ip' => $request->ip(),
            ]);
            
            // Update stored IP
            $request->session()->put('ip_address', $request->ip());
        }

        // Update last activity timestamp
        $request->session()->put('last_activity', now());

        return $next($request);
    }
}
