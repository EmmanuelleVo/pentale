<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Uploads\HandleImageUploads;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Genre;
use App\Models\Review;
use App\Models\Tag;
use Butschster\Head\Facades\Meta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Maize\Markable\Models\Like;

class BookController extends Controller
{
    use HandleImageUploads;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Meta::prependTitle('All novels');

        if (!request()->has('sort')) {
            return Redirect::to(route('novel.index', ['sort' => 'popular']));
        }

        return view('novel.index',);
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
    public function store(Book $book, BookRequest $request)
    {
        $validated = $request->validated();
        if ($validated) {

            $uploaded_image = $request->file('cover');
            $path = $this->resizeAndSave($uploaded_image, 'covers', 500, 600);

            $book = Book::create([
                'title' => $validated['title'],
                'slug' => Str::slug($validated['title']),
                'synopsis' => $validated['synopsis'],
                'language' => $validated['language'],
                'cover' => $path,
                //'cover' => request()->file('cover')?->store('covers'),
                'published_at' => now(),
                'status' => 'ongoing',
                'user_id' => auth()->user()->id,
                'patreon' => '',
            ]);

            $book_id = $book->id;

            foreach ($validated['genres'] as $genre_id) {
                DB::table('book_genre')->insert(compact('genre_id', 'book_id'));
            }
            foreach ($validated['tags'] as $tag_id) {
                DB::table('book_tag')->insert(compact('tag_id', 'book_id'));
            }

            return redirect('/dashboard/novels/' . $book->slug . '#about')->with('success', 'You have successfully created a book.');
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

        $view_count = Chapter::where('book_id', '=', $book->id)->sum('views');
        $book_average = round(Review::where('book_id', '=', $book->id)->avg('overall'), 2);
        $other_books = [];
        foreach ($book_genres as $book_genre) {
            $other_books[] = Book::with('reviews')
                ->select('books.*')
                ->has('chapters')
                ->join('book_genre', 'book_id', '=', 'books.id')
                ->join('genres', 'genres.id', '=', 'book_genre.genre_id')
                ->where('genres.name', '=', $book_genre->name)
                ->paginate(16);
        }


        return view('novel.show',
            compact('page_title',
                'book',
                'book_genres',
                'book_average',
                'view_count',
                'book_tags',
                'other_books',
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
        $languages = ['en' => 'English', 'fr' => 'Français'];
        $status = ['ongoing', 'completed', 'hiatus'];

        return view('dashboard.novel.edit', compact('book', 'genres', 'tags', 'languages', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $validated = $request->validated();
        if ($validated) {
            //dd($validated);
            if (isset($validated['cover']) && $validated['cover'] !== '') {
                $uploaded_image = $request->file('cover');
                $path = $this->resizeAndSave($uploaded_image, 'covers', 500, 600);
            }
            $book->update([
                'title' => $validated['title'],
                'slug' => Str::slug($validated['title']),
                'synopsis' => $validated['synopsis'],
                'language' => $validated['language'],
                'cover' => $path ?? $book->cover,
                'updated_at' => now(),
                'status' => $validated['status'],
                'patreon' => $validated['patreon'],
            ]);

            $book_id = $book->id;
            $book->genres()->sync($validated['genres']);
            $book->tags()->sync($validated['tags']);
            $book->save();
            /*foreach ($validated['genres'] as $genre_id) {
                DB::table('book_genre')->where('book_id', $book_id)->update(compact('genre_id'));
            }*/
            /*foreach ($validated['tags'] as $tag_id) {
                DB::table('book_tag')->where('book_id', $book_id)->update(compact('tag_id'));
            }*/


            return redirect('/dashboard/novels/' . Str::slug($validated['title']) . '#about')->with('success', 'You have successfully updated a book');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('dashboard.novels')->with('success', 'You have deleted your book.');
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
