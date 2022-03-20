/*=========================================================================================
    File Name: app-invoice.js
    Description: app-invoice Javascripts
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
   Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
$(function () {
  'use strict';

  var applyChangesBtn = $('.btn-apply-changes'),
    discount,
    tax1,
    tax2,
    discountInput,
    tax1Input,
    tax2Input,
    sourceItem = $('.source-item'),
    date = new Date(),
    datepicker = $('.date-picker'),
    dueDate = $('.due-date-picker'),
    select2 = $('.invoiceto'),
    countrySelect = $('#customer-country'),
    btnAddNewItem = $('.btn-add-new '),
    adminDetails = {
      'App Design': 'Designed UI kit & app pages.',
      'App Customization': 'Customization & Bug Fixes.',
      'ABC Template': 'Bootstrap 4 admin template.',
      'App Development': 'Native App Development.'
    },
    customerDetails = {
      shelby: {
        name: 'Thomas Shelby',
        company: 'Shelby Company Limited',
        address: 'Small Heath, Birmingham',
        pincode: 'B10 0HF',
        country: 'UK',
        tel: 'Tel: 718-986-6062',
        email: 'peakyFBlinders@gmail.com'
      },
      hunters: {
        name: 'Dean Winchester',
        company: 'Hunters Corp',
        address: '951  Red Hawk Road Minnesota,',
        pincode: '56222',
        country: 'USA',
        tel: 'Tel: 763-242-9206',
        email: 'waywardSon@gmail.com'
      }
    };

  // init date picker
  if (datepicker.length) {
    datepicker.each(function () {
      $(this).flatpickr({
        defaultDate: date
      });
    });
  }

  if (dueDate.length) {
    dueDate.flatpickr({
      defaultDate: new Date(date.getFullYear(), date.getMonth(), date.getDate() + 5)
    });
  }

  // Country Select2
  if (countrySelect.length) {
    countrySelect.select2({
      placeholder: 'Select country',
      dropdownParent: countrySelect.parent()
    });
  }

  // Close select2 on modal open
  $(document).on('click', '.add-new-customer', function () {
    select2.select2('close');
  });

  // Select2
  if (select2.length) {
    select2.select2({
      placeholder: 'Select Customer',
      dropdownParent: $('.invoice-customer')
    });

    select2.on('change', function () {
      var $this = $(this),
        renderDetails =
          '<div class="customer-details mt-1">' +
          '<p class="mb-25">' +
          customerDetails[$this.val()].name +
          '</p>' +
          '<p class="mb-25">' +
          customerDetails[$this.val()].company +
          '</p>' +
          '<p class="mb-25">' +
          customerDetails[$this.val()].address +
          '</p>' +
          '<p class="mb-25">' +
          customerDetails[$this.val()].country +
          '</p>' +
          '<p class="mb-0">' +
          customerDetails[$this.val()].tel +
          '</p>' +
          '<p class="mb-0">' +
          customerDetails[$this.val()].email +
          '</p>' +
          '</div>';
      $('.row-bill-to').find('.customer-details').remove();
      $('.row-bill-to').find('.col-bill-to').append(renderDetails);
    });

    select2.on('select2:open', function () {
      if (!$(document).find('.add-new-customer').length) {
        $(document)
          .find('.select2-results__options')
          .before(
            '<div class="add-new-customer btn btn-flat-success cursor-pointer rounded-0 text-left mb-50 p-50 w-100" data-toggle="modal" data-target="#add-new-customer-sidebar">' +
              feather.icons['plus'].toSvg({ class: 'font-medium-1 mr-50' }) +
              '<span class="align-middle">Add New Customer</span></div>'
          );
      }
    });
  }

  // Repeater init
  if (sourceItem.length) {
    sourceItem.on('submit', function (e) {
      e.preventDefault();
    });
    sourceItem.repeater({
      show: function () {
        $(this).slideDown();
      },
      hide: function (e) {
        $(this).slideUp();
      }
    });
  }

  // Prevent dropdown from closing on tax change
  $(document).on('click', '.tax-select', function (e) {
    e.stopPropagation();
  });

  // On tax change update it's value value
  function updateValue(listener, el) {
    listener.closest('.repeater-wrapper').find(el).text(listener.val());
  }

  // Apply item changes btn
  if (applyChangesBtn.length) {
    $(document).on('click', '.btn-apply-changes', function (e) {
      var $this = $(this);
      tax1Input = $this.closest('.dropdown-menu').find('#tax-1-input');
      tax2Input = $this.closest('.dropdown-menu').find('#tax-2-input');
      discountInput = $this.closest('.dropdown-menu').find('#discount-input');
      tax1 = $this.closest('.repeater-wrapper').find('.tax-1');
      tax2 = $this.closest('.repeater-wrapper').find('.tax-2');
      discount = $('.discount');

      if (tax1Input.val() !== null) {
        updateValue(tax1Input, tax1);
      }

      if (tax2Input.val() !== null) {
        updateValue(tax2Input, tax2);
      }

      if (discountInput.val().length) {
        var finalValue = discountInput.val() <= 100 ? discountInput.val() : 100;
        $this
          .closest('.repeater-wrapper')
          .find(discount)
          .text(finalValue + '%');
      }
    });
  }

  // Item details select onchange
  $(document).on('change', '.item-details', function () {
    var $this = $(this),
      value = adminDetails[$this.val()];
    if ($this.next('textarea').length) {
      $this.next('textarea').val(value);
    } else {
      $this.after('<textarea class="form-control mt-2" rows="2">' + value + '</textarea>');
    }
  });
  if (btnAddNewItem.length) {
    btnAddNewItem.on('click', function () {
      if (feather) {
        // featherSVG();
        feather.replace({ width: 14, height: 14 });
      }
    });
  }
});
