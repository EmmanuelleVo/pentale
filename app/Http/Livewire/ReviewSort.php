<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithSorting;
use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class ReviewSort extends Component
{
    use WithPagination;
    use WithSorting;

    public Book $book;
    public $sortField;
    public $sortOrder;
    public $pageName = 'reviewsPage';

    public function mount(Book $book) {
        $this->book = $book;
        $this->sortField = 'likes';
        $this->sortOrder = 'DESC';
        //$reviews = $book->reviews()->orderBy('likes')->paginate(10);
    }

    public function sortBy($sortField, $sortOrder) {
        $this->sortField = $sortField;
        $this->sortOrder = $sortOrder;
    }


    public function render()
    {

        return view('livewire.review-sort',
            [
                'reviews' => $this->book->reviews()
                    ->orderBy($this->sortField, $this->sortOrder)
                    ->groupBy('id')
                    ->paginate(3, ['*'], 'reviewsPage')
            ]
        );
    }
}
