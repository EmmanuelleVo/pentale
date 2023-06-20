<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Uploads\HandleImageUploads;
use App\Models\User;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use HandleImageUploads;

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $page_title = 'Profile of' . $user->username;
        Meta::prependTitle('Profile of' . $user->username);

        return view('profile.show',
            compact('page_title', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $page_title = 'Profile of' . $user->username;
        Meta::prependTitle('Profile of' . $user->username);

        return view('profile.edit', compact('page_title', 'user'));
    }

    public function editDashboard(User $user)
    {
        $page_title = 'My profile';
        Meta::prependTitle('My profile');

        return view('profile.edit', compact('page_title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user, ProfileRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {

            if (isset($validated['avatar'])) {
                $uploaded_image = $request->file('avatar');
                $path = $this->resizeAndSave($uploaded_image, 'avatars', 300, 300);
            }

            $user->update([
                'username' => $validated['username'],
                'email' => $validated['email'],
                'avatar' => $path ?? $user->avatar,
            ]);

            if ($validated['password']) {
                $user->update([
                    'password' => bcrypt($validated['password'])
                ]);
            }

            $success = 'Vos nouvelles données ont été sauvegardées.';
            return back()->with(compact( 'success'));
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);


        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect(route('home'));
    }
}
