<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureHasUmkm
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Admin bypasses UMKM check for their own tools, 
        // but this middleware is mostly for UMKM-specific routes.
        if ($user->role === 'admin') {
            return $next($request);
        }

        $umkm = \App\Models\Umkm::where('user_id', $user->id)->first();

        if (!$umkm) {
            return redirect()->route('umkm.register')->with('info', 'Anda harus mendaftarkan UMKM terlebih dahulu.');
        }

        if ($umkm->status !== 'approved') {
            return redirect()->route('dashboard')->with('warning', 'Dashboard UMKM Anda sedang menunggu persetujuan admin.');
        }

        return $next($request);
    }
}
