$(document).ready(() => {
  if ($(window).width() > 768) {
    $('.slider').slick({
      arrows: true,
      dots: true,
      fade: true,

      prevArrow: '<div class="icon-up-open-big slider-arrows slider-arrows-prev"></div>',
      nextArrow: '<div class="icon-down-open-big slider-arrows slider-arrows-next"></div>',
    });
  };

    $('.menu-toggle').on('click', function () {
        $('.header nav').toggleClass('view-block');
        $('.header').toggleClass('mobile');
        $('.slider-box__title').toggleClass('drive-down');
      });


    $('.photo-post').hover(f_on, f_out);

    function f_on() {

      $(this).children('.photo_top').css('display', 'block');
    };

    function f_out() {
      $(this).children('.photo_top')
        .css('display', 'none');
    };


  $(window).scroll(function () {
    let top = $(window).scrollTop();
    if(top >= 1000){
      $('#back-top').css('visibility','visible').css('height','4.68em');
    } else {
      $('#back-top').css('visibility','hidden').css('height','1px')
    }
  });

  $("#back-top").on('click', function(e){
    e.preventDefault();
    $('body,html').animate({scrollTop: 0}, 400);
  });


  $('.menu-item-206').hover(fun_on, fun_out);

  function fun_on() {
    $('.sub-menu').css('display', 'block');
  };

  function fun_out() {
    $('.sub-menu')
      .css('display', 'none');
  };

  let headerSlider = function (nameSlider) {
    let slider = $('.'+nameSlider);
    if ($(window).width() > 768 && !(slider.hasClass('slick-initialized'))) {
      $(slider).slick({
        arrows: true,
        dots: true,
        fade: true,
        prevArrow: '<div class="icon-up-open-big slider-arrows slider-arrows-prev"></div>',
        nextArrow: '<div class="icon-down-open-big slider-arrows slider-arrows-next"></div>',
      });
    } else if ($(window).width() < 768 && slider.hasClass('slick-initialized')) {
      slider.slick('unslick');
    }
  };

  $(window).on('resize',function () {

    headerSlider('slider');

  });



  new WOW().init();

  });
