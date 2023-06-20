<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Book;
use Livewire\Component;

class Bookmark extends Component
{
    public Book $book;
    public User $user;
    public bool $hasBookmarked = false;

    public function mount(Book $book)
    {
        $this->book = $book;
        if (auth()->user()) {
            $this->user = auth()->user();
            $this->hasBookmarked = \Maize\Markable\Models\Bookmark::has($book, $this->user);
        }
        //dd($this->hasBookmarked);
    }

    public function toggleBookmark() {
        if (auth()->user()) {
            \Maize\Markable\Models\Bookmark::toggle($this->book, $this->user);
            //$this->emit('updateBookmarkCount');
            $this->hasBookmarked = !$this->hasBookmarked;
            if ($this->hasBookmarked === true) {
                session()->flash('success', 'You have bookmarked this novel.');
            } else {
                session()->flash('success', 'You have unbookmarked this novel.');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.bookmark');
    }
}
