$(document).ready(function () {

  var $nav    = $('#primaryMenu');
  var $aside  = $('#siteAside');
  var $overlay = $('#siteOverlay');

  /* ---- Left nav toggle ---- */
  $('#navMenuButton').on('click', function (e) {
    e.stopPropagation();
    var opening = !$nav.hasClass('is-open');
    $nav.toggleClass('is-open');
    $aside.removeClass('is-open');
    $overlay.toggleClass('is-visible', opening);
  });

  /* ---- Right aside toggle ---- */
  $('#asideMenuButton').on('click', function (e) {
    e.stopPropagation();
    var opening = !$aside.hasClass('is-open');
    $aside.toggleClass('is-open');
    $nav.removeClass('is-open');
    $overlay.toggleClass('is-visible', opening);
  });

  /* ---- Sub-menu toggle (Guides dropdown) ---- */
  $('.primary-menu .menu-item-has-children > a').on('click', function (e) {
    if ($(window).width() < 1200) {
      e.preventDefault();
    }
    $(this).closest('.menu-item-has-children').toggleClass('sub-open');
  });

  /* ---- Close everything on overlay click ---- */
  $overlay.on('click', function () {
    $nav.removeClass('is-open');
    $aside.removeClass('is-open');
    $overlay.removeClass('is-visible');
  });

  /* ---- Close on outside click ---- */
  $(document).on('click', function (e) {
    if ($(window).width() >= 1200) return;
    if (!$(e.target).closest('#primaryMenu, #navMenuButton').length) {
      $nav.removeClass('is-open');
    }
    if (!$(e.target).closest('#siteAside, #asideMenuButton').length) {
      $aside.removeClass('is-open');
    }
    if (!$nav.hasClass('is-open') && !$aside.hasClass('is-open')) {
      $overlay.removeClass('is-visible');
    }
  });

  /* ---- Scroll-to-top (from externalscript.js pattern) ---- */
  $(window).on('scroll', function () {
    if ($(this).scrollTop() > 300) {
      $('#scrollTop').fadeIn(200);
    } else {
      $('#scrollTop').fadeOut(200);
    }
  });

  $('#scrollTop').on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 400);
  });

});
