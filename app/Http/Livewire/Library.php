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
    public $lastReadChapters;

    public $hasBookmarks = false;
    public User $user;
    private $books;


    public function mount() {
        $this->user = auth()->user();
    }

    public function render()
    {
        $books = Book::whereHasBookmark($this->user)->paginate(12);
        //$this->lastReadChapters = $this->user->books()->with('lastReadChapter')->get();

        //dd($this->lastReadChapters);
        /*if ($this->lastReadChapters) {
            $this->lastReadChapters = 1;
        }*/
        return view('livewire.library', compact('books'));
    }
}
