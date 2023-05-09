<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Meta::prependTitle('Contact Support');

        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {
            // TODO: send mail
            return redirect('/contact')->with('form-success', 'Your message has been sent. We\'ll get back to you within 24 hours');
        }

        return back()->withInput();
    }
}
