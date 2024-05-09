<?php

namespace App\Http\Controllers\Auth;

use DateTime;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\UserLoginTime;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Simpan waktu login ke dalam database
        $userLoginTime = new UserLoginTime();
        $userLoginTime->user_id = Auth::user()->id;
        $userLoginTime->login_time = now();
        $userLoginTime->save();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Hitung durasi login dan simpan durasi ke dalam database
        $userLoginTime = UserLoginTime::where('user_id', Auth::user()->id)->latest()->first();

        // Periksa apakah data userLoginTime ditemukan sebelum mengakses properti
    if ($userLoginTime) {
        // Jika data ditemukan, atur properti logout_time
        $userLoginTime->logout_time = now();
        $userLoginTime->save();

        // Saat menghitung durasi
        $loginTime = new DateTime($userLoginTime->login_time);
        $logoutTime = new DateTime($userLoginTime->logout_time);
        $duration = $loginTime->diff($logoutTime)->s; // diffInSeconds() dapat diganti dengan diff()->s untuk mendapatkan detik
        
    } else {
        // Tindakan alternatif jika data tidak ditemukan
        $duration = 0; // Atau atur nilai yang sesuai berdasarkan logika aplikasi Anda
    }

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with(['duration' => $duration]);
    }
}
