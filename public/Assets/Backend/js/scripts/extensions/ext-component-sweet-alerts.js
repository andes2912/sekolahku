/*=========================================================================================
	File Name: ext-component-sweet-alerts.js
	Description: A beautiful replacement for javascript alerts
	----------------------------------------------------------------------------------------
	Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: Pixinvent
	Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/
$(function () {
  'use strict';

  var basicAlert = $('#basic-alert'),
    withTitle = $('#with-title'),
    withFooter = $('#footer-alert'),
    htmlAlert = $('#html-alert');

  var positionTopStart = $('#position-top-start'),
    positionTopEnd = $('#position-top-end'),
    positionBottomStart = $('#position-bottom-start'),
    positionBottomEnd = $('#position-bottom-end');

  var bounceIn = $('#bounce-in-animation'),
    fadeIn = $('#fade-in-animation'),
    flipX = $('#flip-x-animation'),
    tada = $('#tada-animation'),
    shake = $('#shake-animation');

  var success = $('#type-success'),
    error = $('#type-error'),
    warning = $('#type-warning'),
    info = $('#type-info');

  var customImage = $('#custom-image'),
    autoClose = $('#auto-close'),
    outsideClick = $('#outside-click'),
    question = $('#prompt-function'),
    ajax = $('#ajax-request');

  var confirmText = $('#confirm-text'),
    confirmColor = $('#confirm-color');

  var assetPath = '../../../app-assets/';
  if ($('body').attr('data-framework') === 'laravel') {
    assetPath = $('body').attr('data-asset-path');
  }

  //--------------- Basic Examples ---------------

  // Basic
  if (basicAlert.length) {
    basicAlert.on('click', function () {
      Swal.fire({
        title: 'Any fool can use a computer',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
    });
  }

  // With Title
  if (withTitle.length) {
    withTitle.on('click', function () {
      Swal.fire({
        title: 'The Internet?,',
        text: 'That thing is still around?',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
    });
  }

  // With Footer
  if (withFooter.length) {
    withFooter.on('click', function () {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Something went wrong!',
        footer: '<a href>Why do I have this issue?</a>',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
    });
  }

  // HTML Alert
  if (htmlAlert.length) {
    htmlAlert.on('click', function () {
      Swal.fire({
        title: '<strong>HTML <u>example</u></strong>',
        icon: 'info',
        html:
          'You can use <b>bold text</b>, ' +
          '<a href="https://pixinvent.com/" target="_blank">links</a> ' +
          'and other HTML tags',
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonText: feather.icons['thumbs-up'].toSvg({ class: 'font-medium-1 mr-50' }) + 'Great!',
        confirmButtonAriaLabel: 'Thumbs up, great!',
        cancelButtonText: feather.icons['thumbs-down'].toSvg({ class: 'font-medium-1' }),
        cancelButtonAriaLabel: 'Thumbs down',
        customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-outline-danger ml-1'
        },
        buttonsStyling: false
      });
    });
  }

  //--------------- Position ---------------

  // Top Start
  if (positionTopStart.length) {
    positionTopStart.on('click', function () {
      Swal.fire({
        position: 'top-start',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500,
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
    });
  }

  // Top End
  if (positionTopEnd.length) {
    positionTopEnd.on('click', function () {
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500,
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
    });
  }

  // Bottom Start
  if (positionBottomStart.length) {
    positionBottomStart.on('click', function () {
      Swal.fire({
        position: 'bottom-start',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500,
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
    });
  }

  // Bottom End
  if (positionBottomEnd.length) {
    positionBottomEnd.on('click', function () {
      Swal.fire({
        position: 'bottom-end',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500,
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
    });
  }

  //--------------- Animations ---------------

  // Bounce In
  if (bounceIn.length) {
    bounceIn.on('click', function () {
      Swal.fire({
        title: 'Bounce In Animation',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        showClass: {
          popup: 'animate__animated animate__bounceIn'
        },
        buttonsStyling: false
      });
    });
  }

  // Fade In
  if (fadeIn.length) {
    fadeIn.on('click', function () {
      Swal.fire({
        title: 'Fade In Animation',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        showClass: {
          popup: 'animate__animated animate__fadeIn'
        },
        buttonsStyling: false
      });
    });
  }

  // FlipX
  if (flipX.length) {
    flipX.on('click', function () {
      Swal.fire({
        title: 'Flip In Animation',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        showClass: {
          popup: 'animate__animated animate__flipInX'
        },
        buttonsStyling: false
      });
    });
  }

  // Tada
  if (tada.length) {
    tada.on('click', function () {
      Swal.fire({
        title: 'Tada Animation',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        showClass: {
          popup: 'animate__animated animate__tada'
        },
        buttonsStyling: false
      });
    });
  }

  // Shake
  if (shake.length) {
    shake.on('click', function () {
      Swal.fire({
        title: 'Shake Animation',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        showClass: {
          popup: 'animate__animated animate__shakeX'
        },
        buttonsStyling: false
      });
    });
  }

  //--------------- Types ---------------

  // Success
  if (success.length) {
    success.on('click', function () {
      Swal.fire({
        title: 'Good job!',
        text: 'You clicked the button!',
        icon: 'success',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
    });
  }

  // Error
  if (error.length) {
    error.on('click', function () {
      Swal.fire({
        title: 'Error!',
        text: ' You clicked the button!',
        icon: 'error',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
    });
  }

  // Warning
  if (warning.length) {
    warning.on('click', function () {
      Swal.fire({
        title: 'Warning!',
        text: ' You clicked the button!',
        icon: 'warning',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
    });
  }

  // Info
  if (info.length) {
    info.on('click', function () {
      Swal.fire({
        title: 'Info!',
        text: 'You clicked the button!',
        icon: 'info',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
    });
  }

  //--------------- Options ---------------

  // Custom Image
  if (customImage.length) {
    customImage.on('click', function () {
      Swal.fire({
        title: 'Sweet!',
        text: 'Modal with a custom image.',
        imageUrl: assetPath + 'images/slider/04.jpg',
        imageWidth: 400,
        imageHeight: 200,
        imageAlt: 'Custom image',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
    });
  }

  // Auto Close
  if (autoClose.length) {
    autoClose.on('click', function () {
      var timerInterval;
      Swal.fire({
        title: 'Auto close alert!',
        html: 'I will close in <b></b> milliseconds.',
        timer: 2000,
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading();
          timerInterval = setInterval(() => {
            const content = Swal.getHtmlContainer();
            if (content) {
              const b = content.querySelector('b');
              if (b) {
                b.textContent = Swal.getTimerLeft();
              }
            }
          }, 100);
        },
        willClose: () => {
          clearInterval(timerInterval);
        }
      }).then(result => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
          console.log('I was closed by the timer');
        }
      });
    });
  }

  // Click Outside
  if (outsideClick.length) {
    outsideClick.on('click', function () {
      Swal.fire({
        title: 'Click outside to close!',
        text: 'This is a cool message!',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
    });
  }

  // Question
  if (question.length) {
    question.on('click', function () {
      /* global Swal */

      const steps = ['1', '2', '3'];
      const swalQueueStep = Swal.mixin({
        confirmButtonText: 'Forward',
        cancelButtonText: 'Back',
        progressSteps: steps,
        input: 'text',
        inputAttributes: {
          required: true
        },
        validationMessage: 'This field is required'
      });

      async function backAndForth() {
        const values = [];
        let currentStep;

        for (currentStep = 0; currentStep < steps.length; ) {
          const result = await new swalQueueStep({
            title: 'Question ' + steps[currentStep],
            showCancelButton: currentStep > 0,
            currentProgressStep: currentStep
          });

          if (result.value) {
            values[currentStep] = result.value;
            currentStep++;
          } else if (result.dismiss === 'cancel') {
            currentStep--;
          }
        }

        Swal.fire(JSON.stringify(values));
      }

      backAndForth();
    });
  }

  // Ajax
  if (ajax.length) {
    ajax.on('click', function () {
      Swal.fire({
        title: 'Search for a GitHub user',
        input: 'text',
        customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-outline-danger ml-1'
        },
        buttonsStyling: false,
        inputAttributes: {
          autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Look up',
        showLoaderOnConfirm: true,
        preConfirm: login => {
          return fetch(`//api.github.com/users/${login}`)
            .then(response => {
              if (!response.ok) {
                throw new Error(response.statusText);
              }
              return response.json();
            })
            .catch(error => {
              Swal.showValidationMessage(`Request failed: ${error}`);
            });
        }
      }).then(result => {
        if (result.isConfirmed) {
          Swal.fire({
            title: '' + result.value.login + "'s avatar",
            imageUrl: result.value.avatar_url,
            customClass: { confirmButton: 'btn btn-primary' }
          });
        }
      });
    });
  }

  //--------------- Confirm Options ---------------

  // Confirm Text
  if (confirmText.length) {
    confirmText.on('click', function () {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-outline-danger ml-1'
        },
        buttonsStyling: false
      }).then(function (result) {
        if (result.value) {
          Swal.fire({
            icon: 'success',
            title: 'Deleted!',
            text: 'Your file has been deleted.',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
    });
  }

  // Confirm Color
  if (confirmColor.length) {
    confirmColor.on('click', function () {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-outline-danger ml-1'
        },
        buttonsStyling: false
      }).then(function (result) {
        if (result.value) {
          Swal.fire({
            icon: 'success',
            title: 'Deleted!',
            text: 'Your file has been deleted.',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire({
            title: 'Cancelled',
            text: 'Your imaginary file is safe :)',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
    });
  }
});
