<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    /**
     * Display the settings page.
     */
    public function show(): View
    {
        $user = Auth::user();

        return view('settings', compact('user'));
    }

    /**
     * Update account information (name, email).
     */
    public function updateAccount(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);

        return back()->with('success', 'Account information updated successfully.');
    }

    /**
     * Update password.
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'string', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string'],
        ]);

        $user = Auth::user();
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('password_success', 'Password updated successfully.');
    }

    /**
     * Update general settings (theme, language).
     */
    public function updateGeneral(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'theme' => 'required|string|in:light,dark',
            'language' => 'required|string|in:en,tl,ceb',
        ]);

        $user = Auth::user();
        $user->update($validated);

        return back()->with('general_success', 'General settings updated successfully.');
    }
}
