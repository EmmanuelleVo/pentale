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

        $startDate = Carbon::now()->subDays(3);
        $endDate = Carbon::now();

        $latestReleases = Book::select('books.*')
            ->join('chapters', function ($join) {
                $join->on('books.id', '=', 'chapters.book_id')
                    ->whereNull('chapters.deleted_at')
                    ->whereNull('books.deleted_at')
                    ->whereRaw('chapters.published_at = (SELECT MAX(published_at) FROM chapters WHERE book_id = books.id)');
            })
            ->whereNull('books.deleted_at')
            ->groupBy('books.id')
            ->orderByDesc(DB::raw('(SELECT MAX(published_at) FROM chapters WHERE book_id = books.id)'))
            ->take(12)
            ->get();

        /*$latestReleases = Book::select('books.*')
            ->leftJoin('chapters', 'books.id', '=', 'chapters.book_id')
            ->whereNotNull('chapters.published_at')
            ->whereNull('books.deleted_at')
            ->groupBy('books.id')
            ->orderByDesc(function ($query) {
                $query->select('published_at')
                    ->from('chapters')
                    ->whereColumn('book_id', 'books.id')
                    ->orderByDesc('published_at', 'desc')
                    ->limit(1);
            })
            ->take(12)
            ->get();*/


        /*$latestReleases = Chapter::with('book')
            ->has('book')
            ->whereDate('published_at', '<=', now())
            ->latest('published_at')->paginate(12)*/;

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
