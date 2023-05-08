<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        $latestReleases = Chapter::with('book')->latest('published_at')->paginate(4);
        //$projects = Project::latest()->with('alumni')->paginate(4);


        Meta::prependTitle('Home');

        return view('home', compact('latestReleases'));
    }
}
