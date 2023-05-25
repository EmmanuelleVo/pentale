<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChapterRequest;
use App\Models\Book;
use App\Models\Chapter;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

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



        return view('chapter.create', compact('book', 'page_title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Book $book, ChapterRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {


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
        $fonts = ['Times New Roman', 'Roboto', 'Inter', 'Lato'];

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
