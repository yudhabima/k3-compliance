<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
class AuthController extends Controller
{
    public function showLogin(): View { return view('auth.login'); }
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate(['email'=>['required','email'],'password'=>['required','string']]);
        if (Auth::attempt($credentials, $request->boolean('remember')) && $request->user()->role === 'admin') {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }
        Auth::logout();
        return back()->withErrors(['email' => 'Email atau password salah, atau akun bukan admin.'])->onlyInput('email');
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout(); $request->session()->invalidate(); $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
