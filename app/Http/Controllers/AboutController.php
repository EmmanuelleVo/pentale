<?php

namespace App\Http\Controllers;

use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        Meta::prependTitle('About');

        return view('about.index');
    }
}
