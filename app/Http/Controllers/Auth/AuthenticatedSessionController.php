<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
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


    public function showStudentRegistrationForm()
    {
        // dd('dfsa');
        return view('layout/student_registration');
    }

    // Handle student registration
    public function registerStudent(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'category' => 'student', // Set category to student
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Student registered successfully!');
    }

    public function showLoginForm()
    {
        return view('auth.loginform');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'category' => 'required|in:librarian,student', // Only allow librarian and student
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $user = Auth::user();

            // Check if the user belongs to the selected category
            if ($user->category !== $request->category) {
                Auth::logout();
                return back()->withErrors(['category' => 'Invalid category for the provided credentials.']);
            }

            // Redirect based on user category
            if ($user->category === 'librarian') {
                return redirect()->route('librarian.dashboard');
            } elseif ($user->category === 'student') {
                return redirect()->route('student.dashboard');
            }
        }

        return back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('loginform');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        
    }

    
    
}
