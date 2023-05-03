
const sliderWithTextBlock = (container) => {
    const initializedSlider = (block) => {
       const slider = new Swiper(block, {
           effect: 'fade',
           fadeEffect: {
               crossFade: true
           },
            grabCursor: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

        });
    }
    $(container).each((i,el) => initializedSlider(el))
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=Slider Block', initializedSlider );
    }
}
export default sliderWithTextBlock;