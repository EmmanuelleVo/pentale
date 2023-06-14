@props(['title', 'number'])

<div class="review__stars-item starContainer">
    <span class="form__label">{{ $title }}</span>
    <div class="star__container">
        <i class='bx bx-star star' style="--i: 1;"></i>
        <i class='bx bx-star star' style="--i: 2;"></i>
        <i class='bx bx-star star' style="--i: 3;"></i>
        <i class='bx bx-star star' style="--i: 4;"></i>
        <i class='bx bx-star star' style="--i: 5;"></i>
    </div>
    <span itemprop="ratingValue" class="book__average u-visually-hidden">{{ $number }}</span>
</div>
