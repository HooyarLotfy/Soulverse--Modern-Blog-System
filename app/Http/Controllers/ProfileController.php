<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function show(User $user): View
    {
        $user->loadCount(['posts', 'comments']);
        $posts = $user->posts()->with(['user', 'arc', 'reactions', 'comments'])->latest()->take(10)->get();

        return view('profile.show', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
    
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $avatarUpdated = false;
        if ($request->hasFile('avatar')) {
            // Delete old avatar if it exists
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            // Store new avatar
            $user->avatar = $request->file('avatar')->store('avatars', 'public');
            $avatarUpdated = true;
        }

        $user->save();

        $redirectResponse = Redirect::route('profile.edit')->with('status', 'profile-updated');
        
        if ($avatarUpdated) {
            $redirectResponse->with('avatar-updated', true)
                           ->with('avatar-path', $user->avatar)
                           ->with('user-id', $user->id)
                           ->with('user-name', $user->name);
        }

        return $redirectResponse;
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }
        
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
