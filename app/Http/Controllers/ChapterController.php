<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChapterRequest;
use App\Models\Book;
use App\Models\Chapter;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Book $book)
    {
        $page_title = $book->title;
        Meta::prependTitle($book->title);
        $lastChapter = $book->chapters()->orderByRaw('CONVERT(chapter_number, SIGNED) desc')->firstOrFail();



        return view('chapter.create', compact('book', 'page_title', 'lastChapter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Book $book, ChapterRequest $request)
    {
        $validated = $request->validated();
        if ($validated) {
            $chapter = Chapter::create([
                'title' => $validated['title'],
                'slug' => Str::slug($validated['title']),
                'body' => $validated['body'],
                'author_note' => $validated['note'],
                'chapter_number' => $validated['chapter_number'],
                'book_id' => $book->id,
                'published_at' => now(),
            ]);

            return redirect('/dashboard/novels/' . $book->slug . '#chapters')->with('success', 'Chapter published');
        }

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book, Chapter $chapter)
    {
        $page_title = $chapter->title;
        Meta::prependTitle($chapter->title);
        $chapters = $book->chapters()->orderBy('chapter_number')->get();
        $fonts = ['Merriweather', 'Times New Roman', 'Inter', 'Lato'];

        $session_key_view = 'view-' . $chapter->id;
        //session()->forget($session_key_view);
        if (session()->missing($session_key_view)) {
            $chapter->incrementViewsCount();
            session()->put([$session_key_view => $chapter->id]);
        }



        return view('chapter.show', compact(
            'book',
            'chapter',
            'page_title',
            'chapters',
            'fonts'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book, Chapter $chapter)
    {
        $page_title = $chapter->title;
        Meta::prependTitle($chapter->title);

        return view('chapter.edit', compact('book', 'page_title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Book $book, ChapterRequest $request)
    {
        $validated = $request->validated();
        if ($validated) {
            $chapter = Chapter::update([
                'title' => $validated['title'],
                'slug' => Str::slug($validated['title']),
                'body' => $validated['body'],
                'author_note' => $validated['note'],
                'chapter_number' => $validated['chapter_number'],
                'book_id' => $book->id,
                'published_at' => now(),
            ]);

            return redirect('/dashboard/novels/' . $book->slug . '#chapters')->with('success', 'Chapter updated');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book, Chapter $chapter)
    {
        $chapter->delete();

        return redirect('/dashboard/novels/' . $book->slug . '#chapters')->with('success', 'Chapter deleted');
    }
}
