@props(['title'])

<div class="review__stars-item">
    <span class="form__label">{{ $title }}</span>
    <div class="star__container">
        <i class='bx bx-star star' style="--i: 1;"></i>
        <i class='bx bx-star star' style="--i: 2;"></i>
        <i class='bx bx-star star' style="--i: 3;"></i>
        <i class='bx bx-star star' style="--i: 4;"></i>
        <i class='bx bx-star star' style="--i: 5;"></i>
    </div>
</div>
