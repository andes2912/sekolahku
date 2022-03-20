/*=========================================================================================
    File Name: app-file-manager.js
    Description: app-file-manager js
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  'use strict';

  var sidebarFileManager = $('.sidebar-file-manager'),
    sidebarToggler = $('.sidebar-toggle'),
    fileManagerOverlay = $('.body-content-overlay'),
    filesTreeView = $('.my-drive'),
    sidebarRight = $('.right-sidebar'),
    filesWrapper = $('.file-manager-main-content'),
    viewContainer = $('.view-container'),
    fileManagerItem = $('.file-manager-item'),
    noResult = $('.no-result'),
    fileActions = $('.file-actions'),
    viewToggle = $('.view-toggle'),
    filterInput = $('.files-filter'),
    toggleDropdown = $('.toggle-dropdown'),
    sidebarMenuList = $('.sidebar-list'),
    fileDropdown = $('.file-dropdown'),
    fileContentBody = $('.file-manager-content-body');

  // Select File
  if (fileManagerItem.length) {
    fileManagerItem.find('.custom-control-input').on('change', function () {
      var $this = $(this);
      if ($this.is(':checked')) {
        $this.closest('.file, .folder').addClass('selected');
      } else {
        $this.closest('.file, .folder').removeClass('selected');
      }
      if (fileManagerItem.find('.custom-control-input:checked').length) {
        fileActions.addClass('show');
      } else {
        fileActions.removeClass('show');
      }
    });
  }

  // Toggle View
  if (viewToggle.length) {
    viewToggle.find('input').on('change', function () {
      var input = $(this);
      viewContainer.each(function () {
        if (!$(this).hasClass('view-container-static')) {
          if (input.is(':checked') && input.data('view') === 'list') {
            $(this).addClass('list-view');
          } else {
            $(this).removeClass('list-view');
          }
        }
      });
    });
  }

  // Filter
  if (filterInput.length) {
    filterInput.on('keyup', function () {
      var value = $(this).val().toLowerCase();

      fileManagerItem.filter(function () {
        var $this = $(this);

        if (value.length) {
          $this.closest('.file, .folder').toggle(-1 < $this.text().toLowerCase().indexOf(value));
          $.each(viewContainer, function () {
            var $this = $(this);
            if ($this.find('.file:visible, .folder:visible').length === 0) {
              $this.find('.no-result').removeClass('d-none').addClass('d-flex');
            } else {
              $this.find('.no-result').addClass('d-none').removeClass('d-flex');
            }
          });
        } else {
          $this.closest('.file, .folder').show();
          noResult.addClass('d-none').removeClass('d-flex');
        }
      });
    });
  }

  // sidebar file manager list scrollbar
  if ($(sidebarMenuList).length > 0) {
    var sidebarLeftList = new PerfectScrollbar(sidebarMenuList[0], {
      suppressScrollX: true
    });
  }

  if ($(fileContentBody).length > 0) {
    var rightContentWrapper = new PerfectScrollbar(fileContentBody[0], {
      cancelable: true,
      wheelPropagation: false
    });
  }

  // Files Treeview
  if (filesTreeView.length) {
    filesTreeView.jstree({
      core: {
        themes: {
          dots: false
        },
        data: [
          {
            text: 'My Drive',
            children: [
              {
                text: 'photos',
                children: [
                  {
                    text: 'image-1.jpg',
                    type: 'jpg'
                  },
                  {
                    text: 'image-2.jpg',
                    type: 'jpg'
                  }
                ]
              }
            ]
          }
        ]
      },
      plugins: ['types'],
      types: {
        default: {
          icon: 'far fa-folder font-medium-1'
        },
        jpg: {
          icon: 'far fa-file-image text-info font-medium-1'
        }
      }
    });
  }

  // click event for show sidebar
  sidebarToggler.on('click', function () {
    sidebarFileManager.toggleClass('show');
    fileManagerOverlay.toggleClass('show');
  });

  // remove sidebar
  $('.body-content-overlay, .sidebar-close-icon').on('click', function () {
    sidebarFileManager.removeClass('show');
    fileManagerOverlay.removeClass('show');
    sidebarRight.removeClass('show');
  });

  // on screen Resize remove .show from overlay and sidebar
  $(window).on('resize', function () {
    if ($(window).width() > 768) {
      if (fileManagerOverlay.hasClass('show')) {
        sidebarFileManager.removeClass('show');
        fileManagerOverlay.removeClass('show');
        sidebarRight.removeClass('show');
      }
    }
  });

  // making active to list item in links on click
  sidebarMenuList.find('.list-group a').on('click', function () {
    if (sidebarMenuList.find('.list-group a').hasClass('active')) {
      sidebarMenuList.find('.list-group a').removeClass('active');
    }
    $(this).addClass('active');
  });

  // Toggle Dropdown
  if (toggleDropdown.length) {
    $('.file-logo-wrapper .dropdown').on('click', function (e) {
      var $this = $(this);
      e.preventDefault();
      if (fileDropdown.length) {
        $('.view-container').find('.file-dropdown').remove();
        if ($this.closest('.dropdown').find('.dropdown-menu').length === 0) {
          fileDropdown
            .clone()
            .appendTo($this.closest('.dropdown'))
            .addClass('show')
            .find('.dropdown-item')
            .on('click', function () {
              $(this).closest('.dropdown-menu').remove();
            });
        }
      }
    });
    $(document).on('click', function (e) {
      if (!$(e.target).hasClass('toggle-dropdown')) {
        filesWrapper.find('.file-dropdown').remove();
      }
    });

    if (viewContainer.length) {
      $('.file, .folder').on('mouseleave', function () {
        $(this).find('.file-dropdown').remove();
      });
    }
  }
});
