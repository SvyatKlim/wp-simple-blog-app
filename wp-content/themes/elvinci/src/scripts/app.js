import "../styles/style.scss";

import initHeader from "./components/headerInit";
import scrollToAnchor from "./utils/scrollToAnchor";
import sliderWithTextBlock from "./components/sliderWithTextBlock";


$(document).ready(function () {
    $('body').addClass('loaded')
    initHeader();
    scrollToAnchor('.js-link-hash');
    sliderWithTextBlock('.js-slider-with-text');
});