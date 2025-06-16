<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserLoggedIn;

class AuthController extends Controller
{
     public function index()
    {
        $salon = Salon::where('user_id', auth()->id())->first();

        if (!$salon) {
            return redirect()->route('salon.create')->with('error', 'You need to register your salon first.');
        }

        $bookings = $salon->bookings()->latest()->get();

        return view('salonsOwner.dashboard', compact('salon', 'bookings'));
    }
     public function showLoginForm()
    {
        return view('auth.login');
    }

   public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    $user = User::where('email', $credentials['email'])->first();

    if (!$user || !Hash::check($credentials['password'], $user->password)) {
        return back()->with('error', 'Invalid credentials');
    }

    Auth::login($user);

    // ✅ Send login notification email
    Mail::to($user->email)->send(new UserLoggedIn($user));

    // Redirect based on role
    if ($user->role === 'salon_owner') {
        return redirect('/salonsOwner/dashboard');
    } elseif ($user->role === 'customer') {
        return redirect('/');
    } else {
        return redirect('/admin/dashboard');
    }
}

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
    public function showRegisterForm()
{
    return view('auth.register');
}

public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'role' => 'required|in:customer,salon_owner',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    Auth::login($user);

    if ($user->role === 'salon_owner') {
        return redirect('/salonOwner/dashboard');
    } else {
        return redirect('/');
    }
}
}
