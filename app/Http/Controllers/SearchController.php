<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $query =  $request->input('query');
        $books = Book::search($query)->paginate(10);
        $authors = User::search($query)->get(); // TODO: role author

        $views = [];
        $rating = '';
        if (count($books) > 0) {
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


        return view('search', compact('books', 'authors', 'views', 'rating', 'query'));
    }
}
