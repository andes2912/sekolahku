/*=========================================================================================
    File Name: page-profile.js
    Description: User Profile jQuery Plugin Initialization
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  'use strict';

  // variables
  var blockElement = $('.block-element');

  //  block Examples
  if (blockElement.length) {
    blockElement.on('click', function () {
      var block_ele = $(this);
      $(block_ele).block({
        message: '<div class="spinner-border text-primary font-medium-3"></div>',
        timeout: 2000, //unblock after 2 seconds
        overlayCSS: {
          backgroundColor: '#fff',
          opacity: 0.8,
          cursor: 'wait'
        },
        css: {
          border: 0,
          padding: 0,
          backgroundColor: 'transparent',
          display: 'flex',
          justifyContent: 'center',
          alignItems: 'center'
        }
      });
    });
  }
});
