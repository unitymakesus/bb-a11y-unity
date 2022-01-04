import $ from 'jquery';
import '@accessible360/accessible-slick';

const sliders = document.querySelectorAll('.unity-slider');

if (sliders.length) {
  sliders.forEach(slider => {
    $(slider).slick({
      dots: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      speed: 300,
      infinite: false,
      mobileFirst: true,
      responsive: [
        // {
        //   breakpoint: 1100,
        //   settings: {
        //     slidesToShow: 4,
        //     slidesToScroll: 4,
        //   }
        // },
        // {
        //   breakpoint: 992,
        //   settings: {
        //     slidesToShow: 3,
        //     slidesToScroll: 3,
        //   }
        // },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          }
        },
      ],
    });
  });
}
