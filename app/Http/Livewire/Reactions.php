<?php

namespace App\Http\Livewire;

use App\Models\Review;
use Livewire\Component;
use Maize\Markable\Models\Like;

class Reactions extends Component
{
    public Review $review;
    public int $likesCount = 0;
    public int $dislikesCount = 0;
    public $hasLiked = false;
    public $hasDisliked = false;


    public function mount(Review $review)
    {
        $this->review = $review;
        if (auth()->user()) {
            $this->user = auth()->user();
            $this->hasLiked = Like::has($review, $this->user);
            $this->likesCount = $review->likes;
            $this->hasDisliked = Like::has($review, $this->user);
            $this->dislikesCount = $review->dislikes;
        }
    }

    public function toggleLike() {
        if (auth()->user()) {
            Like::toggle($this->review, $this->user);

            if ($this->hasLiked) {
                $this->hasLiked = false;
                $this->likesCount--;
                $this->review->likes--;
                $this->review->save();
                //dd($this->review->likes);

            } else {
                $this->hasLiked = true;
                $this->likesCount++;
                $this->review->likes++;
                $this->review->save();
            }
        }
    }

    public function toggleDislike() {
        if (auth()->user()) {
            Like::toggle($this->review, $this->user);

            if ($this->hasDisliked) {
                $this->hasDisliked = false;
                $this->dislikesCount--;
                $this->review->dislikes--;
                $this->review->save();

            } else {
                $this->hasDisliked = true;
                $this->dislikesCount++;
                $this->review->dislikes++;
                $this->review->save();
            }
        }
    }

    public function render()
    {
        return view('livewire.reactions');
    }
}
