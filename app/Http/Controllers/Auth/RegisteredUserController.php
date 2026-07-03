<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AttemptedQuizz;
use App\Models\Quizz;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */

    public function index()
    {
        $users = User::get()->all();
        return view('admin.user', compact('users'));
    }
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'active',
        ]);

        event(new Registered($user));

        Auth::login($user);
        return redirect(route('dashboard', absolute: false));
    }


    public function user($id)
    {
        $user = User::findOrFail($id);
        return view('admin.eachUser', compact('user'));
    }

    public function deactivate($id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'status' => 'inactive'
        ]);
        return back();
    }

    public function reactivate($id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'status' => 'active'
        ]);
        return back();
    }

    public function showUser()
    {
        $userId = auth()->id();

        // 1. Saare available quizzes nikaalein
        $quizzesAvailable = Quizz::all();

        // 2. User ke saare attempts direct user_id query se nikaalein
        $attempted = AttemptedQuizz::where('user_id', $userId)->get();

        // 3. Metrics calculations
        $passedUnits = $attempted->where('score_percentage', '>=', 50)->count();
        $failedUnits = $attempted->where('score_percentage', '<', 50)->count();
        $averageScore = $attempted->count() > 0 ? $attempted->avg('score_percentage') : 0;

        // 4. Last attempt nikaal kar uska quiz data manually fetch karein
        $lastAttempt = $attempted->sortByDesc('created_at')->first();
        // dd($lastAttempt);
        if ($lastAttempt) {
            // Sahi Tareeqa: Model class ko statically call karein
            $lastAttempt->quizz_id = Quizz::find($lastAttempt->quizz_id);
        }

        return view('dashboard', compact(
            'quizzesAvailable',
            'attempted',
            'lastAttempt',
            'passedUnits',
            'failedUnits',
            'averageScore'
        ));
    }
}
