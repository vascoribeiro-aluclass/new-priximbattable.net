/**
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 * We offer the best and most useful modules PrestaShop and modifications for your online store.
 *
 * @author    Carlos Ucha
 * @copyright 2010-2100 Carlos Ucha
 * @license   see file: LICENSE.txt
 * This program is not free software and you can't resell and redistribute it
 *
 * CONTACT WITH DEVELOPER
 * carlosucha92@gmail.com
 */

jQuery(document).ready(function($) {
  var $chatbox = $('#chatbox');
  var $chatboxContent = $('#chatbox-content');
  var $chatboxMessages = $('#chatbox-messages');
  var $chatboxInput = $('#chatbox-input-text');
  var $chatboxSendButton = $('#chatbox-send-button');
  var $chatboxToggleButton = $('#chatbox-toggle');
  var $chatbotName = $('#chatbotName').val();
  var $customerName = $('#customerName').val();
  var acceptButton = document.getElementById('accept-button');
  var sendButton = document.getElementById('chatbox-send-button');

  var isAcceptButtonSelected = false;

  $chatboxToggleButton.click(function() {
    $chatbox.toggleClass('chatbox-closed');
    $chatbox.toggleClass('open');
  });

  $chatboxSendButton.click(sendUserMessage);

  function sendUserMessage() {
        var userMessage = $chatboxInput.val().trim(); // Remove leading/trailing spaces
        if (!userMessage) { // Check if message is not empty
            return; // Don't proceed if the message is empty
        }

        // Ensure userMessage is safe from XSS attacks
        userMessage = $("<div>").text(userMessage).html();

        sendMessage(userMessage, $customerName);
        $chatboxInput.val('');

        makeAjaxRequest(userMessage, $('#conversationHistory').val());
    }

  function makeAjaxRequest(userMessage, history) {
    $('#waiting-dots').show();
    $.ajax({
      url: prestashop.urls.base_url + 'index.php?fc=module&module=gptchatbox&controller=ajax',
      type: 'POST',
      dataType: 'json',
      data: {
        message: userMessage,
        history: history,
      },
      success: function(response) {
        var answer = response.answer;
        var conversationHistoryJSON = response.conversationHistoryJSON;

        //debug history
        //console.log("Updated conversation history:", conversationHistoryJSON);
        $('#conversationHistory').val(conversationHistoryJSON);

        sendMessage(answer, $chatbotName);
        $('#waiting-dots').hide();

      },
      error: function(xhr, status, error) {
        if (xhr.status === 200) {
          // Successful AJAX request, but server returned an error
          var errorMessage = 'OpenIA error: ' + xhr.responseText;
          // Handle the error message appropriately
          // ...
        } else {
          // Other AJAX errors (e.g., network error, timeout)
          var errorMessage = 'AJAX request error. Status: ' + xhr.status + ', Error: ' + error;
          // Handle the error message appropriately
          // ...
        }
        sendMessage(errorMessage, 'chatbot-error');
        $('#waiting-dots').hide();
      }
    });
  }

  function sendMessage(message, sender) {
      try {
        var $messageElement = $('<div></div>').addClass('message');
        message = message.replace(/\n/g, '<br />');

        if (sender === $customerName) {
            //the message is from the user
          $messageElement.html('<span class="customername">' + $customerName + '</span>: ' + message);
          $messageElement.addClass("user");
        } else {
            //message from the chatbot
          //var messageWithLinks = '<span class="chatbotname">' + $chatbotName + '</span>: ' + message;
          var messageWithLinks = markdownToHtml('<span class="chatbotname">' + $chatbotName + '</span>: ' + message);
          $messageElement.html(messageWithLinks);
          $messageElement.addClass("response");
          if(sender === 'chatbot-error'){
              $messageElement.addClass("chatbot-error");
          }
        }

        $chatboxMessages.append($messageElement);

        scrollToLatestMessage();

      } catch (error) {
        console.error('An error occurred while sending the message:', error);
      }
    }

  $('#chatbox-input').keydown(function(event) {
    if (event.keyCode === 13) { // Check if Enter key was pressed (key code 13)
      event.preventDefault(); // Prevent the default Enter key behavior (e.g., form submission)

      // Trigger the send button click event
      if ($("#accept-button").length == 0 || $("#accept-button").hasClass('btn-selected')) {
            $('#chatbox-send-button').click();
        }
    }
  });

    $('#accept-button').click(function() {
        $('#chatbox-send-button').removeAttr('disabled').removeClass('disabled');
        $(this).addClass('btn-selected');
        $('#decline-button').removeClass('btn-selected');
        $(this).hide();
        isAcceptButtonSelected = true;
    });

    // Optional: When the decline button is clicked, add the 'disabled' attribute back to the send button.
    $('#decline-button').click(function() {
        $('#chatbox-send-button').attr('disabled', 'disabled').addClass('disabled');
        $(this).addClass('btn-selected');
        $('#accept-button').removeClass('btn-selected');

        isAcceptButtonSelected = false;
    });

});

function linkify(inputText) {
    return inputText
        .replace(/\[([^\]]+)\]\((https?:\/\/[^\s)]+)\)/g, '<a href="$2" target="_blank">$1</a>')
}

function markdownToHtml(inputText) {
    return inputText
        .replace(/\[([^\]]+)\]\((https?:\/\/[^\s)]+)\)/g, '<a href="$2" target="_blank">$1</a>')
        .replace(/\*\*\s?([^*]+?)\s?\*\*/g, '<strong>$1</strong>')
        .replace(/\*\*\*\s?([^*]+?)\s?\*\*\*/g, '<strong><em>$1</em></strong>')
        .replace(/\*\s?([^*]+?)\s?\*/g, '<em>$1</em>');
}

function scrollToLatestMessage() {
  const chatboxMessages = document.getElementById('chatbox-messages');
  const lastMessage = chatboxMessages.querySelector('.message:last-of-type');

  // Scroll to the last message
  lastMessage.scrollIntoView();
}



function sendInfoClientChatbox() {
  const emailRegex = /\S+@\S+\.\S+/;

  $("#warning_name_chatbox").html("");
  $("#warning_mail_chatbox").html("");
  $("#warning_phone_chatbox").html("");

  var name_chatbox = $("#last_name_chatbox").val();
  var email_chatbox = $("#email_chatbox").val();
  var phone_chatbox = $("#phone_chatbox").val();
  var chatbox_contacted = $("#chatbox_contacted").is(":checked");


  var info = "<i>Il manque une information obligatoire!</i>";

  if (name_chatbox == "") {
    $("#warning_name_chatbox").html(info);
    return false;
  }
  if (email_chatbox == "") {
    $("#warning_mail_chatbox").html(info);
    return false;
  }

  if (phone_chatbox == "") {
    $("#warning_phone_chatbox").html(info);
    return false;
  }

  if (!emailRegex.test(email_chatbox)) {
    $("#warning_mail_chatbox").html("<i>Email invalide!</i>");
    return false;
  }

  $("#last_name_chatbox").val("");
  $("#email_chatbox").val("");
  $("#phone_chatbox").val("");

  $.ajax({
    url: prestashop.urls.base_url + 'index.php?fc=module&module=gptchatbox&controller=ajaxmk',
    type: 'POST',
    dataType: 'json',
    data: {
      name_chatbox: name_chatbox,
      email_chatbox: email_chatbox,
      phone_chatbox: phone_chatbox,
      chatbox_contacted: chatbox_contacted,
    },
    success: function(response) {
      console.log(response);
      if(response.status = 'success'){
         $("#chatbox-form").hide();
      }
    }
  });
}
