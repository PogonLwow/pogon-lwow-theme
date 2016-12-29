// https://github.com/lewiscollard/horsepower/blob/29d406877d74705c61f27cc656a95ecfde86b987/assets/js/50-carousel.js
    function makeCarousel(selector) {
        var simple = document.querySelector(selector);
        if (!simple) {
            return;
        }
        var loryCarousel = lory(simple, {
            infinite: 1,
            enableMouseEvents: true,
            classNamePrevCtrl:'slider__prev',
            classNameNextCtrl:'slider__next',
            classNameSlideContainer: 'slider__slides',
            classNameFrame: 'slider__frame',
        });

        // Autoplay
        var timer = window.setInterval(function () {
            loryCarousel.next();
        }, 5000);

        function cancelTimer() {
            window.clearInterval(timer);
        }

        simple.querySelector('.slider__next').addEventListener('click', cancelTimer);
        simple.querySelector('.slider__prev').addEventListener('click', cancelTimer);
        simple.addEventListener('on.lory.touchstart', cancelTimer);
    }

    window.addEventListener('load', function() {
        makeCarousel('.js_simple');
    });
