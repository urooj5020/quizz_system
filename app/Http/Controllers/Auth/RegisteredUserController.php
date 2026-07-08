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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
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
            'status' => 'inactive',
        ]);

        return back();
    }

    public function reactivate($id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'status' => 'active',
        ]);

        return back();
    }

    public function showUser()
    {
        $userId = auth()->id();

        // 1. Fetch available quizzes EXCEPT those already completed
        $quizzesAvailable = Quizz::whereDoesntHave('attempts', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->withCount('questions')->get();

        // 2. Load all historical attempts with quiz relationship metadata
        $attempted = AttemptedQuizz::where('user_id', $userId)
            ->with('quiz')
            ->orderBy('created_at', 'desc')
            ->get();

        // 3. Separate arrays split via collection helpers for display
        $passedQuizzes = $attempted->where('score', '>=', 50);
        $failedQuizzes = $attempted->where('score', '<', 50);

        // 4. Metric numbers calculations
        $passedUnits = $passedQuizzes->count();
        $failedUnits = $failedQuizzes->count();
        $averageScore = $attempted->count() > 0 ? $attempted->avg('score') : 0;
        $lastAttempt = $attempted->first();

        // 5. Commit pipeline arrays to View matrix mapping
        return view('dashboard', compact(
            'quizzesAvailable',
            'attempted',
            'passedQuizzes',
            'failedQuizzes',
            'lastAttempt',
            'passedUnits',
            'failedUnits',
            'averageScore'
        ));
    }

    public function adminDetail()
    {
        $admin = User::where('is_admin', '1')->get();

        return view('admin.admin-detail', compact('admin'));
    }
}
