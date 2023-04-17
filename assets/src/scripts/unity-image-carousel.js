import $ from 'jquery';
import '@accessible360/accessible-slick';
import prefersReducedMotion from './util/prefersReducedMotion';

const sliders = document.querySelectorAll('.unity-image-carousel');

if (sliders.length) {
  sliders.forEach(slider => {
    $(slider).slick({
      adaptiveHeight: true,
      dots: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      speed: prefersReducedMotion() ? 0 : 300,
      infinite: false,
      mobileFirst: true,
    });
  });
}
