<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Genre;
use App\Models\Review;
use App\Models\Tag;
use Butschster\Head\Facades\Meta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maize\Markable\Models\Like;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Meta::prependTitle('All novels');

        $genres = Genre::all();
        $status = ['all', 'ongoing', 'completed', 'hiatus'];

        $books = Book::with(['genres', 'reviews'])->paginate(20); //::filter($filters)

        /*$books = Book::with(['genres', 'reviews' => function($query) {
            $query->with(['reviews', 'city']);
        }])->get();*/

        foreach ($books as $book) {
            $book_averages = [];
            $views = [];
            $book_reviews_count = count($book->reviews()->get());
            $chapters = $book->chapters()->get();
            foreach ($chapters as $chapter) {
                $views[] = $chapter->views;
            }
            $reviews = $book->reviews()->groupBy('id')->get();
            foreach ($reviews as $review) {
                $book_averages[] = $review->overall;
            }
        }

        /*$test = $book->join('chapters', 'chapters.book_id', '=', 'books.id')
            ->groupBy('books.id')
            ->get(['books.id', 'books.title', DB::raw('count(chapters.id) as chapters')]);*/


        $views = array_sum($views);
        $rating = round((array_sum($book_averages)) / $book_reviews_count, 2);
        //dd($book_averages);


        return view('novel.index',
            compact('books', 'genres', 'status', 'views', 'rating')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Meta::prependTitle('Create a new novel');
        $genres = Genre::all();
        $tags = Tag::all();

        return view('dashboard.novel.create', compact('genres', 'tags'));
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
        $book_tags = $book->tags()->orderBy('name')->get();
        $chapters = $book->chapters()->orderBy('chapter_number')->paginate(20);
        $book_reviews = $book->reviews()->groupBy('id')->paginate(10);

        $book_reviews_count = count($book->reviews()->get());
        $book__averages = [];
        foreach ($book->reviews()->groupBy('id')->get() as $review) {
            $book__averages[] = $review->overall;
            $likes_count = Like::count($review);
            if ($user = auth()->user()) {
                if (Like::has($review, $user)) { // user a déjà liké
                    Like::remove($review, $user);
                } else {
                    Like::add($review, $user);
                }
            }
        }
        $book__average = round((array_sum($book__averages)) / $book_reviews_count, 2);

        $other_books = [];
        foreach ($book_genres as $book_genre) {
            $other_books[] = Book::query()
                ->join('book_genre', 'book_id', '=', 'books.id')
                ->join('genres', 'genres.id', '=', 'book_genre.genre_id')
                ->where('genres.name', '=', $book_genre->name)
                ->get();
        }


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
        Meta::prependTitle('All my novels');
        $user = auth()->user();

        $books = Book::query()->where('user_id', '=', $user->id)->get();

        return view('dashboard.novel.index',
            compact('books')
        );
    }

    public function showDashboard(Book $book)
    {
        Meta::prependTitle($book->title);
        $page_title = $book->title;
        $genres = $book->genres()->get();
        $tags = $book->tags()->get();
        $chapters = $book->chapters()->paginate(20);
        $characters = $book->characters()->get();

        return view('dashboard.novel.show',
            compact('book', 'page_title', 'genres', 'tags', 'chapters', 'characters')
        );
    }
}
