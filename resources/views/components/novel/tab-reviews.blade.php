@props(['reviews', 'book'])

<div class="novel__reviews">
    <div class="novel__reviews-container">
        <x-titles.section-title title="Write a review"/>
        {{--<p class="guest">
            <a href="{{ route('login') }}" title="Login">Login</a> or
            <a href="{{ route('register') }}" title="Register">Register</a> to leave a review.
        </p>--}}
        <form class="novel__reviews-form form">
            @csrf
            <div class="form__container form__container-rating">
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
                <div class="form__field rating">
                    <label for="story_development" class="form__label">Story development</label>
                    <input type="hidden" id="story_development" name="story_development" class="form__input">
                    <div class="star__container">
                        <i class='bx bx-star star' style="--i: 1;"></i>
                        <i class='bx bx-star star' style="--i: 2;"></i>
                        <i class='bx bx-star star' style="--i: 3;"></i>
                        <i class='bx bx-star star' style="--i: 4;"></i>
                        <i class='bx bx-star star' style="--i: 5;"></i>
                    </div>
                </div>
                <div class="form__field rating">
                    <label for="characters" class="form__label">Characters</label>
                    <input type="hidden" id="characters" name="characters" class="form__input">
                    <div class="star__container">
                        <i class='bx bx-star star' style="--i: 1;"></i>
                        <i class='bx bx-star star' style="--i: 2;"></i>
                        <i class='bx bx-star star' style="--i: 3;"></i>
                        <i class='bx bx-star star' style="--i: 4;"></i>
                        <i class='bx bx-star star' style="--i: 5;"></i>
                    </div>
                </div>
                <div class="form__field rating">
                    <label for="overall" class="form__label">Overall</label>
                    <input type="hidden" id="overall" name="overall" class="form__input">
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

    @livewire('review-sort', [$book])
</div>
