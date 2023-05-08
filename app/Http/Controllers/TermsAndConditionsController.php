<?php

namespace App\Http\Controllers;

use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;

class TermsAndConditionsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        Meta::prependTitle('Terms and Conditions');

        return view('terms-and-conditions.index');
    }
}
