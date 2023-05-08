import Swiper from 'swiper';
//import Swiper, { Navigation, Pagination } from 'swiper';

export class Slider {


    constructor() {
        this.swiper = new Swiper('.swiper--home', {
            //modules: [Navigation, Pagination],
            loop: true,

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
