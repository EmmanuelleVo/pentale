import Swiper, { Navigation, Pagination, Autoplay } from 'swiper';
//import Swiper, { Navigation, Pagination } from 'swiper';

export class Slider {
    constructor() {
        if (document.querySelector('.swiper')) {
            Swiper.use([Navigation, Autoplay]);
            this.swiper = new Swiper('.swiper', {
                slidesPerView: 4,
                spaceBetween: 30,
                direction: 'horizontal',
                /*autoplay: {
                    delay: 3000,
                    disableOnInteraction: true,
                },*/

                pagination: {
                    el: '.swiper-pagination',
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        }

    }
}
