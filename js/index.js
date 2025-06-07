var swiper = new Swiper(".mySwiper", {
    loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    effect: 'slide',
    fadeEffect: {
        crossFade: true
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    keyboard: {
        enabled: true,
    }
});

var swiper = new Swiper('.produtosSwiper', {
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    effect: 'slide',
    fadeEffect: {
        crossFade: true
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 10
        },
        576: {
            slidesPerView: 2,
            spaceBetween: 15
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 20
        },
        992: {
            slidesPerView: 4,
            spaceBetween: 30
        },
        1200: {
            slidesPerView: 5,
            spaceBetween: 30
        }
    }
});

var swiper = new Swiper(".swiper", {
    slidesPerView: 5,
    loop: true,
    grabCursor: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true
    },
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    effect: 'slide',
    fadeEffect: {
        crossFade: true
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 10
        },
        576: {
            slidesPerView: 2,
            spaceBetween: 15
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 20
        },
        992: {
            slidesPerView: 4,
            spaceBetween: 30
        },
        1200: {
            slidesPerView: 5,
            spaceBetween: 30
        }
    }
});