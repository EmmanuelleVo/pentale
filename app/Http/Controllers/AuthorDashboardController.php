<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;

class AuthorDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Meta::prependTitle('Dashboard');
        $user = auth()->user();

        $books = Book::query()->where('user_id', '=', $user->id)->paginate(2);
        $all_books = Book::query()->where('user_id', '=', $user->id)->get();
        $latestReviews = [];
        $latestComments = [];
        foreach ($all_books as $all_book) {
            $latestReviews = $all_book->reviews()->with('user')->latest('reviews.created_at')->paginate(10);
        }
        /*foreach ($all_books as $all_book) {
            $latestComments = $all_book->chapters()->comments()->with('user')->latest('comments.created_at')->paginate(10);
        }*/

        return view('dashboard.index',
            compact('books', 'latestReviews')
        );
    }

    public function indexReviews()
    {
        Meta::prependTitle('Dashboard reviews');
        $user = auth()->user();

        // Latest reviews from author's books
        $reviews = Review::query()
            ->select('books.*', 'reviews.*')
            ->join('books', 'books.id', '=', 'book_id')
            ->where('books.user_id', '=', auth()->user()->id)
            ->orderBy('reviews.created_at', 'DESC')
            ->paginate(10);


        return view('dashboard.reviews.index',
            compact('reviews')
        );
    }
}
