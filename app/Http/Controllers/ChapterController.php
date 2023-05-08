<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book, Chapter $chapter)
    {
        $page_title = $chapter->title;
        Meta::prependTitle($chapter->title);
        $chapters = $book->chapters()->orderBy('chapter_number')->get();

        return view('chapter.show', compact(
            'book',
            'chapter',
            'page_title',
            'chapters',
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
