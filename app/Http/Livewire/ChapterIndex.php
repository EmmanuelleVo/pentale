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
        $this->sortField = 'published_at';
        $this->sortOrder = 'DESC';
    }

    public function render()
    {
        $chapters = $this->book->chapters()
            ->orderBy($this->sortField, $this->sortOrder)
            ->paginate(10, ['*'], 'chaptersPage');
        return view('livewire.chapter-index', compact('chapters'));
    }
}
