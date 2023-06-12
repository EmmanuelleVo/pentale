<div>
    <div class="dashboard__reviews-list">
        @if(count($reviews) > 1)
            @foreach($reviews as $review)
                <x-cards.dashboard.review-card :review="$review"/>
            @endforeach
        @else
            <x-commons.no-collection>{{ __('There are no review yet.') }}</x-commons.no-collection>
        @endif
    </div>

    {{ $reviews->links() }}
</div>
