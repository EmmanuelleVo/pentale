<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Book $book, ReviewRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {
            $input = $request->all();
            $input['user_id'] = auth()->user()->id;
            Review::create($input);
            return back()->with('success', 'You have successfully created a review.');
        }



        return back()->withInput();
    }
}
