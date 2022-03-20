/*=========================================================================================
	File Name: tour.js
	Description: tour
	----------------------------------------------------------------------------------------
	Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: Pixinvent
	Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  'use strict';

  var startBtn = $('#tour');
  function setupTour(tour) {
    var backBtnClass = 'btn btn-sm btn-outline-primary',
      nextBtnClass = 'btn btn-sm btn-primary btn-next';
    tour.addStep({
      title: 'Navbar',
      text: 'This is your navbar',
      attachTo: { element: '.navbar', on: 'bottom' },
      buttons: [
        {
          action: tour.cancel,
          classes: backBtnClass,
          text: 'Skip'
        },
        {
          text: 'Next',
          classes: nextBtnClass,
          action: tour.next
        }
      ]
    });
    tour.addStep({
      title: 'Card',
      text: 'This is a card',
      attachTo: { element: '#basic-tour .card', on: 'top' },
      buttons: [
        {
          text: 'Skip',
          classes: backBtnClass,
          action: tour.cancel
        },
        {
          text: 'Back',
          classes: backBtnClass,
          action: tour.back
        },
        {
          text: 'Next',
          classes: nextBtnClass,
          action: tour.next
        }
      ]
    });
    tour.addStep({
      title: 'Footer',
      text: 'This is the footer',
      attachTo: { element: '.footer', on: 'top' },
      buttons: [
        {
          text: 'Back',
          classes: backBtnClass,
          action: tour.back
        },
        {
          text: 'Finish',
          classes: nextBtnClass,
          action: tour.cancel
        }
      ]
    });

    return tour;
  }

  if (startBtn.length) {
    startBtn.on('click', function () {
      var tourVar = new Shepherd.Tour({
        defaultStepOptions: {
          classes: 'shadow-md bg-purple-dark',
          scrollTo: false,
          cancelIcon: {
            enabled: true
          }
        },
        useModalOverlay: true
      });

      setupTour(tourVar).start();
    });
  }
});
