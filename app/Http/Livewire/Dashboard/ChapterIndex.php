<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Book;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;
use Livewire\Component;

class ChapterIndex extends Component
{
    use WithSorting, WithPagination;

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

        return view('livewire.dashboard.chapter-index', compact('chapters'));
    }
}
