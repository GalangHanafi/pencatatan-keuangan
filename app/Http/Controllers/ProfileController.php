<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // current user

        $data = [
            'title'         => 'Profile',
            'breadcrumbs'    => [
                'Profile' => '#',
            ],
            'user'          => auth()->user(),
            'content'       => 'profile.edit',
        ];
        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function updatePhoto(Request $request)
    {
        // Validate the request
        $data = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $user = Auth::user();
        $username = Str::slug($user->name); // Ensure the username is URL-safe

        // Check if a new photo was uploaded
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }

            // Create user-specific directory
            $directory = 'profile_photos/' . $username;
            Storage::disk('public')->makeDirectory($directory);

            // Determine the file extension
            $extension = $request->file('photo')->getClientOriginalExtension();

            // Define the file path with the name 'photo' and correct extension
            $filePath = $directory . '/photo.' . $extension;

            // Store the new photo with the name 'photo'
            $path = $request->file('photo')->storeAs($directory, 'photo.' . $extension, 'public');

            // Update user's profile photo path in the database
            $user->photo = 'storage/' . $filePath;
            $user->save();
        }

        // Redirect back with a status message
        return Redirect::route('profile.edit')->with('status', 'photo-updated');
    }

    public function destroyPhoto(Request $request)
    {
        $user = Auth::user();

        // Check if the user has a photo
        if ($user->photo) {
            // Delete the photo from the storage
            Storage::disk('public')->delete($user->photo);

            // Remove the photo path from the database
            $user->photo = 'storage/photos/default.jpg';
            $user->save();
        }

        // Redirect back with a status message
        return Redirect::route('profile.edit')->with('status', 'photo-deleted');
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

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
