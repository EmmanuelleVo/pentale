<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Review;
use Butschster\Head\Facades\Meta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maize\Markable\Models\Like;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Meta::prependTitle('All novels');

        $books = Book::paginate(20);
        $genres = Genre::all();
        $status = ['all', 'ongoing', 'completed', 'hiatus'];

        return view('novel.index',
            compact('books', 'genres', 'status')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Meta::prependTitle('Create a new novel');

        return view('novel.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        Meta::prependTitle($book->title);

        $page_title = $book->title;

        $book_genres = $book->genres()->orderBy('name')->get();
        $book_tags = $book->tags()->get();
        $chapters = $book->chapters()->orderBy('chapter_number')->paginate(20);
        $book_reviews = $book->reviews()->paginate(10);

        $book_reviews_count = count($book->reviews()->get());
        $book__averages = [];
        foreach ($book->reviews()->get() as $review) {
            $book__averages[] = $review->overall;
            $likes_count = Like::count($review);
            if ($user = auth()->user()) {
                if( Like::has($review, $user) ) { // user a déjà liké
                    Like::remove($review, $user);
                } else {
                    Like::add($review, $user);
                }
            }
        }
        $book__average = round((array_sum($book__averages)) / $book_reviews_count, 2);

        //$article->load('user');
        //$articles = News::with('user')->latest()->paginate(2);

        /*
            Like::toggle($book, $user); // toggles the course like for the given user
        */

        $other_books = Book::join('book_genre', 'book_genre.genre_id', '=', 'genre.id');

        return view('novel.show',
            compact('page_title',
                'book',
                'book_genres',
                'book_tags',
                'other_books',
                'chapters',
                'book_reviews',
                'book__average',
                'likes_count',
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        Meta::prependTitle('Dashboard');

        return view('dashboard.index', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }




    /**
     * DASHBOARD
     */
    public function indexDashboard()
    {
        Meta::prependTitle('Dashboard');

        return view('dashboard.index',

        );
    }

    public function showDashboard()
    {
        Meta::prependTitle('All my novels');

        return view('dashboard.index',

        );
    }
}
