
// Use GMaps
function initMap() {
  const coordinates = {
    lat: 46.404120327360655,
    lng: 30.731437746037800
  };
  const map = new google.maps.Map(document.querySelector("#map"), {
    center: coordinates,
    zoom: 17,
    disableDefaultUI: false,
    scrollwheel: false,
  });
  const marker = new google.maps.Marker({
    position: coordinates,
    map: map,
    title: "Delicate Car Wash"
  });
}

document.addEventListener("DOMContentLoaded", () => {
  // Init AOS
  AOS.init({
    // Global settings:
    disable: 'mobile', // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
    startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
    initClassName: 'aos-init', // class applied after initialization
    animatedClassName: 'aos-animate', // class applied on animation
    useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
    disableMutationObserver: false, // disables automatic mutations' detections (advanced)
    debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
    throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)

    // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
    offset: 120, // was 120 - offset (in px) from the original trigger point
    delay: 0, // values from 0 to 3000, with step 50ms
    duration: 400, // values from 0 to 3000, with step 50ms
    easing: 'ease', // default easing for AOS animations
    once: false, // whether animation should happen only once - while scrolling down
    mirror: false, // whether elements should animate out while scrolling past them
    anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
  });

  AOS.refresh();

  // Slicks options
  slickOptions = {
    'hs1': {
      arrows: true,
      draggable: false,
      touchThreshold: 300,
      focusOnSelect: false,
      infinite: false,
      autoplay: false,
      dots: false,
      variableWidth: false,
      vertical: false,
      verticalSwiping: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow: $(".slick_nav.hs1 .slick-prev"),
      nextArrow: $(".slick_nav.hs1  .slick-next")
    },
    'hs2': {
      arrows: true,
      draggable: false,
      touchThreshold: 300,
      focusOnSelect: false,
      infinite: false,
      autoplay: false,
      dots: false,
      variableWidth: true,
      vertical: false,
      verticalSwiping: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      centerMode: true,
      prevArrow: $(".slick_nav.hs2 .slick-prev"),
      nextArrow: $(".slick_nav.hs2  .slick-next"),
      initialSlide: 1
    },
    'hs3': {
      arrows: false,
      draggable: false,
      touchThreshold: 300,
      focusOnSelect: false,
      infinite: false,
      autoplay: false,
      dots: true,
      variableWidth: true,
      vertical: false,
      verticalSwiping: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      appendDots: $(".slick_nav.hs3 "),
      customPaging: function(slider, i) {
        return '<button class="change_tab">' + $(slider.$slides[i]).attr('data-title') + '</button>';
      },
    },
    'hs4': {
      arrows: true,
      draggable: false,
      touchThreshold: 300,
      focusOnSelect: false,
      infinite: false,
      autoplay: false,
      dots: false,
      variableWidth: true,
      vertical: false,
      verticalSwiping: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      centerMode: true,
      prevArrow: $(".slick-prev.hs4"),
      nextArrow: $(".slick-next.hs4"),
      initialSlide: 1
    },
  }

  // Init desktops
  const toSlicks = document.querySelectorAll('.toSlick[data-type]:not([data-mobile=true])');
  if (toSlicks.length) {
    toSlicks.forEach(toSlick => {
      const type = toSlick.getAttribute('data-type');
      $(toSlick).slick(slickOptions[type]);
    });
  }

  // hs2 - Click on slide
  $("section.portfolio .toSlick .slick-slide").click(function(e) {
    $('section.portfolio .toSlick').slick('slickGoTo', parseInt(e.target.getAttribute('data-slick-index')));
    $("section.portfolio .toSlick .slick-slide").removeClass('slick-current');
    e.target.classList.add('slick-current');
  });
  // hs4 - Click on slide
  $("section.reviews .toSlick .slick-slide").click(function(e) {
    $('section.reviews .toSlick').slick('slickGoTo', parseInt(e.currentTarget.getAttribute('data-slick-index')));
    $("section.reviews .toSlick .slick-slide").removeClass('slick-current');
    e.currentTarget.classList.add('slick-current');
  });
});

window.addEventListener("load", () => {

  // ------------ General ------------

  // Globals
  const body = document.body;
  const overlay = document.querySelector('#overlay');
  const overlay_mobile = document.querySelector('#overlay_mobile');

  // Masked Inputs
  (function() {
    const inputTels = document.querySelectorAll('input[type=tel]');

    if (inputTels.length) {

      $(inputTels).click(function() {
        $(this).setCursorPosition(5);
      }).mask(
        "+38 (999) 999-9999",
        {autoclear: false}
      );

      // Fix masked input cursor
      $.fn.setCursorPosition = function(pos) {
        if ($(this).get(0).setSelectionRange) {
          $(this).get(0).setSelectionRange(pos, pos);
        } else if ($(this).get(0).createTextRange) {
          var range = $(this).get(0).createTextRange();
          range.collapse(true);
          range.moveEnd('character', pos);
          range.moveStart('character', pos);
          range.select();
        }
      };
    }
  })();

  // Smooth anchors
  (function() {
    $("a[href^='#']").on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({
          scrollTop: $(this.hash).offset().top - 150
        }, 400, function(){
      });
    });
  })();

  AOS.refresh();
});

window.addEventListener('load', AOS.refresh);