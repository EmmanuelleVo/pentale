<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use App\Models\Book;
use Livewire\WithPagination;


class Library extends Component
{
    use WithPagination;

    public $hasBookmarks = false;
    public User $user;
    private $books;


    public function mount() {
        //$this->book = $book;
        $this->user = auth()->user();
        //$books = Book::whereHasBookmark($this->user)->paginate(12);
        //$this->books = $books;
    }

    public function render()
    {
        $books = Book::whereHasBookmark($this->user)->paginate(12);

        return view('livewire.library', compact('books'));
    }
}
