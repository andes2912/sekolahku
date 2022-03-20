/*=========================================================================================
    File Name: app-user-edit.js
    Description: User Edit page
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
$(function () {
  'use strict';

  var changePicture = $('#change-picture'),
    userAvatar = $('.user-avatar'),
    languageSelect = $('#users-language-select2'),
    form = $('.form-validate'),
    birthdayPickr = $('.birthdate-picker');

  // Change user profile picture
  if (changePicture.length) {
    $(changePicture).on('change', function (e) {
      var reader = new FileReader(),
        files = e.target.files;
      reader.onload = function () {
        if (userAvatar.length) {
          userAvatar.attr('src', reader.result);
        }
      };
      reader.readAsDataURL(files[0]);
    });
  }

  // users language select
  if (languageSelect.length) {
    languageSelect.wrap('<div class="position-relative"></div>').select2({
      dropdownParent: languageSelect.parent(),
      dropdownAutoWidth: true,
      width: '100%'
    });
  }

  // Users birthdate picker
  if (birthdayPickr.length) {
    birthdayPickr.flatpickr();
  }

  // Validation
  if (form.length) {
    $(form).each(function () {
      var $this = $(this);
      $this.validate({
        submitHandler: function (form, event) {
          event.preventDefault();
        },
        rules: {
          username: {
            required: true
          },
          name: {
            required: true
          },
          email: {
            required: true,
            email: true
          },
          dob: {
            required: true,
            step: false
          },
          phone: {
            required: true
          },
          website: {
            required: true,
            url: true
          },
          address: {
            required: true
          },
          zip: {
            required: true,
            maxlength: 6
          },
          city: {
            required: true
          },
          state: {
            required: true
          },
          country: {
            required: true
          }
        }
      });
    });

    $(this).on('submit', function (event) {
      event.preventDefault();
    });
  }
});
