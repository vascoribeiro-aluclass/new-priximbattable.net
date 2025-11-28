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
    /**
     * Chat Message Handling
     */
    
    // Function to send chat messages via AJAX
    function sendChatMessage(message, history) {
        $.ajax({
            url: ajaxChatUrl, // Defined via PHP's Media::addJsDef
            type: "POST",
            dataType: "json",
            data: {
                ajax: true,
                action: "message",
                message: message,
                history: history,
                token: ajaxChatToken // Defined via PHP's Media::addJsDef
            },
            success: function(response) {
                if (response.answer) {
                    // Display the AI's response in the chat interface
                    displayChatResponse(response.answer);
                } else if (response.error) {
                    alert("Error: " + response.error);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
                alert("An error occurred while sending your message.");
            }
        });
    }

    // Example event listener for chat message submission
    $("#chatSubmitButton").on("click", function(e) {
        e.preventDefault();
        var message = $("#chatInput").val();
        var history = getChatHistory(); // Implement this function based on your chat history management

        if (message.trim() === "") {
            alert("Please enter a message.");
            return;
        }

        sendChatMessage(message, history);
        $("#chatInput").val(""); // Clear the input field
    });
});