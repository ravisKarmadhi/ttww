import "slick-carousel";

export class Plugins {

  init() {
    this.UpcomingSlider();
    this.LeftRightSlider();
    this.RelatedProductSlider();
    this.BrandLogoSlider();
    this.FullImageSlider();
    this.HistorySlider();
    this.FooterSlider();
    this.ProductsSlider();
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
  RelatedProductSlider() {
    $(document).ready(function () {
      $(".related-product-slider").slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        fade: false,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
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
  ProductsSlider() {
    $(document).ready(function () {
      $(".woocommerce-product-gallery__wrapper").slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        prevArrow: '.product-images .prev-arrow',
        nextArrow: '.product-images .next-arrow',
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
        responsive: [
          {
            breakpoint: 1192,
            settings: {
              slidesToShow: 5,
              slidesToScroll: 1,
            },
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 4,
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
        responsive: [
          {
            breakpoint: 1192,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
            },
          },
          {
            breakpoint: 992,
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
