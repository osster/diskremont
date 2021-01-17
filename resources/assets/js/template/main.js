//= components/gallery.js
//= components/map.js
require('./components/forms.js');
require('./components/map.js');

$(document).ready(function () {
    var swiper = new Swiper('.main-slider.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        // Disable preloading of all images
        preloadImages: false,
        // Enable lazy loading
        lazy: true,
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
        // Disable preloading of all images
        preloadImages: false,
        // Enable lazy loading
        lazy: true,
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

    $('a[href="#contacts"]').on('click', function (e) {
        e.preventDefault();
        if (typeof yaCounter1499499 !== 'undefined') {
            yaCounter1499499.reachGoal("cont");
        } else {
            console.error("Яндекс счётчик не определён.");
        }
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#contacts").offset().top
        }, 2000);
    });

});

$(window).on('load', function () {

});


