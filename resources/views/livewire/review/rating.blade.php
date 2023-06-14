<div>
    <div class="novel__reviews-container">
        @guest()
            <p class="guest">
                <a href="{{ route('login') }}" title="Login">Login</a> or
                <a href="{{ route('register') }}" title="Register">Register</a> to leave a review.
            </p>
        @endguest
        @auth()
            <x-titles.section-title title="Write a review"/>
            <form wire:submit.prevent="store" {{--action="/novels/{{ $book->slug }}/review/store" method="post"--}} class="novel__reviews-form form">
                @csrf
                <div class="form__container form__container-rating">
                    <div class="form__field rating">
                        <label for="writing_quality" class="form__label">Writing quality</label>
                        <input type="hidden" id="writing_quality" name="writing_quality" class="form__input"
                               value="{{ $wq_rating }}">
                        <div class="star__container">
                            <label for="wq_star1">
                                <input hidden wire:model="wq_rating" type="radio" id="wq_star1" name="rating" value="1"/>
                                <svg class="@if($wq_rating >= 1 ) blue @else grey @endif " fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </label>
                            <label for="wq_star2">
                                <input hidden wire:model="wq_rating" type="radio" id="wq_star2" name="rating" value="2"/>
                                <svg class="@if($wq_rating >= 2 ) blue @else grey @endif " fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </label>
                            <label for="wq_star3">
                                <input hidden wire:model="wq_rating" type="radio" id="wq_star3" name="rating" value="3"/>
                                <svg class="@if($wq_rating >= 3 ) blue @else grey @endif " fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </label>
                            <label for="wq_star4">
                                <input hidden wire:model="wq_rating" type="radio" id="wq_star4" name="rating" value="4"/>
                                <svg class="@if($wq_rating >= 4 ) blue @else grey @endif " fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </label>
                            <label for="wq_star5">
                                <input hidden wire:model="wq_rating" type="radio" id="wq_star5" name="rating" value="5"/>
                                <svg class="@if($wq_rating >= 5 ) blue @else grey @endif " fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </label>
                        </div>
                        <x-forms.error name="writing_quality"/>
                    </div>
                    <div class="form__field rating">
                        <label for="story_development" class="form__label">Story development</label>
                        <input type="hidden" id="story_development" name="story_development" class="form__input"
                               value="{{ $sd_rating }}">
                        <div class="star__container">
                            <label for="sd_star1">
                                <input hidden wire:model="sd_rating" type="radio" id="sd_star1" name="rating" value="1"/>
                                <svg class="@if($sd_rating >= 1 ) blue @else grey @endif " fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </label>
                            <label for="sd_star2">
                                <input hidden wire:model="sd_rating" type="radio" id="sd_star2" name="rating" value="2"/>
                                <svg class="@if($sd_rating >= 2 ) blue @else grey @endif " fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </label>
                            <label for="sd_star3">
                                <input hidden wire:model="sd_rating" type="radio" id="sd_star3" name="rating" value="3"/>
                                <svg class="@if($sd_rating >= 3 ) blue @else grey @endif " fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </label>
                            <label for="sd_star4">
                                <input hidden wire:model="sd_rating" type="radio" id="sd_star4" name="rating" value="4"/>
                                <svg class="@if($sd_rating >= 4 ) blue @else grey @endif " fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </label>
                            <label for="sd_star5">
                                <input hidden wire:model="sd_rating" type="radio" id="sd_star5" name="rating" value="5"/>
                                <svg class="@if($sd_rating >= 5 ) blue @else grey @endif " fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </label>
                        </div>
                        <x-forms.error name="story_development"/>
                    </div>
                    <div class="form__field rating">
                        <label for="characters" class="form__label">Characters</label>
                        <input type="hidden" id="characters" name="characters" class="form__input" value="{{ $c_rating }}">
                        <div class="star__container">
                            <label for="c_star1">
                                <input hidden wire:model="c_rating" type="radio" id="c_star1" name="rating" value="1"/>
                                <svg class="@if($c_rating >= 1 ) blue @else grey @endif " fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </label>
                            <label for="c_star2">
                                <input hidden wire:model="c_rating" type="radio" id="c_star2" name="rating" value="2"/>
                                <svg class="@if($c_rating >= 2 ) blue @else grey @endif " fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </label>
                            <label for="c_star3">
                                <input hidden wire:model="c_rating" type="radio" id="c_star3" name="rating" value="3"/>
                                <svg class="@if($c_rating >= 3 ) blue @else grey @endif " fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </label>
                            <label for="c_star4">
                                <input hidden wire:model="c_rating" type="radio" id="c_star4" name="rating" value="4"/>
                                <svg class="@if($c_rating >= 4 ) blue @else grey @endif " fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </label>
                            <label for="c_star5">
                                <input hidden wire:model="c_rating" type="radio" id="c_star5" name="rating" value="5"/>
                                <svg class="@if($c_rating >= 5 ) blue @else grey @endif " fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </label>
                        </div>
                        <x-forms.error name="characters"/>
                    </div>
                    <div class="form__field rating">
                        <label for="overall" class="form__label">Overall</label>
                        <input wire:model="overall_rating" type="hidden" id="overall" name="overall" class="form__input" value="{{ ($c_rating+$wq_rating+$sd_rating) / 3 }}">
                        <div class="star__container">
                            @for($i = 1; $i <= 5; $i++)
                                <label for="overall_star{{ $i }}">
                                    <input hidden type="radio" id="overall_star{{ $i }}" name="rating"
                                           value="{{ $i }}"/>
                                    <svg class="@if(($c_rating+$wq_rating+$sd_rating) / 3 >= $i ) blue @else grey @endif " fill="currentColor"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                    </svg>
                                </label>
                            @endfor
                        </div>
                    </div>
                </div>


                <div class="form__container">
                    <x-forms.textarea name="body"
                                      wire:model.lazy="body"
                                      placeholder="Provide your opinion of the story and the justification of the rating you gave."
                                      label_name="Review content"/>
                    <div class="form__field form__actions">
                        <x-forms.button value="Submit your review"/>
                    </div>
                </div>
            </form>
        @endauth
    </div>

    @livewire('review-sort', [$book])
</div>
