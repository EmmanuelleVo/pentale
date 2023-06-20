<div class="review__likes">
    <button wire:click="toggleLike" role="button" class="c-btn  {{ $hasLiked ? 'c-btn--primary' : 'c-btn--secondary'}}">
        <x-svg.like/>
        <span>{{ $likesCount }}</span>
    </button>
    <button wire:click="toggleDislike" role="button" class="c-btn  {{ $hasDisliked ? 'c-btn--primary' : 'c-btn--secondary'}}">
        <x-svg.dislike/>
        <span>{{ $dislikesCount }}</span>
    </button>
</div>
