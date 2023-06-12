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
use Illuminate\Support\Str;
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

        /*$test = $book->join('chapters', 'chapters.book_id', '=', 'books.id')
            ->groupBy('books.id')
            ->get(['books.id', 'books.title', DB::raw('count(chapters.id) as chapters')]);*/

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
        $genres = Genre::all();
        $tags = Tag::all();
        $languages = ['en' => 'English', 'fr' => 'Français'];

        return view('dashboard.novel.create', compact('genres', 'tags', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        dd($request->validated());
        $validated = $request->validated();
        if ($validated) {
            $book = Book::create([
                'title' => $validated['title'],
                'slug' => Str::slug($validated['title']),
                'synopsis' => $validated['synopsis'],
                'language' => $validated['language'],
                'cover' => $validated['cover'],
                'published_at' => now(),
                'status' => 'ongoing',
                'user_id' => auth()->user(),
                'patreon' => '',
            ]);

            $book_id = $book->id;

            foreach ($validated['genres'] as $genre_id) {
                dd($genre_id);
                DB::table('book_genre')->insert(compact('genre_id', 'book_id'));
            }
            foreach ($validated['tags'] as $tag_id) {
                dd($tag_id);
                DB::table('book_genre')->insert(compact('tag_id', 'book_id'));
            }

            return redirect('/dashboard/novels/' . $book->slug . '#chapters')->with('success', 'Chapter published');
        }

        return back()->withInput();
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
        //$chapters = $book->chapters()->orderBy('chapter_number')->get();
        $book_reviews = $book->reviews()->groupBy('id')->paginate(10);

        $book_reviews_count = count($book->reviews()->get());
        /*$book_averages = [];
        foreach ($book->reviews()->groupBy('id')->get() as $review) {
            $book_averages[] = $review->overall;
        }*/
        //$book_average = round((array_sum($book_averages)) / $book_reviews_count, 2);
        $view_count = Chapter::where('book_id', '=', $book->id)->sum('views');
        $book_average = round(Review::where('book_id', '=', $book->id)->avg('overall'), 2);
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
                'book_average',
                'view_count',
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        Meta::prependTitle('Dashboard');
        $genres = Genre::get();
        $tags = Tag::get();

        return view('dashboard.novel.edit', compact('book', 'genres', 'tags'));
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
