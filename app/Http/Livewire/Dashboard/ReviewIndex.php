<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;

class ReviewIndex extends Component
{

    use WithPagination;
    public $pageName = 'page';

    public function mount() {

    }

    public function render()
    {
        $reviews = Review::query()
            ->select('books.*', 'reviews.*')
            ->join('books', 'books.id', '=', 'book_id')
            ->where('books.user_id', '=', auth()->user()->id)
            ->orderBy('reviews.created_at', 'DESC')
            ->paginate(10);

        return view('livewire.dashboard.review-index', compact('reviews'));
    }
}
