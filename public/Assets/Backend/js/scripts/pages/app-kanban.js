$(function () {
  'use strict';

  var boards,
    openSidebar = true,
    kanbanWrapper = $('.kanban-wrapper'),
    sidebar = $('.update-item-sidebar'),
    datePicker = $('#due-date'),
    select2 = $('.select2'),
    commentEditor = $('.comment-editor'),
    addNewForm = $('.add-new-board'),
    updateItemSidebar = $('.update-item-sidebar'),
    addNewInput = $('.add-new-board-input');

  var assetPath = '../../../app-assets/';
  if ($('body').attr('data-framework') === 'laravel') {
    assetPath = $('body').attr('data-asset-path');
  }

  // Get Data
  $.ajax({
    type: 'GET',
    dataType: 'json',
    async: false,
    url: assetPath + 'data/kanban.json',
    success: function (data) {
      boards = data;
    }
  });

  // Toggle add new input and actions
  addNewInput.toggle();

  // datepicker init
  if (datePicker.length) {
    datePicker.flatpickr({
      monthSelectorType: 'static',
      altInput: true,
      altFormat: 'j F, Y',
      dateFormat: 'Y-m-d'
    });
  }

  // select2
  if (select2.length) {
    function renderLabels(option) {
      if (!option.id) {
        return option.text;
      }
      var $badge = "<div class='badge " + $(option.element).data('color') + " badge-pill'> " + option.text + '</div>';

      return $badge;
    }

    select2.each(function () {
      var $this = $(this);
      $this.wrap("<div class='position-relative'></div>").select2({
        placeholder: 'Select Label',
        dropdownParent: $this.parent(),
        templateResult: renderLabels,
        templateSelection: renderLabels,
        escapeMarkup: function (es) {
          return es;
        }
      });
    });
  }

  // Comment editor
  if (commentEditor.length) {
    new Quill('.comment-editor', {
      modules: {
        toolbar: '.comment-toolbar'
      },
      placeholder: 'Write a Comment... ',
      theme: 'snow'
    });
  }

  // Render board dropdown
  function renderBoardDropdown() {
    return (
      "<div class='dropdown'>" +
      feather.icons['more-vertical'].toSvg({
        class: 'dropdown-toggle cursor-pointer font-medium-3 mr-0',
        id: 'board-dropdown',
        'data-toggle': 'dropdown',
        'aria-haspopup': 'true',
        'aria-expanded': 'false'
      }) +
      "<div class='dropdown-menu dropdown-menu-right' aria-labelledby='board-dropdown'>" +
      "<a class='dropdown-item delete-board' href='javascript:void(0)'> " +
      feather.icons['trash'].toSvg({ class: 'font-medium-1 align-middle' }) +
      "<span class='align-middle ml-25'>Delete</span></a>" +
      "<a class='dropdown-item' href='javascript:void(0)'>" +
      feather.icons['edit'].toSvg({ class: 'font-medium-1 align-middle' }) +
      "<span class='align-middle ml-25'>Rename</span></a>" +
      "<a class='dropdown-item' href='javascript:void(0)'>" +
      feather.icons['archive'].toSvg({ class: 'font-medium-1 align-middle' }) +
      "<span class='align-middle ml-25'>Archive</span></a>" +
      '</div>' +
      '</div>'
    );
  }

  // Render item dropdown
  function renderDropdown() {
    return (
      "<div class='dropdown item-dropdown px-1'>" +
      feather.icons['more-vertical'].toSvg({
        class: 'dropdown-toggle cursor-pointer mr-0 font-medium-1',
        id: 'item-dropdown',
        ' data-toggle': 'dropdown',
        'aria-haspopup': 'true',
        'aria-expanded': 'false'
      }) +
      "<div class='dropdown-menu dropdown-menu-right' aria-labelledby='item-dropdown'>" +
      "<a class='dropdown-item' href='javascript:void(0)'>Copy task link</a>" +
      "<a class='dropdown-item' href='javascript:void(0)'>Duplicate task</a>" +
      "<a class='dropdown-item delete-task' href='javascript:void(0)'>Delete</a>" +
      '</div>' +
      '</div>'
    );
  }
  // Render header
  function renderHeader(color, text) {
    return (
      "<div class='d-flex justify-content-between flex-wrap align-items-center mb-1'>" +
      "<div class='item-badges'> " +
      "<div class='badge badge-pill badge-light-" +
      color +
      "'> " +
      text +
      '</div>' +
      '</div>' +
      renderDropdown() +
      '</div>'
    );
  }

  // Render avatar
  function renderAvatar(images, pullUp, margin, members, size) {
    var $transition = pullUp ? ' pull-up' : '',
      member = members !== undefined ? members.split(',') : '';

    return images !== undefined
      ? images
          .split(',')
          .map(function (img, index, arr) {
            var $margin = margin !== undefined && index !== arr.length - 1 ? ' mr-' + margin + '' : '';

            return (
              "<li class='avatar kanban-item-avatar" +
              ' ' +
              $transition +
              ' ' +
              $margin +
              "'" +
              "data-toggle='tooltip' data-placement='top'" +
              "title='" +
              member[index] +
              "'" +
              '>' +
              "<img src='" +
              assetPath +
              'images/portrait/small/' +
              img +
              "' alt='Avatar' height='" +
              size +
              "'>" +
              '</li>'
            );
          })
          .join(' ')
      : '';
  }

  // Render footer
  function renderFooter(attachments, comments, assigned, members) {
    return (
      "<div class='d-flex justify-content-between align-items-center flex-wrap mt-1'>" +
      "<div> <span class='align-middle mr-50'>" +
      feather.icons['paperclip'].toSvg({ class: 'font-medium-1 align-middle mr-25' }) +
      "<span class='attachments align-middle'>" +
      attachments +
      '</span>' +
      "</span> <span class='align-middle'>" +
      feather.icons['message-square'].toSvg({ class: 'font-medium-1 align-middle mr-25' }) +
      '<span>' +
      comments +
      '</span>' +
      '</span></div>' +
      "<ul class='avatar-group mb-0'>" +
      renderAvatar(assigned, true, 0, members, 28) +
      '</ul>' +
      '</div>'
    );
  }

  // Init kanban
  var kanban = new jKanban({
    element: '.kanban-wrapper',
    gutter: '15px',
    widthBoard: '250px',
    dragItems: true,
    boards: boards,
    dragBoards: true,
    addItemButton: true,
    itemAddOptions: {
      enabled: true, // add a button to board for easy item creation
      content: '+ Add New Item', // text or html content of the board button
      class: 'kanban-title-button btn btn-default btn-xs', // default class of the button
      footer: false // position the button on footer
    },
    click: function (el) {
      var el = $(el);
      var title = el.attr('data-eid') ? el.find('.kanban-text').text() : el.text(),
        date = el.attr('data-due-date'),
        dateObj = new Date(),
        year = dateObj.getFullYear(),
        dateToUse = date
          ? date + ', ' + year
          : dateObj.getDate() +
            ' ' +
            dateObj.toLocaleString('en', {
              month: 'long'
            }) +
            ', ' +
            year,
        label = el.attr('data-badge-text'),
        avatars = el.attr('data-assigned');

      if (el.find('.kanban-item-avatar').length) {
        el.find('.kanban-item-avatar').on('click', function (e) {
          e.stopPropagation();
        });
      }
      if (!$('.dropdown').hasClass('show') && openSidebar) {
        sidebar.modal('show');
      }
      sidebar.find('.update-item-form').on('submit', function (e) {
        e.preventDefault();
      });
      sidebar.find('#title').val(title);
      sidebar.find(datePicker).next('.form-control').val(dateToUse);
      sidebar.find(select2).val(label).trigger('change');
      sidebar.find('.assigned').empty();
      sidebar
        .find('.assigned')
        .append(
          renderAvatar(avatars, false, '50', el.attr('data-members'), 32) +
            "<li class='avatar avatar-add-member ml-50'>" +
            "<span class='avatar-content'>" +
            feather.icons['plus'].toSvg({ class: 'avatar-icon' }) +
            '</li>'
        );
    },
    buttonClick: function (el, boardId) {
      var addNew = document.createElement('form');
      addNew.setAttribute('class', 'new-item-form');
      addNew.innerHTML =
        '<div class="form-group mb-1">' +
        '<textarea class="form-control add-new-item" rows="2" placeholder="Add Content" required></textarea>' +
        '</div>' +
        '<div class="form-group mb-2">' +
        '<button type="submit" class="btn btn-primary btn-sm mr-1">Add</button>' +
        '<button type="button" class="btn btn-outline-secondary btn-sm cancel-add-item">Cancel</button>' +
        '</div>';
      kanban.addForm(boardId, addNew);
      addNew.querySelector('textarea').focus();
      addNew.addEventListener('submit', function (e) {
        e.preventDefault();
        var currentBoard = $(".kanban-board[data-id='" + boardId + "']");
        kanban.addElement(boardId, {
          title: "<span class='kanban-text'>" + e.target[0].value + '</span>',
          id: boardId + '-' + currentBoard.find('.kanban-item').length + 1
        });

        currentBoard.find('.kanban-item:last-child .kanban-text').before(renderDropdown());
        addNew.remove();
      });
      $(document).on('click', '.cancel-add-item', function () {
        $(this).closest(addNew).toggle();
      });
    },
    dragEl: function (el, source) {
      $(el).find('.item-dropdown, .item-dropdown .dropdown-menu.show').removeClass('show');
    }
  });

  if (kanbanWrapper.length) {
    new PerfectScrollbar(kanbanWrapper[0]);
  }

  // Render add new inline with boards
  $('.kanban-container').append(addNewForm);

  // Change add item button to flat button
  $.each($('.kanban-title-button'), function () {
    $(this).removeClass().addClass('kanban-title-button btn btn-flat-secondary btn-sm ml-50');
    Waves.init();
    Waves.attach("[class*='btn-flat-']");
  });

  // Makes kanban title editable
  $(document).on('mouseenter', '.kanban-title-board', function () {
    $(this).attr('contenteditable', 'true');
  });

  // Appends delete icon with title
  $.each($('.kanban-board-header'), function () {
    $(this).append(renderBoardDropdown());
  });

  // Deletes Board
  $(document).on('click', '.delete-board', function () {
    var id = $(this).closest('.kanban-board').data('id');
    kanban.removeBoard(id);
  });

  // Delete task
  $(document).on('click', '.dropdown-item.delete-task', function () {
    openSidebar = true;
    var id = $(this).closest('.kanban-item').data('eid');
    kanban.removeElement(id);
  });

  // Open/Cancel add new input
  $('.add-new-btn, .cancel-add-new').on('click', function () {
    addNewInput.toggle();
  });

  // Add new board
  addNewForm.on('submit', function (e) {
    e.preventDefault();
    var $this = $(this),
      value = $this.find('.form-control').val(),
      id = value.replace(/\s+/g, '-').toLowerCase();
    kanban.addBoards([
      {
        id: id,
        title: value
      }
    ]);
    // Adds delete board option to new board & updates data-order
    $('.kanban-board:last-child').find('.kanban-board-header').append(renderBoardDropdown());

    // Remove current append new add new form
    addNewInput.val('').css('display', 'none');
    $('.kanban-container').append(addNewForm);

    // Update class & init waves
    $.each($('.kanban-title-button'), function () {
      $(this).removeClass().addClass('kanban-title-button btn btn-flat-secondary btn-sm ml-50');
      Waves.init();
      Waves.attach("[class*='btn-flat-']");
    });
  });

  // Clear comment editor on close
  sidebar.on('hidden.bs.modal', function () {
    sidebar.find('.ql-editor')[0].innerHTML = '';
    sidebar.find('.nav-link-activity').removeClass('active');
    sidebar.find('.tab-pane-activity').removeClass('show active');
    sidebar.find('.nav-link-update').addClass('active');
    sidebar.find('.tab-pane-update').addClass('show active');
  });

  // Re-init tooltip when modal opens(Bootstrap bug)
  sidebar.on('shown.bs.modal', function () {
    $('[data-toggle="tooltip"]').tooltip();
  });

  $('.update-item-form').on('submit', function (e) {
    e.preventDefault();
    sidebar.modal('hide');
  });

  // Render custom items
  $.each($('.kanban-item'), function () {
    var $this = $(this),
      $text = "<span class='kanban-text'>" + $this.text() + '</span>';
    if ($this.attr('data-badge') !== undefined && $this.attr('data-badge-text') !== undefined) {
      $this.html(renderHeader($this.attr('data-badge'), $this.attr('data-badge-text')) + $text);
    }
    if (
      $this.attr('data-comments') !== undefined ||
      $this.attr('data-due-date') !== undefined ||
      $this.attr('data-assigned') !== undefined
    ) {
      $this.append(
        renderFooter(
          $this.attr('data-attachments'),
          $this.attr('data-comments'),
          $this.attr('data-assigned'),
          $this.attr('data-members')
        )
      );
    }
    if ($this.attr('data-image') !== undefined) {
      $this.html(
        renderHeader($this.attr('data-badge'), $this.attr('data-badge-text')) +
          "<img class='img-fluid rounded mb-50' src='" +
          assetPath +
          'images/slider/' +
          $this.attr('data-image') +
          "' height='32'/>" +
          $text +
          renderFooter(
            $this.attr('data-due-date'),
            $this.attr('data-comments'),
            $this.attr('data-assigned'),
            $this.attr('data-members')
          )
      );
    }
    $this.on('mouseenter', function () {
      $this.find('.item-dropdown, .item-dropdown .dropdown-menu.show').removeClass('show');
    });
  });

  if (updateItemSidebar.length) {
    updateItemSidebar.on('hidden.bs.modal', function () {
      updateItemSidebar.find('.custom-file-label').empty();
    });
  }
});
