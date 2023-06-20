<?php

namespace App\Http\Livewire\Review;

use App\Models\Review;
use Livewire\Component;

class Rating extends Component
{
    public Review $review;
    public $rating;
    public $currentId;
    public $book;
    public $hideForm;
    public $writing_quality;
    public $story_development;
    public $characters;
    public $overall_rating;
    public $body;

    public function rules()
    {
        return [
            'writing_quality' => 'required|min:1|max:5',
            'story_development' => 'required|min:1|max:5',
            'characters' => 'required|min:1|max:5',
            'overall_rating' => 'required|min:1|max:5',
            'body' => 'required|min:10',
        ];
    }

    public function mount($book) {
        $this->book = $book;
        $this->overall_rating = ($this->writing_quality +  $this->story_development + $this->characters) / 3;
        // round(Review::where('book_id', '=', $this->book->id)->avg('overall'), 2)
        // round($book->users()->avg('rating'), 1)
        if(auth()->user()){
            $rating = Review::where('user_id', auth()->user()->id)->where('book_id', $this->book->id)->first();
            $this->rating = $rating;
            if (!empty($rating)) {
                $this->body = $rating->body;
                $this->currentId = $rating->id;
                $this->characters = $rating->characters;
                $this->writing_quality= $rating->writing_quality;
                $this->story_development = $rating->story_development;
                //$this->overall = round(($this->characters + $this->writing_quality + $this->story_development) / 3, 2);
            }
        }
        return view('livewire.review.rating');
    }

    public function delete($id)
    {
        $rating = Review::where('id', $id)->first();
        if ($rating && ($rating->user_id == auth()->user()->id)) {
            $rating->delete();
        }
        if ($this->currentId) {
            $this->currentId = '';
            $this->rating  = '';
            $this->comment = '';
        }
    }

    public function store()
    {
        $rating = Review::where('user_id', auth()->user()->id)->where('book_id', $this->book->id)->first();

        $this->validate();

        if ($this->validate()) {
            if (!empty($rating)) {
                $rating->user_id = auth()->user()->id;
                $rating->book_id = $this->book->id;
                $rating->characters = $this->characters;
                $rating->writing_quality = $this->writing_quality;
                $rating->story_development = $this->story_development;
                $rating->overall = round(($this->characters + $this->writing_quality + $this->story_development) / 3, 2);
                $rating->body = $this->body;
                $rating->updated_at = now();
                try {
                    $rating->update();
                } catch (\Throwable $th) {
                    throw $th;
                }
                session()->flash('success', 'You have successfully updated your review.');
            } else {
                $rating = new Review();
                $rating->user_id = auth()->user()->id;
                $rating->book_id = $this->book->id;
                $rating->characters = $this->characters;
                $rating->writing_quality = $this->writing_quality;
                $rating->story_development = $this->story_development;
                $rating->overall = round(($this->characters + $this->writing_quality + $this->story_development) / 3, 2);
                $rating->body = $this->body;
                try {
                    $rating->save();
                } catch (\Throwable $th) {
                    throw $th;
                }
                $this->hideForm = true;
                session()->flash('success', 'You have successfully created a review.');
            }
        }

    }

    public function render()
    {
        return view('livewire.review.rating');
    }
}
