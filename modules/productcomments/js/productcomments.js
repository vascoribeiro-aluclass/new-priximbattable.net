$(document).ready(function () {
    $('input.star').rating();
    $('.auto-submit-star').rating();

    $('.open-comment-form').fancybox({
        'hideOnContentClick': false
    });

    url_options = '?';

    if (typeof(productcomments_url_rewrite) !== 'undefined'){
        if (productcomments_url_rewrite == '0') {
            url_options = '&';
        }
    }

    $('button.usefulness_btn').click(function () {
        var id_product_comment = $(this).data('id-product-comment');
        var is_usefull = $(this).data('is-usefull');
        var parent = $(this).parent();

        $.ajax({
            url: productcomments_controller_url + url_options + 'rand=' + new Date().getTime(),
            data: {
                id_product_comment: id_product_comment,
                action: 'comment_is_usefull',
                value: is_usefull
            },
            type: 'POST',
            headers: {"cache-control": "no-cache"},
            success: function (result) {
                parent.fadeOut('slow', function () {
                    parent.remove();
                });
            }
        });
    });

    $('span.report_btn').click(function () {
        if (confirm(confirm_report_message)) {
            var idProductComment = $(this).data('id-product-comment');
            var parent = $(this).parent();

            $.ajax({
                url: productcomments_controller_url + url_options + 'rand=' + new Date().getTime(),
                data: {
                    id_product_comment: idProductComment,
                    action: 'report_abuse'
                },
                type: 'POST',
                headers: {"cache-control": "no-cache"},
                success: function (result) {
                    parent.fadeOut('slow', function () {
                        parent.remove();

                    });
                }
            });
        }
    });


    $('#comments-button').on("click", function(){
      console.log('asdasda');

      if($('#productCommentsBlock').is(":visible")){
       $("#productCommentsBlock").hide();
       $("#comments-button").html(
         'Voir LES AVIS <i class="fa fa-arrow-down rotate"></i>'
       );
     }else{

      if( $('#product_comments_block_tab').html().trim() === '') {
        $.ajax({
          type: "POST",
          url: productcomments_controller_url + url_options + 'action=show_comment&secure_key=' + secure_key + '&rand=' + new Date().getTime(),
          headers: {"cache-control": "no-cache"},
          data: { id_product: $("#product_page_product_id").val()},
          success:function(data){
            $("#product_comments_block_tab").html(data);
            $("#comments-button").html(
              'Fermer LES AVIS <i class="fa fa-arrow-up rotate"></i>'
            );
            $("#productCommentsBlock").show();
          }
        });
      }else{
        $("#comments-button").html(
          'Fermer LES AVIS <i class="fa fa-arrow-up rotate"></i>'
        );
        $("#productCommentsBlock").show();
      }
     }

   });


    $('#submitNewMessage').click(function (e) {
        // Kill default behaviour
        e.preventDefault();

        $.ajax({
            url: productcomments_controller_url + url_options + 'action=add_comment&secure_key=' + secure_key + '&rand=' + new Date().getTime(),
            data: $('#id_new_comment_form').serialize(),
            type: 'POST',
            headers: {"cache-control": "no-cache"},
            dataType: "json",
            success: function (data) {
                if (data.result) {
                    $.fancybox.close();
                    fancyChooseBox(moderation_active ? productcomment_added_moderation : productcomment_added);

                }
                else {
                    $('#new_comment_form_error ul').html('');
                    $.each(data.errors, function (index, value) {
                        $('#new_comment_form_error ul').append('<li>' + value + '</li>');
                    });
                    $('#new_comment_form_error').slideDown('slow');
                }
            }
        });
        return true;
    });
});

function fancyChooseBox(msg) {
    $('#new_comment_form_ok').html(msg).show();
    $('#new_comment_form_ok').fadeOut(5000);
}


function productcommentRefreshPage() {
    window.location.reload();
}
