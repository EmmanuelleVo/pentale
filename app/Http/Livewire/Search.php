<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Search extends Component
{
    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        $books = [];
        $views = '';
        $rating = '';
        if ($this->search) {
            $books = \App\Models\Book::search($this->search)->get();

            foreach ($books as $book) {
                $book_averages = [];
                $views = [];
                $book_reviews_count = count($book->reviews()->get());
                $chapters = $book->chapters()->get();
                foreach ($chapters as $chapter) {
                    $views[] = $chapter->views;
                }
                $reviews = $book->reviews()->groupBy('id')->get();
                foreach ($reviews as $review) {
                    $book_averages[] = $review->overall;
                }
            }
            $views = array_sum($views);
            $rating = round((array_sum($book_averages)) / $book_reviews_count, 2);
        }

        return view('livewire.search', compact('books', 'rating', 'views'));
    }
}
