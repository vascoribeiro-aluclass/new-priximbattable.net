$(document).ready(function() {
  $("#select_category_id").load("php/ajax.php?action=getCategories");
  $("#btn_submit").attr("disabled", true);
  $("#btn_submit_one").attr("disabled", true);
});

$("#select_category_id").on("change", function() {
  const value = $("#select_category_id").val();

  if (value) {
    $("#select_subcategory_id").load("php/ajax.php?action=getSubCategories&id_category="+value);
    $("#block_select_subcategory_id").show();
    $("#btn_submit").attr("disabled", true);
  } else {
    $("#select_subcategory_id").val($("#select_subcategory_id option:first").val());
    $("#block_select_subcategory_id").hide();
  }
 
});

$("#select_subcategory_id").on("change", function() {
  const category_id = $("#select_category_id").val();
  const subcategory_id = $("#select_subcategory_id").val();

  if (category_id && subcategory_id) {
    $("#btn_submit").removeAttr("disabled");
  } else {
    $("#btn_submit").attr("disabled", true);
  }
});

$("#btn_submit").on("click", async function() {
  $("#specific_product_id").val("");
  $("#log").html("");
  
  const text = $(this).html();
  $(this).html("Processando...");

  const subcategory_id = $("#select_subcategory_id").val();
  
  await $.ajax({
    url: 'php/ajax.php',
    type: 'GET',
    data: 'action=exportDescriptions&subcategory_id='+subcategory_id,
    success: function(data) {
      $("#log").append(data)

      var objDiv = document.getElementById("log");
      objDiv.scrollTop = objDiv.scrollHeight;
    }
  });

  $(this).html(text);
});

$("#specific_product_id").on("keyup", function() {
  if ($(this).val().length > 0) {
    $("#btn_submit_one").removeAttr("disabled");
  } else {
    $("#btn_submit_one").attr("disabled", true);
  }
});

$("#btn_submit_one").on("click", async function() {
  $("#select_subcategory_id option:first").val();
  $("#log").html("");

  const text = $(this).html();
  $(this).html("Processando...");

  const product_id = $("#specific_product_id").val();
  
  await $.ajax({
    url: 'php/ajax.php',
    type: 'GET',
    data: 'action=exportOneDescription&product_id='+product_id,
    success: function(data) {
      $("#log").append(data)

      var objDiv = document.getElementById("log");
      objDiv.scrollTop = objDiv.scrollHeight;
    }
  });

  $(this).html(text);
});