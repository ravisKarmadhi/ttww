import "slick-carousel";

export class Plugins {

  init() {
    this.UpcomingSlider();
    this.LeftRightSlider();
    this.BrandLogoSlider();
    this.FullImageSlider();
    this.HistorySlider();
    this.FooterSlider();
  }

  UpcomingSlider() {
    $(document).ready(function () {
      $(".upcoming-slider").slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
            },
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
            },
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      });
    });
  }
  LeftRightSlider() {
    $(document).ready(function () {
      $(".left-right-slider").slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        prevArrow: '.left-right-slider-section .prev-arrow',
        nextArrow: '.left-right-slider-section .next-arrow',
      });
    });
  }
  BrandLogoSlider() {
    $(document).ready(function () {
      $(".brand-logo-slider").slick({
        dots: false,
        infinite: true,
        speed: 500,
        slidesToShow: 7,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
      });
    });
  }
  HistorySlider() {
    $(document).ready(function () { 
      $(".history-slider").slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        fade: false,
        prevArrow: '.history-slider-section .prev-arrow',
        nextArrow: '.history-slider-section .next-arrow',
      });
    });
  }
  FullImageSlider() {
    $(document).ready(function () { 
      $(".full-image-slider").slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        prevArrow: '.full-image-slider-data .prev-arrow',
        nextArrow: '.full-image-slider-data .next-arrow',
      });
    });
  }
  FooterSlider() {
    console.log('slider');
    $(document).ready(function () {

      $(".footer-slider").slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: false,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
            },
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
            },
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      });
    });
  }

}
