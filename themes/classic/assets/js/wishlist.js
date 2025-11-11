function getdetailproductShow(idcart) {
  var currentLocation = window.location.hostname;
  currentLocation = "https://" + currentLocation + "/liste-de-souhaits?ajax=1&action=detailproductshow";


  $.ajax({
    type: "POST",
    url: currentLocation,
    data: {
      action: "detailproductshow",
      idcart: idcart,
    },
    success: function (data) {
      $("#cart_historic_modal_body").html(data['wishlist_detail']);
      $('#cart_historic_modal_wrapper').modal('show');
    },
  });

}

function removeProductWishList(idproduct) {
  var currentLocation = window.location.hostname;
  currentLocation = "https://" + currentLocation + "/liste-de-souhaits?ajax=1&action=deleteproductwish";

  $.ajax({
    type: "POST",
    url: currentLocation,
    data: {
      action: "deleteproductwish",
      idproduct: idproduct,
    },
    success: function (data) {
      $('#modalinfomessage').html('Produit supprimé avec succès de la liste de souhaits.');
      $('#modalinfo').modal('show');
      $('#productwishlist'+idproduct).remove();
    },
  });

}

function ShareProductLink(linkproduct,nameproduct) {
  $("#name_linkproduct").val('');
  $("#mail_linkproduct").val('');

  $(".bodypartagerproduct").show();
  $(".bodypartagerproductmessage").hide();

  $("#linkproduct").val(linkproduct);
  $("#nomproduct").val(nameproduct);
  $("#modalEmbedlinkproduct").modal("show");

  return false;
}
function SendShareProductLink(){
  console.log('asdasdas dd');
   var currentLocation = window.location.hostname;
  currentLocation = "https://" + currentLocation + "/liste-de-souhaits?ajax=1&action=sendmailproduct";

  $("#warning_name_linkproduct").html("");
  $("#warning_mail_linkproduct").html("");

  name_linkproduct = $("#name_linkproduct").val();
  mail_linkproduct = $("#mail_linkproduct").val();
  nomproduct = $("#nomproduct").val();

  linkproduct = $("#linkproduct").val();

  var info = "<i>Il manque une information obligatoire!</i>";

  if (name_linkproduct == "") {
    $("#warning_name_linkcproduct").html(info);
    return false;
  }
  if (mail_linkproduct == "") {
    $("#warning_mail_linkproduct").html(info);
    return false;
  }
  $(".bodypartagerproductmessage").html('<span>A envoyer email...</span>');
  $(".bodypartagerproduct").hide();
  $(".bodypartagerproductmessage").show();


  $.ajax({
    type: "POST",
    url: currentLocation,
    data: {
      action: "sendmailproduct",
      linkproduct: linkproduct,
      nomproduct : nomproduct,
      mail_linkcart: mail_linkproduct,
      name_linkcart: name_linkproduct,
    },
    success: function (data) {
      $(".bodypartagerproductmessage").show();
      $(".bodypartagerproductmessage").html('<span>Email envoyé avec succès.</span>');
    },
  });
}


function CloseLinkProductModal(){
  $("#modalEmbedlinkproduct").modal("hide");
  return false;
}
