/*=========================================================================================
    File Name: ext-component-context-menu.js
    Description: Context Menu
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

'use strict';

var isRtl = $('html').attr('data-textdirection') === 'rtl';
// Basic Context Menu
$.contextMenu({
  selector: '#basic-context-menu',
  callback: function (key, options) {
    var r = 'clicked ' + key;
    window.console &&
      toastr['success']('', r, {
        rtl: isRtl
      });
  },
  items: {
    'Option 1': { name: 'Option 1' },
    'Option 2': { name: 'Option 2' }
  }
});

// Left Click Trigger
$.contextMenu({
  selector: '#left-click-context-menu',
  trigger: 'left',
  callback: function (key, options) {
    var r = 'clicked ' + key;
    window.console &&
      toastr['success']('', r, {
        rtl: isRtl
      });
  },
  items: {
    'Option 1': { name: 'Option 1' },
    'Option 2': { name: 'Option 2' }
  }
});

// Hover Trigger
$.contextMenu({
  selector: '#hover-context-menu',
  trigger: 'hover',
  autoHide: true,
  callback: function (key, options) {
    var r = 'clicked ' + key;
    window.console &&
      toastr['success']('', r, {
        rtl: isRtl
      });
  },
  items: {
    'Option 1': { name: 'Option 1' },
    'Option 2': { name: 'Option 2' }
  }
});

// Submenu
$.contextMenu({
  selector: '#submenu-context-menu',
  callback: function (key, options) {
    var r = 'clicked ' + key;
    window.console &&
      toastr['success']('', r, {
        rtl: isRtl
      });
  },
  items: {
    'Option 1': { name: 'Option 1' },
    'Option 2': { name: 'Option 2' },
    fold1: {
      name: 'Sub Group',
      items: {
        'Foo Bar': { name: 'Foo bar' },
        fold1a: {
          name: 'Other group',
          items: {
            Echo: { name: 'echo' },
            Foxtrot: { name: 'foxtrot' },
            Golf: { name: 'golf' }
          }
        }
      }
    }
  }
});
