//  File Name: app-ecommerce-details.js
//  Description: App Ecommerce Details js.
//  ----------------------------------------------------------------------------------------------
//  Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
//  Author: PIXINVENT
//  Author URL: http://www.themeforest.net/user/pixinvent
// ================================================================================================

$(function () {
  'use strict';

  var productsSwiper = $('.swiper-responsive-breakpoints'),
    productOption = $('.product-color-options li'),
    btnCart = $('.btn-cart'),
    wishlist = $('.btn-wishlist'),
    checkout = 'app-ecommerce-checkout.html',
    isRtl = $('html').attr('data-textdirection') === 'rtl';

  if ($('body').attr('data-framework') === 'laravel') {
    var url = $('body').attr('data-asset-path');
    checkout = url + 'app/ecommerce/checkout';
  }

  // Init Swiper
  if (productsSwiper.length) {
    new Swiper('.swiper-responsive-breakpoints', {
      slidesPerView: 5,
      spaceBetween: 55,
      // init: false,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
      },
      breakpoints: {
        1600: {
          slidesPerView: 4,
          spaceBetween: 55
        },
        1300: {
          slidesPerView: 3,
          spaceBetween: 55
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 55
        },
        320: {
          slidesPerView: 1,
          spaceBetween: 55
        }
      }
    });
  }
  // On cart & view cart btn click to v
  if (btnCart.length) {
    btnCart.on('click', function (e) {
      var $this = $(this),
        addToCart = $this.find('.add-to-cart');
      if (addToCart.length > 0) {
        e.preventDefault();
        addToCart.text('View In Cart').removeClass('add-to-cart').addClass('view-in-cart');
        $this.attr('href', checkout);
        toastr['success']('', 'Added Item In Your Cart 🛒', {
          closeButton: true,
          tapToDismiss: false,
          rtl: isRtl
        });
      }
    });
  }

  // For Wishlist Icon
  if (wishlist.length) {
    wishlist.on('click', function () {
      var $this = $(this);
      $this.find('svg').toggleClass('text-danger');
      if ($this.find('svg').hasClass('text-danger')) {
        toastr['success']('', 'Added to wishlist ❤️', {
          closeButton: true,
          tapToDismiss: false,
          rtl: isRtl
        });
      }
    });
  }

  // Product color options
  if (productOption.length) {
    productOption.on('click', function () {
      $(this).addClass('selected').siblings().removeClass('selected');
    });
  }
});
