//= components/gallery.js
//= components/map.js
require('./components/gallery.js');
require('./components/map.js');

$(document).ready(function () {
    var swiper = new Swiper('.main-slider.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: this.querySelector('.main-slider .swiper-button-next'),
            prevEl: this.querySelector('.main-slider .swiper-button-prev'),
        },
    });

    // var swiper2 = new Swiper('.main-gallery.swiper-container', {
    //     slidesPerView: 4,
    //     slidesPerColumn: 2,
    //     spaceBetween: 10,
    //     loopFillGroupWithBlank: true,
    //     loop: true,
    //     navigation: {
    //         nextEl: this.querySelector('.swiper-button-next'),
    //         prevEl: this.querySelector('.swiper-button-prev'),
    //     },
    //     breakpoints: {
    //         480: {
    //             slidesPerView: 1,
    //             slidesPerColumn: 1,
    //         },
    //         767: {
    //             slidesPerView: 3,
    //         },
    //     }
    // });

    var swiper3 = new Swiper('.main-reviews-slider.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            815: {
                slidesPerView: 1,
                hiddenClass:'swiper-button-hidden',
            },
            1200: {
                slidesPerView: 2,
            },
        }
    });

});

$(window).on('load', function () {

});


