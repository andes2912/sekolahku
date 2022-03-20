/*=========================================================================================
    File Name: app-chat.js
    Description: Chat app js
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

'use strict';

$(function () {
  var chatUsersListWrapper = $('.chat-application .chat-user-list-wrapper'),
    overlay = $('.body-content-overlay'),
    profileSidebar = $('.chat-application .chat-profile-sidebar'),
    profileSidebarArea = $('.chat-application .profile-sidebar-area'),
    profileToggle = $('.chat-application .sidebar-profile-toggle'),
    userProfileToggle = $('.chat-application .user-profile-toggle'),
    userProfileSidebar = $('.user-profile-sidebar'),
    statusRadio = $('.chat-application .user-status input:radio[name=userStatus]'),
    userChats = $('.user-chats'),
    chatsUserList = $('.chat-users-list'),
    chatList = $('.chat-list'),
    contactList = $('.contact-list'),
    sidebarContent = $('.sidebar-content'),
    closeIcon = $('.chat-application .close-icon'),
    sidebarCloseIcon = $('.chat-application .sidebar-close-icon'),
    menuToggle = $('.chat-application .menu-toggle'),
    speechToText = $('.speech-to-text'),
    chatSearch = $('.chat-application #chat-search');

  // init ps if it is not touch device
  if (!$.app.menu.is_touch_device()) {
    // Chat user list
    if (chatUsersListWrapper.length > 0) {
      var chatUserList = new PerfectScrollbar(chatUsersListWrapper[0]);
    }

    // Admin profile left
    if (userProfileSidebar.find('.user-profile-sidebar-area').length > 0) {
      var userScrollArea = new PerfectScrollbar(userProfileSidebar.find('.user-profile-sidebar-area')[0]);
    }

    // Chat area
    if (userChats.length > 0) {
      var chatsUser = new PerfectScrollbar(userChats[0], {
        wheelPropagation: false
      });
    }

    // User profile right area
    if (profileSidebarArea.length > 0) {
      var user_profile = new PerfectScrollbar(profileSidebarArea[0]);
    }
  } else {
    chatUsersListWrapper.css('overflow', 'scroll');
    userProfileSidebar.find('.user-profile-sidebar-area').css('overflow', 'scroll');
    userChats.css('overflow', 'scroll');
    profileSidebarArea.css('overflow', 'scroll');

    // on user click sidebar close in touch devices
    $(chatsUserList)
      .find('li')
      .on('click', function () {
        $(sidebarContent).removeClass('show');
        $(overlay).removeClass('show');
      });
  }

  // Chat Profile sidebar & overlay toggle
  if (profileToggle.length) {
    profileToggle.on('click', function () {
      profileSidebar.addClass('show');
      overlay.addClass('show');
    });
  }

  // Update status by clicking on Radio
  if (statusRadio.length) {
    statusRadio.on('change', function () {
      var $className = 'avatar-status-' + this.value,
        profileHeaderAvatar = $('.header-profile-sidebar .avatar span');
      profileHeaderAvatar.removeClass();
      profileToggle.find('.avatar span').removeClass();
      profileHeaderAvatar.addClass($className + ' avatar-status-lg');
      profileToggle.find('.avatar span').addClass($className);
    });
  }

  // On Profile close click
  if (closeIcon.length) {
    closeIcon.on('click', function () {
      profileSidebar.removeClass('show');
      userProfileSidebar.removeClass('show');
      if (!sidebarContent.hasClass('show')) {
        overlay.removeClass('show');
      }
    });
  }

  // On sidebar close click
  if (sidebarCloseIcon.length) {
    sidebarCloseIcon.on('click', function () {
      sidebarContent.removeClass('show');
      overlay.removeClass('show');
    });
  }

  // User Profile sidebar toggle
  if (userProfileToggle.length) {
    userProfileToggle.on('click', function () {
      userProfileSidebar.addClass('show');
      overlay.addClass('show');
    });
  }

  // On overlay click
  if (overlay.length) {
    overlay.on('click', function () {
      sidebarContent.removeClass('show');
      overlay.removeClass('show');
      profileSidebar.removeClass('show');
      userProfileSidebar.removeClass('show');
    });
  }

  // Add class active on click of Chat users list
  if (chatUsersListWrapper.find('ul li').length) {
    chatUsersListWrapper.find('ul li').on('click', function () {
      var $this = $(this),
        startArea = $('.start-chat-area'),
        activeChat = $('.active-chat');

      if (chatUsersListWrapper.find('ul li').hasClass('active')) {
        chatUsersListWrapper.find('ul li').removeClass('active');
      }

      $this.addClass('active');
      $this.find('.badge').remove();

      if (chatUsersListWrapper.find('ul li').hasClass('active')) {
        startArea.addClass('d-none');
        activeChat.removeClass('d-none');
      } else {
        startArea.removeClass('d-none');
        activeChat.addClass('d-none');
      }
    });
  }

  // auto scroll to bottom of Chat area
  chatsUserList.find('li').on('click', function () {
    userChats.animate({ scrollTop: userChats[0].scrollHeight }, 400);
  });

  // Main menu toggle should hide app menu
  if (menuToggle.length) {
    menuToggle.on('click', function (e) {
      sidebarContent.removeClass('show');
      overlay.removeClass('show');
      profileSidebar.removeClass('show');
      userProfileSidebar.removeClass('show');
    });
  }

  // Chat sidebar toggle
  if ($(window).width() < 991) {
    onClickFn();
  }

  // Filter
  if (chatSearch.length) {
    chatSearch.on('keyup', function () {
      var value = $(this).val().toLowerCase();
      if (value !== '') {
        // filter chat list
        chatList.find('li:not(.no-results)').filter(function () {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
        // filter contact list
        contactList.find('li:not(.no-results)').filter(function () {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
        var chat_tbl_row = chatList.find('li:not(.no-results):visible').length,
          contact_tbl_row = contactList.find('li:not(.no-results):visible').length;

        // check if chat row available
        if (chat_tbl_row == 0) {
          chatList.find('.no-results').addClass('show');
        } else {
          if (chatList.find('.no-results').hasClass('show')) {
            chatList.find('.no-results').removeClass('show');
          }
        }

        // check if contact row available
        if (contact_tbl_row == 0) {
          contactList.find('.no-results').addClass('show');
        } else {
          if (contactList.find('.no-results').hasClass('show')) {
            contactList.find('.no-results').removeClass('show');
          }
        }
      } else {
        // If filter box is empty
        chatsUserList.find('li').show();
        if (chatUsersListWrapper.find('.no-results').hasClass('show')) {
          chatUsersListWrapper.find('.no-results').removeClass('show');
        }
      }
    });
  }

  if (speechToText.length) {
    // Speech To Text
    var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
    if (SpeechRecognition !== undefined && SpeechRecognition !== null) {
      var recognition = new SpeechRecognition(),
        listening = false;
      speechToText.on('click', function () {
        var $this = $(this);
        recognition.onspeechstart = function () {
          listening = true;
        };
        if (listening === false) {
          recognition.start();
        }
        recognition.onerror = function (event) {
          listening = false;
        };
        recognition.onresult = function (event) {
          $this.closest('.form-send-message').find('.message').val(event.results[0][0].transcript);
        };
        recognition.onspeechend = function (event) {
          listening = false;
          recognition.stop();
        };
      });
    }
  }
});

// Window Resize
$(window).on('resize', function () {
  if ($(window).width() > 992) {
    if ($('.chat-application .body-content-overlay').hasClass('show')) {
      $('.app-content .sidebar-left').removeClass('show');
      $('.chat-application .body-content-overlay').removeClass('show');
    }
  }

  // Chat sidebar toggle
  if ($(window).width() < 991) {
    onClickFn();
    if (
      !$('.chat-application .chat-profile-sidebar').hasClass('show') ||
      !$('.chat-application .sidebar-content').hasClass('show')
    ) {
      $('.sidebar-content').removeClass('show');
      $('.body-content-overlay').removeClass('show');
    }
  }
});

$(document).on('click', '.sidebar-toggle', function () {
  if ($(window).width() < 992) {
    onClickFn();
  }
});
function onClickFn() {
  var sidebarContent = $('.sidebar-content'),
    sidebarToggle = $('.sidebar-toggle'),
    overlay = $('.body-content-overlay');
  if (sidebarToggle.length) {
    sidebarContent.addClass('show');
    overlay.addClass('show');
  }
}

// Add message to chat - function call on form submit
function enterChat(source) {
  var message = $('.message').val();
  if (/\S/.test(message)) {
    var html = '<div class="chat-content">' + '<p>' + message + '</p>' + '</div>';
    $('.chat:last-child .chat-body').append(html);
    $('.message').val('');
    $('.user-chats').scrollTop($('.user-chats > .chats').height());
  }
}
