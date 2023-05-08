<?php

namespace App\Http\Controllers;

use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        Meta::prependTitle('Contact Support');

        return view('contact.create');
    }
}
