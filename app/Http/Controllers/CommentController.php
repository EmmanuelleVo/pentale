<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {
            $input = $request->all();
            $input['user_id'] = auth()->user()->id;
            Comment::create($input);
            return back()->with('success', 'Comment created');
        }



        return back()->withInput();
    }
}
