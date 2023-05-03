const scrollToAnchor = (navClass) => {

    const scrollToHash = (hash) => {
        let $target = $(hash);
        if ($target.length > 0) {
            console.log($target.length)
            $(navClass).addClass('prevent-change');
            let headerHeight = $('header').outerHeight();

            $('html, body').stop().animate({
                scrollTop: $target.offset().top - headerHeight
            }, {
                duration: 1000,
                complete: function () {
                    $(navClass).removeClass('prevent-change');
                    $(window).trigger('scroll');
                }
            })
        }
    };

    $('a[href^="#"]').on('click', function (e) {
        if (!$(e.currentTarget).hasClass('js-add-hash')) {
            e.preventDefault();
            let hash = this.hash;
            scrollToHash(hash);
        }
    });

    if (window.location.hash !== '') {
        scrollToHash();
    }

};
export default scrollToAnchor;