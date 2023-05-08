<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterSessionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Meta::prependTitle('Register');

        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {

            $validated = $request->validated();

            $default_role = Role::all()->where('name', '=', 'guest')->first();

            if ($validated) {
                $faker = \Faker\Factory::create();
                User::create([
                    'userName' => $validated['username'],
                    'lastName' => $validated['lastname'],
                    'firstName' => $validated['firstname'],
                    'email' => $validated['register-email'],
                    'slug' => Str::slug($validated['username']),
                    'password' => bcrypt($validated['register-password']),
                    'role_id' => $default_role->id,
                    'avatar' => $faker->imageUrl(300, 300, true, 'people', $validated['username']),
                ]);

                $user = User::where('email', request('register-email'))->first();

                if (Hash::check(request('register-password'), $user->password)) {
                    Auth::login($user);
                    return redirect('/')->with('success', 'Bienvenue ' . auth()->user()->userName);
                }
            }

            return back()->withInput();
    }
}
