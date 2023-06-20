<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Butschster\Head\Facades\Meta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        Meta::prependTitle('Home');

        $latestReleases = Book::select('books.*', 'chapters.published_at')
            ->join('chapters', function ($join) {
                $join->on('books.id', '=', 'chapters.book_id')
                    ->whereRaw('chapters.published_at = (SELECT MAX(published_at) FROM chapters WHERE book_id = books.id)');
            })
            //->groupBy('books.id')
            //->orderByDesc(DB::raw('(SELECT MAX(published_at) FROM chapters WHERE book_id = books.id)'))
            ->orderByDesc('chapters.published_at')
            ->distinct('books.id')
            ->take(12)
            ->get();

        $popularBooks = Book::with('genres')
            ->select('books.*', DB::raw('sum(chapters.views)'))
            ->join('chapters', 'books.id', '=', 'chapters.book_id')
            ->has('chapters')
            ->groupBy('books.id')
            ->orderByRaw("sum(chapters.views) DESC")
            ->take(10)
            ->get();

        $popularBooks->loadAvg('reviews', 'overall');

        $latestBooks = Book::with('genres')
            ->has('chapters')
            ->latest('books.published_at')
            ->take(10)
            ->get();

        $latestBooks->loadAvg('reviews', 'overall');

        return view('home', compact('latestReleases', 'popularBooks', 'latestBooks'));
    }
}
