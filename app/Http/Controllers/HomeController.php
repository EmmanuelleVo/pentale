<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        Meta::prependTitle('Home');

        $test = Book::with('chapters')
            ->join("chapters", function($join){
                $join->on("chapters.book_id", "=", "books.id");
            })
            ->where("chapters.published_at", "<=", now())
            ->orderBy("chapters.published_at","desc")
            ->paginate(12);

        dd($test);

        $latestReleases = Book::with(['chapters' => function ($query) {
            $query->whereDate('chapters.published_at', '<=', now())
                ->orderBy('chapters.published_at', 'DESC')
                ->take(2);
        }])
            //->join('chapters', 'chapters.book_id', '=', 'books.id')
            ->join("chapters", function($join){
                $join->on("chapters.book_id", "=", "books.id");
            })
            ->where("chapters.published_at", "<=", now())
            ->orderBy('chapters.published_at', 'DESC')
            ->paginate(12);
        $popularBooks = Book::with('genres')->paginate(10);
        $latestBooks = Book::with('genres')->paginate(10);

        return view('home', compact('latestReleases', 'popularBooks', 'latestBooks'));
    }
}
