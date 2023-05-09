@props(['reviews'])

<div class="novel__reviews">
    <div class="novel__reviews-container">
        <x-titles.section-title title="Write a review"/>
        <form class="novel__reviews-form form">
            @csrf
            <div class="form__container">
                <div class="form__field rating">
                    <label for="writing_quality" class="form__label">Writing quality</label>
                    <input type="hidden" id="writing_quality" name="writing_quality" class="form__input">
                    <div class="star__container">
                        <i class='bx bx-star star' style="--i: 1;"></i>
                        <i class='bx bx-star star' style="--i: 2;"></i>
                        <i class='bx bx-star star' style="--i: 3;"></i>
                        <i class='bx bx-star star' style="--i: 4;"></i>
                        <i class='bx bx-star star' style="--i: 5;"></i>
                    </div>
                </div>
            </div>
            <div class="form__container">
                <div class="form__field">
                    <label for="chapter" class="form__label">What chapter are you currently on?</label>
                    <input type="text" class="form__input" name="chapter" id="chapter" placeholder="1" value="">
                </div>
                <div class="form__field">
                    <label for="content" class="form__label">Review content</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form__textarea"
                              placeholder="Provide your opinion of the story and the justification of the rating you gave."></textarea>
                </div>
                <div class="form__field form__actions">
                    <input type="submit" class="form__button c-btn c-btn--primary" value="Submit your review">
                </div>
            </div>
        </form>
    </div>

    <div class="novel__reviews reviews">
        <div class="reviews__header">
            <span
                class="title title--small">{{ count($reviews) }} {{ count($reviews) > 1 ? 'reviews' : 'review' }}</span>
            <div class="reviews__actions tags">
                <div class="tags__list">
                    <x-commons.filter-tag class="tags__link--filter--active" name="Popular" link="#"/>
                    <x-commons.filter-tag name="Newest" link="#"/>
                    <x-commons.filter-tag name="Oldest" link="#"/>
                </div>
            </div>
        </div>
        <div class="reviews__wrapper">
            <ul class="reviews__list">
                @foreach($reviews as $review)
                    <x-novel.review :review="$review"/>
                @endforeach
            </ul>
        </div>
    </div>
</div>
