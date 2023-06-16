<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
	function authenticate(Request $request)
	{
		$credentials = $request->validate([
			'email' => ['required', 'email'],
			'password' => ['required'],
		]);

		if ($credentials) {
			if (Auth::attempt($credentials)) {
				$request->session()->regenerate();
				return redirect()->intended('home');
			}
			return back()->withErrors(["Wrong credentials"])->withInput();
		}
		return back()->withErrors([]);
	}

	function register(Request $request)
	{
		$credentials = $request->validate([
			'name' => ['required'],
			'email' => ['required', 'unique:users', 'email'],
			'password' => ['required'],
		]);

		if ($credentials) {
			$user = User::create([
				'name' => $request->name,
				'email' => $request->email,
				'password' => Hash::make($request->password),
			]);
			Auth::login($user);
			return redirect()->intended('home');
		}
		return back()->withErrors([]);
	}

	function logout(Request $request)
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect('/');
	}
}
