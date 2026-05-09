<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            $user = User::updateOrCreate([
                'google_id' => $googleUser->id,
            ], [
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => bcrypt(\Illuminate\Support\Str::random(16)),
                'role' => 'user',
            ]);

            Auth::login($user);

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Selamat datang kembali, Admin!');
            }

            return redirect('/')->with('success', 'Login Google berhasil! Selamat menjelajahi peta.');
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Gagal masuk dengan Google.');
        }
    }
}
