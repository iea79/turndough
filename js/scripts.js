document.addEventListener('DOMContentLoaded', () => {
    if (isMacOS()) {
        $('body').addClass('macos');
    }
    function stikyMenu(header) {
        let headerTop = header.offset().top;
        headerToggleClass();
        $(window).scroll(function () {
            headerToggleClass();
        });
        function headerToggleClass() {
            if ($(window).scrollTop() > headerTop + 130) {
                header.addClass('sticky');
            } else if ($(window).scrollTop() <= headerTop) {
                header.removeClass('sticky');
            }
        }
    }
    stikyMenu($('#headerSticky'));

    // Scroll to ID
    function menuScroll(menuItem) {
        menuItem.find('a[href^="#"]').click(function () {
            var scroll_el = $(this).attr('href'),
                time = 500;
            if ($(scroll_el).length != 0) {
                $('html, body').animate({ scrollTop: $(scroll_el).offset().top }, time);
                $(this).addClass('active');
            }
            return false;
        });
    }
    menuScroll($('.js-scroll-to'));

    if ($('.js-parallaxMouse').length) {
        var rellax = new Rellax('.js-parallaxMouse', {
            speed: -2,
            center: true,
        });
    }

    // Swiper
    if ($('#sliderWelcolme').length) {
        let timeout;
        const speed = 1000;
        const sliderWelcolme = new Swiper('#sliderWelcolme', {
            slidesPerView: 1,
            speed,
            // pagination: {
            //   el: '.swiper-pagination',
            //   clickable: true,
            // },
            navigation: {
                prevEl: '.welcome-slider__arrow--prev',
                nextEl: '.welcome-slider__arrow--next',
            },

            on: {
                init: () => {
                    animateSliderArrow();
                },
                beforeTransitionStart: () => {
                    animateSliderArrow();
                },
            },
        });

        function animateSliderArrow() {
            clearTimeout(timeout);
            $('.arrow-welcom').removeClass('animate');
            // $('.arrow-welcom').addClass('animate');
            timeout = setTimeout(() => {
                $('.arrow-welcom').addClass('animate');
            }, 100);
        }
    }

    // Swiper
    if ($('#sliderProduct').length) {
        const sliderProduct = new Swiper('#sliderProduct', {
            slidesPerView: 1.2,
            spaceBetween: 10,
            loopedSlides: 4,
            threshold: 3,
            loop: true,
            centeredSlides: true,
            navigation: {
                nextEl: '.products-slider__button--next',
                prevEl: '.products-slider__button--prev',
            },
            breakpoints: {
                769: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                    centeredSlides: false,
                },
            },
            on: {
                init: function (swiper) {
                    if (screen.width < 768) {
                        swiper.slideTo(5, 0);
                    }
                },
            },
        });
    }

    // Swiper
    if ($('#sb_instagram').length) {
        setTimeout(() => {
            if ($('.sbi_item').length) {
                $('#sbi_instagram').addClass('swiper');
                $('#sbi_images').addClass('swiper-wrapper');
                $('.sbi_item').addClass('swiper-slide');
                $('.sbi_photo').addClass('instagram__img');
                const sliderInstagram = new Swiper('#sb_instagram', {
                    slidesPerView: 1.2,
                    spaceBetween: 10,
                    loopedSlides: 5,
                    threshold: 3,
                    loop: true,
                    centeredSlides: true,
                    breakpoints: {
                        769: {
                            slidesPerView: 4,
                            spaceBetween: 20,
                            centeredSlides: false,
                        },
                    },
                });
            }
        }, 1000);
    }

    if ($('#slideReview').length) {
        var sliderReviewThumb = new Swiper('#sliderReviewThumb', {
            slidesPerView: 3,
            centeredSlides: true,
            spaceBetween: 10,
            watchSlidesProgress: true,
            autoHeight: true,
            centerMode: true,
            // loop: true,
            breakpoints: {
                769: {
                    slidesPerView: 5,
                },
            },
            on: {
                slideChange: (s) => {
                    // console.log(s.activeIndex);
                    slideReview.slideTo(s.activeIndex, 300);
                },
            },
        });
        var slideReview = new Swiper('#slideReview', {
            slidesPerView: 1,
            spaceBetween: 20,
            grabCursor: true,
            autoHeight: true,
            centerMode: true,
            // loop: true,
            navigation: {
                nextEl: '.review__button--next',
                prevEl: '.review__button--prev',
            },
            thumbs: {
                swiper: sliderReviewThumb,
            },
            on: {
                slideChange: (s) => {
                    // console.log(s.activeIndex);
                    sliderReviewThumb.slideTo(s.activeIndex, 300);
                },
            },
        });
    }

    gsap.registerPlugin(ScrollTrigger, MotionPathPlugin);

    // gsap.set('.pathBall', { xPercent: -50, yPercent: 20 });

    var action = gsap
        .timeline({
            defaults: { duration: 1, ease: 'none' },
            scrollTrigger: {
                trigger: '.story',
                scrub: 0.1,
                start: '20% center',
                end: 'bottom +=100%',
                // markers: true,
            },
        })
        .fromTo('.pathBall', { xPercent: -37, yPercent: -117 }, { xPercent: -50, yPercent: -100 }, 0)
        .from('.pathBall', { motionPath: { path: '.pathLine', align: '.pathLine' } }, 0);
});

function toggleTabs() {
    $('[data-tab]').on('click', function (e) {
        const section = $(this).closest('section');
        const tabs = section.find('[data-tab');
        const plate = section.find('[data-plate');
        // const self = e.target;
        tabs.removeClass('active');
        $(this).addClass('active');
        plate.removeClass('active');
        $('[data-plate=' + $(this).data('tab') + ']').addClass('active');
    });

    $('.productBuild__step:first-child()').addClass('active');
    $('.productBuild__plate:first-child()').addClass('active');
}
toggleTabs();

// Map
let map;
async function initMap() {
    //@ts-ignore
    const { Map } = await google.maps.importLibrary('maps');
    const location = {
        0: { lat: 34.101851064300135, lng: -118.33823276072827 },
        1: { lat: 33.98757159385465, lng: -118.47411327183279 },
    };

    map = new Map(document.getElementById('map'), {
        center: { lat: 34.101851064300135, lng: -118.33823276072827 },
        zoom: 15,
        styles: [
            {
                featureType: 'administrative',
                elementType: 'geometry',
                stylers: [
                    {
                        visibility: 'off',
                    },
                ],
            },
            {
                featureType: 'landscape.natural',
                stylers: [
                    {
                        color: '#d2e9fa',
                    },
                ],
            },
            {
                featureType: 'poi',
                stylers: [
                    {
                        visibility: 'off',
                    },
                ],
            },
            {
                featureType: 'road',
                elementType: 'labels.icon',
                stylers: [
                    {
                        visibility: 'off',
                    },
                ],
            },
            {
                featureType: 'transit',
                stylers: [
                    {
                        visibility: 'off',
                    },
                ],
            },
            {
                featureType: 'water',
                stylers: [
                    {
                        color: '#c6dcf0',
                    },
                ],
            },
        ],
    });

    const beachMarker_1 = new google.maps.Marker({
        position: location[0],
        map,
        icon: '/wp-content/themes/turn_dough/img/mark-map.png',
    });

    const beachMarker_2 = new google.maps.Marker({
        position: location[1],
        map,
        icon: '/wp-content/themes/turn_dough/img/mark-map.png',
    });

    $('.contact__btn').on('click', function (e) {
        e.preventDefault();
        index = $(this).index();
        map.setCenter(location[index]);
        map.setZoom(15);
        $('.contact__btn').removeClass('active');
        $(this).addClass('active');
        $('.contact__block').removeClass('open');
        $('.contact__block[data-num="' + index + '"]').addClass('open');
    });
}

function isMacOS() {
    return navigator.platform.indexOf('Mac') > -1;
}
// initMap();
