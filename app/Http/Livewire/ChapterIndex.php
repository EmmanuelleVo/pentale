<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithSorting;
use App\Models\Book;
use App\Models\Chapter;
use Livewire\Component;
use Livewire\WithPagination;

class ChapterIndex extends Component
{
    use WithPagination;
    use WithSorting;

    public $pageName = 'chaptersPage';
    public Book $book;

    public function mount(Book $book)
    {
        $this->book = $book;
        $this->sortField = 'chapter_number';
        $this->sortOrder = 'DESC';
    }

    public function render()
    {
        //$lastChapter = $book->chapters()->orderByRaw('CONVERT(chapter_number, SIGNED) desc')->first();

        $chapters = $this->book->chapters()
            //->orderBy($this->sortField, $this->sortOrder)
            ->orderByRaw('CONVERT(' . $this->sortField .', SIGNED) ' . $this->sortOrder)
            ->paginate(10, ['*'], 'chaptersPage');
        return view('livewire.chapter-index', compact('chapters'));
    }
}
