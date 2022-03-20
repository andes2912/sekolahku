/*=========================================================================================
    File Name: ui-feather.js
    Description: Feather Icons
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  'use strict';

  // Get icons object into an array
  var icons = Object.keys(feather.icons),
    searchInput = $('#icons-search'),
    iconsContainer = $('#icons-container');

  var isRtl = $('html').attr('data-textdirection') === 'rtl';

  // Loop to render icons
  if (icons.length) {
    icons.map(function (icon) {
      if (iconsContainer.length) {
        iconsContainer.append(
          '<div class="card icon-card cursor-pointer text-center mb-2 mx-50" data-toggle="tooltip" data-placement="top" title="' +
            icon +
            '" data-icon="<i data-feather=\'' +
            icon +
            '\'></i>"> <div class="card-body"> <div class="icon-wrapper">' +
            feather.icons[icon].toSvg() +
            '</div><p class="icon-name text-truncate mb-0 mt-1">' +
            icon +
            '</p> </div></div>'
        );
      }
    });
  }

  // Icons filter
  if (searchInput.length) {
    searchInput.on('keyup', function () {
      var value = $(this).val().toLowerCase();
      $('.icon-card').filter(function () {
        var $this = $(this);
        if ($this.text().toLowerCase().indexOf(value) < !1) {
          $this.css('display', 'none');
        } else {
          $this.css('display', 'block');
        }
      });
    });
  }

  // Copy To Clipboard
  function copyToClipboard(value) {
    var tempInput = document.createElement('input');
    tempInput.value = value;
    document.body.appendChild(tempInput);
    tempInput.select();
    toastr['success'](tempInput.value.split("'")[1], 'Icon Name Copied! 📋', {
      closeButton: true,
      tapToDismiss: false,
      rtl: isRtl
    });
    document.execCommand('copy');
    document.body.removeChild(tempInput);
  }

  // Copy Icon On Click
  $(document).on('click', '.icon-card', function () {
    var $this = $(this),
      iconCode = $this.data('icon');
    iconsContainer.find('.icon-card.active').removeClass('active');
    $this.addClass('active');
    copyToClipboard(iconCode);
  });
});
