
    document.addEventListener('DOMContentLoaded', function () {
        var simple = document.querySelector('.js_simple');
        console.log('ssss');
        lory(simple, {
            infinite: 1,
            enableMouseEvents: true,
            classNamePrevCtrl:'slider__prev',
            classNameNextCtrl:'slider__next',
            classNameSlideContainer: 'slider__slides',
            classNameFrame: 'slider__frame',
        });
    });
