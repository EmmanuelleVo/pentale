<?php

namespace App\Http\Controllers;

use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        Meta::prependTitle('Privacy Policy');

        return view('privacy-policy.index');
    }
}
