
jQuery(document).ready(function ($) {
  // $() will work as an alias for jQuery() inside of this function
  $('.btn-link').click(function () {
    $('.fa-angle-up').toggleClass('hidden');
    $('.fa-angle-down').toggleClass('hidden');
  });

  $('.js-dropdown-service').click(function () {
   $('.icon-minus-service').toggleClass('hidden');
   $('.icon-plus-service').toggleClass('hidden');
  });

  $('.js-dropdown-info').click(function () {
    $('.icon-plus-info').toggleClass('hidden');
    $('.icon-minus-info').toggleClass('hidden');
  });

  $('.btn-category').click(function () {
    $('.cat-angle-down').toggleClass('hidden');
    $('.cat-angle-up').toggleClass('hidden');
  });


  /*SWIPPER CONTACTO */

  var appendNumber = 4;
  var prependNumber = 1;
  var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1.5,
    centeredSlides: false,
    spaceBetween: 30,

  });


  /* SWIPPER LOGOS IDAS Y VUELTAS */

  var swiperLogos = new Swiper('.js-swiper-container-logos', {
    slidesPerView: 1.5,
    centeredSlides: false,
    spaceBetween: 20,
    nested: true,
    breakpoints: {
      // when window width is >= 480px
      480: {
        slidesPerView: 2.5,
        spaceBetween: 30
      },
      // when window width is >= 640px
      640: {
        slidesPerView: 2.8,
        spaceBetween: 40
      },
      770: {
        slidesPerView: 3.5,
        spaceBetween: 40
      },
      995: {
        slidesPerView: 5,
        spaceBetween: 60
      },
    },

  });

  /*SWIPPER DIRECTIVA */

  var swiper = new Swiper('.js-swiper-container-directiva', {
    slidesPerView: '1.2',
    centeredSlides: false,
    spaceBetween: 20,
    nested: true,
    breakpoints: {
      // when window width is >= 480px
      480: {
        slidesPerView: 1.5,
        spaceBetween: 20
      },
      // when window width is >= 640px
      640: {
        slidesPerView: 1.8,
        spaceBetween: 10
      },
      770: {
        slidesPerView: 2.5,
        spaceBetween: 10
      },
      995: {
        slidesPerView: 3,
        spaceBetween: 20
      },
    },

  });

  /*SWIPER SLIDE*/

  var swiper = new Swiper('.js-swiper-slide', {
    slidesPerView: 1,
    autoHeight: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });


});


function GTranslateGetCurrentLang() {
  var keyValue = document['cookie'].match('(^|;) ?googtrans=([^;]*)(;|$)');
  return keyValue ? keyValue[2].split('/')[2] : null;
}

function GTranslateFireEvent(element, event) {
  try {
    if (document.createEventObject) {
      var evt = document.createEventObject();
      element.fireEvent('on' + event, evt)
    } else {
      var evt = document.createEvent('HTMLEvents');
      evt.initEvent(event, true, true);
      element.dispatchEvent(evt)
    }
  } catch (e) {}
}

function doGTranslate(lang_pair) {
  if (lang_pair.value)
    lang_pair = lang_pair.value;

  if (lang_pair == '')
    return;

  var lang = lang_pair.split('|')[1];
  if (GTranslateGetCurrentLang() == null && lang == lang_pair.split('|')[0])
    return;

  var teCombo;
  var sel = document.getElementsByTagName('select');
  for (var i = 0; i < sel.length; i++)
    if (sel[i].className.indexOf('goog-te-combo') != -1) {
      teCombo = sel[i];
      break;
    }

  if (document.getElementById('google_translate_element2') == null || document.getElementById('google_translate_element2').innerHTML.length == 0 || teCombo.length == 0 || teCombo.innerHTML.length == 0) {
    setTimeout(function () {
      doGTranslate(lang_pair)
    }, 500)
  } else {
    teCombo.value = lang;
    GTranslateFireEvent(teCombo, 'change');
    GTranslateFireEvent(teCombo, 'change')
  }
}