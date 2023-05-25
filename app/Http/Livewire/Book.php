<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Book extends Component
{
    use WithPagination;

    public $searchTerm;
    public $perPage;
    public $sortField;
    public $sortOrder;


    public function mount()
    {
        $this->searchTerm = '';
        $this->perPage = 10;
        $this->sortOrder = 'ASC';
        $this->sortField = 'published_at';
    }

    public function sortBy($sortfield)
    {
        $this->sortField = $sortfield;
        //$this->sortOrder = $this->sortOrder === 'ASC' ? 'DESC' : 'ASC';
    }

    public function render()
    {
        $books = \App\Models\Book::query()
        ->groupBy('id')
        ->orderBy($this->sortField)
        ->paginate(20);

       /* foreach ($books as $book) {
            $book_averages = [];
            $views = [];
            $book_reviews_count = count($book->reviews()->get());
            $chapters = $book->chapters()->get();
            foreach ($chapters as $chapter) {
                $views[] = $chapter->views;
            }
            foreach ($book->reviews()->get() as $review) {
                $book_averages[] = $review->overall;
            }
        }
        $views = array_sum($views);
        $rating = round((array_sum($book_averages)) / $book_reviews_count, 2);*/


        return view('livewire.book', compact('books'));
    }
}
