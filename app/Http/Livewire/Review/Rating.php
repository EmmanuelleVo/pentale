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
    public $wq_rating;
    public $sd_rating;
    public $c_rating;
    public $overall_rating;
    public $body;

    protected $rules = [
        'wq_rating' => 'required|min:1|max:5',
        'sd_rating' => 'required|min:1|max:5',
        'c_rating' => 'required|min:1|max:5',
        'overall_rating' => 'required|min:1|max:5',
        'body' => 'required|min:10',
    ];

    public function mount($book) {
        $this->book = $book;
        $this->overall_rating = ($this->wq_rating +  $this->sd_rating + $this->c_rating) / 3;
        // round(Review::where('book_id', '=', $this->book->id)->avg('overall'), 2)
        // round($book->users()->avg('rating'), 1)
        if(auth()->user()){
            $rating = Review::where('user_id', auth()->user()->id)->where('book_id', $this->book->id)->first();
            $this->rating = $rating;
            if (!empty($rating)) {
                $this->body = $rating->body;
                $this->currentId = $rating->id;
                $this->c_rating = $rating->characters;
                $this->wq_rating= $rating->writing_quality;
                $this->sd_rating = $rating->story_development;
                //$this->overall = round(($this->c_rating + $this->wq_rating + $this->sd_rating) / 3, 2);
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
                $rating->characters = $this->c_rating;
                $rating->writing_quality = $this->wq_rating;
                $rating->story_development = $this->sd_rating;
                $rating->overall = round(($this->c_rating + $this->wq_rating + $this->sd_rating) / 3, 2);
                $rating->body = $this->body;
                try {
                    $rating->update();
                } catch (\Throwable $th) {
                    throw $th;
                }
                session()->flash('success', 'Review updated');
            } else {
                $rating = new Review();
                $rating->user_id = auth()->user()->id;
                $rating->book_id = $this->book->id;
                $rating->characters = $this->c_rating;
                $rating->writing_quality = $this->wq_rating;
                $rating->story_development = $this->sd_rating;
                $rating->overall = round(($this->c_rating + $this->wq_rating + $this->sd_rating) / 3, 2);
                $rating->body = $this->body;
                try {
                    $rating->save();
                } catch (\Throwable $th) {
                    throw $th;
                }
                $this->hideForm = true;
                session()->flash('success', 'Review created');
            }
        }

    }

    public function render()
    {
        return view('livewire.review.rating');
    }
}
