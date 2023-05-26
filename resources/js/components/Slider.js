import Swiper, {Navigation, Pagination, Autoplay} from 'swiper';

//import Swiper, { Navigation, Pagination } from 'swiper';

export class Slider {
    constructor() {
        if (document.querySelector('.swiper')) {
            Swiper.use([Navigation, Autoplay]);
            this.swiper = new Swiper('.swiper', {
                slidesPerView: 2.2,
                spaceBetween: 15,
                direction: 'horizontal',
                /*autoplay: {
                    delay: 3000,
                    disableOnInteraction: true,
                },*/

                breakpoints: {
                    1024: {
                        slidesPerView: 4.2,
                        spaceBetween: 30,
                    },
                    768: {
                        slidesPerView: 4.2,
                        spaceBetween: 20,
                    },
                    480: { //425
                        slidesPerView: 3.2,
                        spaceBetween: 20,
                    },
                },

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
