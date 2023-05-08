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
        $authors = User::search($query)->paginate(10); // TODO: role author

        return view('search', compact('books', 'authors'));
    }
}
