<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
        $page_title = 'Profile of' . $user->username;
        Meta::prependTitle('Profile of' . $user->username);

        return view('profile.edit', compact('page_title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user, ProfileRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {

            $path = $user->avatar;

            if ($request['avatar']) {
                //TODO : image validation
                //$path = $request->file('avatar')->store('avatars');
                $uploaded_image = $request->file('avatar');
                $path = $this->resizeAndSave($uploaded_image);
            }


            $user->update([
                'username' => $validated['username'],
                'email' => $validated['email'],
                'avatar' => $path,
            ]);

            if ($validated['password']) {
                $user->update([
                    'password' => bcrypt($validated['password'])
                ]);
            }

            $success = 'Vos nouvelles données ont été sauvegardées.';
            return back()->with(compact('path', 'success'));
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect(route('home'));
    }
}
