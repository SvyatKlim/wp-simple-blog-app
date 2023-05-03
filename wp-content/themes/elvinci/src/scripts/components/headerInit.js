import headerMenu from "./headerMenu";

const headerOnScroll = () => {
    const header = $('.header'),
        tabletBreakpoint = 991.98;

    if ($(window).width() <= tabletBreakpoint) {
        header.addClass('header-fixed');
    }
    if (header.hasClass('open-menu') && $(window).width() <= tabletBreakpoint) {
        return 0;
    }
    const offsetScroll = window.pageYOffset || document.documentElement.scrollTop;

    offsetScroll > 0 && $(window).width() > tabletBreakpoint ? header.addClass('header-fixed') : header.removeClass('header-fixed');
};

const initHeader = () => {

    headerOnScroll();
    headerMenu();
    $(window).on('scroll', () => {
        headerOnScroll();
    });

    $(window).on('resize', function () {
        headerOnScroll();
    })

};

export default initHeader;
