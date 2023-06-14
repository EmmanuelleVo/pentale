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

        /*$latestReleases = Book::with(['chapters' => function ($query) {
            $query->whereDate('chapters.published_at', '<=', now())
                ->orderBy('chapters.published_at', 'DESC')
                ->take(2);
        }])
            //->join('chapters', 'chapters.book_id', '=', 'books.id')
            ->join("chapters", function($join){
                $join->on("chapters.book_id", "=", "books.id");
            })
            ->select('books.title as book_title', 'chapters.title as chapter_title', 'books.slug as book_slug', 'chapters.slug as chapter_slug', 'books.*', 'chapters.*')
            ->where("chapters.published_at", "<=", now())
            ->orderBy('chapters.published_at', 'DESC')
            ->paginate(12);*/


        $latestReleases = Chapter::with('book')
            ->whereDate('published_at', '<=', now())
            ->latest('published_at')->paginate(12);

        $popularBooks = Book::with('genres')
            ->select('books.*', DB::raw('sum(chapters.views)'))
            ->join('chapters', 'books.id', '=', 'chapters.book_id')
            ->has('chapters')
            ->groupBy('books.id')
            ->orderByRaw("sum(chapters.views) DESC")
            ->paginate(10);

        $latestBooks = Book::with('genres')
            ->has('chapters')
            ->latest('books.published_at')
            ->paginate(10);

        return view('home', compact('latestReleases', 'popularBooks', 'latestBooks'));
    }
}
