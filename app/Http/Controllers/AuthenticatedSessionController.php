<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Butschster\Head\Facades\Meta;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Meta::prependTitle('Login');

        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginRequest $request)
    {
        $validated = $request->validated();

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();
            return redirect('/')->with('success', 'Welcome back ' . auth()->user()->userName);
        }


        return back()
            ->withErrors([ // key failed of lang/en/auth
                'email' => trans('auth.failed'),
                'password' => trans('auth.password'),
            ])->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }
}
