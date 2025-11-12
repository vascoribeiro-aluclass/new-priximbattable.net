// novo menu
$(".alumenu a.alumenu-item").mouseover(function() {
  const target = $(this).data("target");

  $(".alumenu a.alumenu-item.active").each(function() {
    const otherTargets = $(this).data("target");
    if (otherTargets !== target) {
      $(".alumenu-item").removeClass("active");
      $(".alumenu-sub-item").addClass("hide-block");
    }
  });

  $(".alumenu-item[data-target='"+target+"']").addClass("active");
  $(".alumenu-overlay").removeClass("hide-block");
  $("#"+target).removeClass("hide-block");
});

$(".alumenu").mouseleave(function() {
  $(".alumenu-item").removeClass("active");
  $(".alumenu-overlay").addClass("hide-block");
  $(".alumenu-sub-item").addClass("hide-block");
});

$("#alumenu-mobile .load").click(function() {
  if ($("#alumenu-mobile .items-menu").css("left") == "-250px") {
    $("#alumenu-mobile .items-menu").animate({left:'0'}, {queue: false, duration: 250});
  } else {
    $("#alumenu-mobile .items-menu").animate({left:'-250px'}, {queue: false, duration: 250});
  }

  $(".alumenu-mobile-sub-item.open-sub-item").each(function() {
    $(this).removeClass("open-sub-item");
  });
});

$("#alumenu-mobile .items-menu .close-menu").click(function() {
  if ($("#alumenu-mobile .items-menu").css("left") == "-250px") {
    $("#alumenu-mobile .items-menu").animate({left:'0'}, {queue: false, duration: 250});
  } else {
    $("#alumenu-mobile .items-menu").animate({left:'-250px'}, {queue: false, duration: 250});
  }

  $(".alumenu-mobile-sub-item.open-sub-item").each(function() {
    $(this).removeClass("open-sub-item");
  });
});

$("#alumenu-mobile .item-menu").click(function() {
  const target = $(this).data("target");

  $(".alumenu-mobile-sub-item.open-sub-item").each(function() {
    if(target != $(this).attr('id')){
      $(this).removeClass("open-sub-item");
    }
  });

  if ($("#"+target+".open-sub-item").length) {
    $("#"+target).removeClass("open-sub-item");
  }else{
    $("#"+target).addClass("open-sub-item");
  }
});

if (navigator.userAgent.match(/Mobile|Windows Phone|Lumia|Android|webOS|iPhone|iPod|Blackberry|PlayBook|BB10|Opera Mini|\bCrMo\/|Opera Mobi/i)) {
} else {
  $(window).scroll(function () {
    if ($("#alumenu").length == 1 && $("#wrapper").length == 1) {
      var pos1pro = $(window).scrollTop();
      var pos2pro = $("#wrapper").offset().top;
      if (pos1pro > pos2pro-50) {
        $("#alumenu").addClass("alu-menu-scroll");
      } else {
        $("#alumenu").removeClass("alu-menu-scroll");
      }
    }
  });
}
