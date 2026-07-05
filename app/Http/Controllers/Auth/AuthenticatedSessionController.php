<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

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

        if ($request->user()->status !== 'active') {
            // Log them out immediately so their session isn't fully established
            auth()->guard('web')->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // 3. Throw a validation error back to the login screen
            throw ValidationException::withMessages([
                'email' => 'Your account has been deactivated. Please contact the administrator.',
            ]);
        }

        $request->session()->regenerate();
        // Agar user admin hai (is_admin == 1 ya true)
        if ($request->user()->is_admin) {
            return redirect()->intended(route('dashboard-overview', absolute: false));
        } else {
            return redirect()->intended(route('dashboard', absolute: false));
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
