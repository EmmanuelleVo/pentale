<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use App\Models\Review;
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
        $books = Book::search($query)
            ->paginate(10);


        /*$books = Book::search($query)
            ->query(function ($query) {
                $query->join('users', 'books.user_id', 'users.id')
                    ->select(['books.*', 'users.*']);
                    //->orderBy('books.id', 'DESC');
            })
            ->paginate(10);*/

        $authors = User::search($query)->get(); // TODO: role author


        return view('search', compact('books', 'query'));
    }
}
