// Импортируем jQuery
//= scripts/jquery-3.3.1.min.js

// Импортируем Bootstrap
//= scripts/bootstrap.js

// Импортируем Popper
//= scripts/popper.js


//= ../../node_modules/jquery-mask-plugin/dist/jquery.mask.js
//= ../../node_modules/jquery-validation/dist/jquery.validate.js
//= ../../node_modules/jquery-datetimepicker/build/jquery.datetimepicker.full.min.js
//= ../../node_modules/swiper/dist/js/swiper.js
//= ../../node_modules/lightbox2/dist/js/lightbox.js


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

    var swiper2 = new Swiper('.main-gallery.swiper-container', {
        slidesPerView: 4,
        slidesPerColumn: 2,
        spaceBetween: 10,
        loopFillGroupWithBlank: true,
        loop: true,
        navigation: {
            nextEl: this.querySelector('.swiper-button-next'),
            prevEl: this.querySelector('.swiper-button-prev'),
        },
        breakpoints: {
            480: {
                slidesPerView: 1,
                slidesPerColumn: 1,
            },
            767: {
                slidesPerView: 3,
            },
        }
    });

    var swiper3 = new Swiper('.main-reviews-slider.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 20,
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


//= components/gallery.js
