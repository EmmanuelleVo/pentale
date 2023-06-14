<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Butschster\Head\Facades\Meta;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        Meta::prependTitle('Register');

        if (url()->previous() !== 'http://pentale.test/login') {
            session(['link' => url()->previous()]);
        }

        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $default_role = Role::all()->where('name', '=', 'guest')->first();
        $default_preferences = [
            'fontFamily' => 'Merriweather',
            'fontSize' => '18',
            'lineHeight' => '32',
            'night' => false,
        ];
        $faker = \Faker\Factory::create();
        $user = User::create([
            'username' => $request->username,
            'slug' => Str::slug($request->username),
            'email' => $request->email,
            'role_id' => $default_role->id,
            'is_admin' => 0,
            'password' => Hash::make($request->password),
            'avatar' => $faker->imageUrl(300, 300, true, 'people', $request->username),
            'preferences' => $default_preferences,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(session('link'));

        return redirect(RouteServiceProvider::HOME);
    }
}
