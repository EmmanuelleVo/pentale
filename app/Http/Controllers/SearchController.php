<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Meilisearch\Endpoints\Indexes;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $query =  $request->input('query');
        $books = Book::search($query)
            ->paginate(10);

        // $authors = User::search($query)->get();

        return view('search', compact('books', 'query'));
    }
}
