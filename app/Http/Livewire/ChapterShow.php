<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\Chapter;

class ChapterShow extends Component
{
    private Book $book;
    private Chapter $chapter;

    public function mount(Book $book, Chapter $chapter) {
        //$chapters = $book->chapters()->orderBy('chapter_number')->get();
        $this->book = $book;
        $this->chapter = $chapter;
    }

    public function render()
    {
        $book = $this->book;
        $chapter = $this->chapter;
        return view('livewire.chapter-show', compact('book', 'chapter'));
    }
}
