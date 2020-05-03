$(document).ready(() => {
    $('.slider').slick({
        arrows: true,
        dots: true,
        fade: true,

        prevArrow: '<div class="icon-up-open-big slider-arrows slider-arrows-prev"></div>',
        nextArrow: '<div class="icon-down-open-big slider-arrows slider-arrows-next"></div>',
      });

    $('.menu-toggle').click(function () {
        $('.header nav').toggleClass('view-block');
        $('.slider-box__title').toggleClass('drive-down');
      });


    $('.photo').hover(f_on, f_out);

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

  $("#back-top").click( function(e){
    e.preventDefault();
    $('body,html').animate({scrollTop: 0}, 400);
  });



  new WOW().init();

  });
