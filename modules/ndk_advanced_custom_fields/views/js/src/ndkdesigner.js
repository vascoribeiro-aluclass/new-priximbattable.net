/**
 *  Tous droits réservés NDKDESIGN
 *
 *  @author Hendrik Masson <postmaster@ndk-design.fr>
 *  @copyright Copyright 2013 - 2014 Hendrik Masson
 *  @license   Tous droits réservés
 */

$(document).on("click", ".addText", function (e) {
  e.preventDefault();
  maxlenght = $(this).attr("data-max");
  group = $(this).attr("data-group");
  zindex = $(this).attr("data-zindex");
  target = $(this).attr("data-id");
  view = $(this).attr("data-view");
  dragdrop = $(this).attr("data-dragdrop");
  resizeable = $(this).attr("data-resizeable");
  rotateable = $(this).attr("data-rotateable");
  price = $(this).attr("data-price");
  blend = $(this).attr("data-blend");
  ppcprice = $(this).attr("data-ppcprice");

  others = $(this).parent().find(".designer-item");
  number = others.length + 1;

  $(this).parent().find(".designer-item").slideUp();

  textItem =
    '<div class="designer-item-container"><h4 data-target="#item-' +
    group +
    "-" +
    parseInt(number) +
    '" id="toggler-' +
    group +
    "-" +
    parseInt(number) +
    '" class="itemToggler">' +
    designerTextText +
    "<span> " +
    parseInt(number) +
    '</span></h4><div id="item-' +
    group +
    "-" +
    parseInt(number) +
    '" class="designer-item clearfix clear" data-number="' +
    parseInt(number) +
    '">' +
    '<textarea id="text-item-' +
    group +
    "-" +
    number +
    '" data-lines="1" ' +
    'data-max="' +
    maxlenght +
    '" ' +
    'data-group="' +
    group +
    '" ' +
    'data-number="' +
    number +
    '" ' +
    'data-zindex="' +
    zindex +
    '" ' +
    'data-id="' +
    target +
    '" ' +
    'data-view="' +
    view +
    '" ' +
    'data-dragdrop="' +
    dragdrop +
    '" ' +
    'data-resizeable="' +
    resizeable +
    '" ' +
    'data-rotateable="' +
    rotateable +
    '" ' +
    'data-price="' +
    price +
    '" ' +
    'data-blend="' +
    blend +
    '" ' +
    'data-ppcprice="' +
    ppcprice +
    '" ' +
    'data-pattern="" ' +
    'class="form-control textzone ndktextarea textItem"></textarea>';

  if ($(this).parent().find(".orientation_selection").length > 0) {
    orientable_block = $(this).parent().find(".orientation_selection").html();
    textItem +=
      '<div data-group-target="' +
      group +
      "-" +
      parseInt(number) +
      '" class="clear clearfix orientation_selection">' +
      orientable_block +
      "</div>";
  }
  textItem +=
    '<a href="#" class="remove-item-block button btn pull-right btn-default button-small" data-group-target="' +
    group +
    "-" +
    parseInt(number) +
    '" data-group="' +
    group +
    '"><span>' +
    designerRemoveText +
    "</span></a></div></div>";

  textItem = $(this).parent().find(".itemsBlock").append(textItem);
  scrollToNdk(textItem, 800);
  initText($("#text-item-" + group + "-" + number));

  $("#ndkcsfield_" + group)
    .val(designerValue)
    .trigger("keyup");
  makeSortable();
});

$(document).on("click", ".addTextArea", function (e) {
  e.preventDefault();
  maxlenght = $(this).attr("data-max");
  group = $(this).attr("data-group");
  zindex = $(this).attr("data-zindex");
  target = $(this).attr("data-id");
  view = $(this).attr("data-view");
  dragdrop = $(this).attr("data-dragdrop");
  resizeable = $(this).attr("data-resizeable");
  rotateable = $(this).attr("data-rotateable");
  price = $(this).attr("data-price");
  ppcprice = $(this).attr("data-ppcprice");
  blend = $(this).attr("data-blend");

  others = $(this).parent().find(".designer-item");
  number = others.length + 1;

  $(this).parent().find(".designer-item").slideUp();

  textItem =
    '<div class="designer-item-container"><h4 data-target="#item-' +
    group +
    "-" +
    parseInt(number) +
    '" id="toggler-' +
    group +
    "-" +
    parseInt(number) +
    '" class="itemToggler">' +
    designerTextText +
    "<span> " +
    parseInt(number) +
    '</span></h4><div id="item-' +
    group +
    "-" +
    parseInt(number) +
    '" class="designer-item clearfix clear" data-number="' +
    parseInt(number) +
    '">' +
    '<textarea id="text-item-' +
    group +
    "-" +
    number +
    '" data-lines="1" ' +
    'data-max="' +
    maxlenght +
    '" ' +
    'data-group="' +
    group +
    '" ' +
    'data-number="' +
    number +
    '" ' +
    'data-zindex="' +
    zindex +
    '" ' +
    'data-id="' +
    target +
    '" ' +
    'data-view="' +
    view +
    '" ' +
    'data-dragdrop="' +
    dragdrop +
    '" ' +
    'data-resizeable="' +
    resizeable +
    '" ' +
    'data-rotateable="' +
    rotateable +
    '" ' +
    'data-price="' +
    price +
    '" ' +
    'data-ppcprice="' +
    ppcprice +
    '" ' +
    'data-blend="' +
    blend +
    '" ' +
    'data-pattern="" ' +
    'class="form-control textzone ndktextarea type_textarea textItem"></textarea>';

  if ($(this).parent().find(".orientation_selection").length > 0) {
    orientable_block = $(this).parent().find(".orientation_selection").html();
    textItem +=
      '<div data-group-target="' +
      group +
      "-" +
      parseInt(number) +
      '" class="clear clearfix orientation_selection">' +
      orientable_block +
      "</div>";
  }
  textItem +=
    '<a href="#" class="remove-item-block button btn pull-right btn-default button-small" data-group="' +
    group +
    '" data-group-target="' +
    group +
    "-" +
    parseInt(number) +
    '"><span>' +
    designerRemoveText +
    "</span></a></div></div>";
  textItem = $(this).parent().find(".itemsBlock").append(textItem);
  scrollToNdk(textItem, 800);
  initText($("#text-item-" + group + "-" + number));
  $("#ndkcsfield_" + group)
    .val(designerValue)
    .trigger("keyup");
  makeSortable();
});

$(document).on("click", ".addImg", function (e) {
  e.preventDefault();

  group = $(this).attr("data-group");
  zindex = $(this).attr("data-zindex");
  target = $(this).attr("data-id");
  view = $(this).attr("data-view");
  dragdrop = $(this).attr("data-dragdrop");
  resizeable = $(this).attr("data-resizeable");
  rotateable = $(this).attr("data-rotateable");
  price = $(this).attr("data-price");
  blend = $(this).attr("data-blend");

  others = $(this).parent().find(".designer-item");
  number = others.length + 1;

  clonedUpload = $(this).parent().find(".ndkhiddenuploadfile").clone();
  clonedUpload.removeClass("ndkhiddenuploadfile").addClass("imgItem");
  clonedUpload.find(".img-value").attr("data-group", group + "-" + number);

  clonedLibrary = $(this).parent().find(".ndkhiddenimglibrary").clone();
  clonedLibrary
    .removeClass("ndkhiddenimglibrary")
    .addClass("imgItem")
    .attr("id", "main-" + group + "-" + number);
  clonedLibrary.find(".img-value").attr("data-group", group + "-" + number);

  $(this).parent().find(".designer-item").slideUp();

  imgItem =
    '<div class="designer-item-container"><h4 id="toggler-' +
    group +
    "-" +
    parseInt(number) +
    '"  data-target="#item-' +
    group +
    "-" +
    parseInt(number) +
    '" class="itemToggler">' +
    designerImgText +
    "<span> " +
    parseInt(number) +
    '</span></h4><div id="item-' +
    group +
    "-" +
    parseInt(number) +
    '" class="designer-item clearfix clear" data-number="' +
    parseInt(number) +
    '">' +
    clonedUpload.html() +
    clonedLibrary.html();

  if ($(this).parent().find(".orientation_selection").length > 0) {
    orientable_block = $(this).parent().find(".orientation_selection").html();
    imgItem +=
      '<div data-group-target="' +
      group +
      "-" +
      parseInt(number) +
      '" class="clear clearfix orientation_selection">' +
      orientable_block +
      "</div>";
  }
  imgItem +=
    '<a href="#" class="remove-item-block button btn pull-right btn-default button-small"  data-group="' +
    group +
    '" data-group-target="' +
    group +
    "-" +
    parseInt(number) +
    '"><span>' +
    designerRemoveText +
    "</span></a></div></div>";
  imgItem = $(this).parent().find(".itemsBlock").append(imgItem);
  scrollToNdk(imgItem, 800);

  $("#ndkcsfield_" + group)
    .val(designerValue)
    .trigger("keyup");

  $(".ndk_selector").each(function () {
    $(this).setNdkSelector();
  });
  makeSortable();
});

$(document).on("click", ".itemToggler", function () {
  $($(this).attr("data-target")).slideToggle();
});

String.prototype.escape = function () {
  var tagsToReplace = {
    "&": "&amp;",
    "<": "&lt;",
    ">": "&gt;",
  };
  return this.replace(/[&<>]/g, function (tag) {
    return tagsToReplace[tag] || tag;
  });
};

$(document).on("click", ".submitTextItem", function () {
  group = parseInt(
    $(this).parent().parent().find(".ndktextarea:eq(0)").attr("data-group")
  );
  number = $(this).parent().parent().find(".ndktextarea").attr("data-number");
  zindex = $(this).parent().parent().find(".textzone").attr("data-zindex");
  price = $(this).parent().parent().find(".ndktextarea").attr("data-price");
  ppcprice = $(this)
    .parent()
    .parent()
    .find(".ndktextarea")
    .attr("data-ppcprice");
  blend = $(this).parent().parent().find(".ndktextarea").attr("data-blend");

  view = $(this).parent().parent().find(".ndktextarea").attr("data-view");

  dragdrop = $(this)
    .parent()
    .parent()
    .find(".ndktextarea")
    .attr("data-dragdrop");
  resizeable = $(this)
    .parent()
    .parent()
    .find(".ndktextarea")
    .attr("data-resizeable");
  rotateable = $(this)
    .parent()
    .parent()
    .find(".ndktextarea")
    .attr("data-rotateable");
  charsCount = 0;

  if ($(this).parent().find(".noborder").length > 0) {
    texte = "";
    $(this)
      .parent()
      .find(".noborder")
      .each(function () {
        if ($(this).val() != "") {
          texte += $(this).val() + " ";
          charsCount += $(this).val().replace(/\ /g, "").length;
        } else {
          //$(this).css('height', 0);
        }
      });
  } else {
    texte = $(this).parent().find(".textarea").text();
  }

  if (texte == "" || texte == " ") {
    price = 0;
    texte = "";
  } else if (ppcprice > 0) {
    price = ppcprice * charsCount;
  } else {
    price = $(this).parent().parent().find(".ndktextarea").attr("data-price");
  }

  $(this).parent().parent().find(".ndktextarea").val(texte).trigger("keyup");

  $(this)
    .parent()
    .find(".textarea")
    .css({ width: "auto", height: "auto", display: "table" });

  /*if(texte !='')
      $(this).parent().parent().find('.fontSelectUl li.active').trigger('click');*/

  if (texte == "" || texte == " ") {
    price = 0;
    texte = "";
  }

  verticalPadding = 10;
  horizontalPadding = 0;
  $(this).parent().find(".status_counter").hide();

  height =
    $(this).parent().find(".textarea").innerHeight() -
    parseFloat(verticalPadding);
  width =
    $(this).parent().find(".textarea").innerWidth() -
    parseFloat(horizontalPadding) -
    scrollbarWidth;
  //updatePriceNdk(price, group);
  $(".status_counter").hide();

  if (
    $(".zone_limit[data-group='" + group + "']").length > 0 &&
    $(".view_tab[data-view='" + view + "']").length > 0 &&
    $(this).parent().find("textarea.noborder").length > 0
  ) {
    container = ".zone_limit[data-group='" + group + "']";
    zwidth = $(container).width();
    zheight = $(container).height();
    $(this).parent().find(".textarea").css({ width: zwidth });
    width = zwidth;
  }

  svglines = "";
  fontSize = parseFloat($(this).parent().css("font-size"));
  alignment = $(this).parent().find(".texteditor").css("text-align");
  x = 10;
  txtanchord = 'text-anchor="start"';

  if (alignment == "left") {
    x = 10;
    txtanchord = 'text-anchor="start"';
  } else if (alignment == "center") {
    x = width / 2;
    txtanchord = 'text-anchor="middle"';
  } else if (alignment == "right") {
    x = width;
    txtanchord = 'text-anchor="end"';
  }

  if ($(this).parent().find("textarea.noborder").length > 0) {
    var lines = $(this).parent().find("textarea.noborder").val().split("\n");
    y = 1;
    for (var i = 0; i < lines.length; i++) {
      svglines +=
        "<tspan " +
        txtanchord +
        ' x="' +
        x +
        '" y="' +
        fontSize * y +
        '">' +
        lines[i].escape() +
        "</tspan>";
      y++;
    }
    textToWrite = $(this).parent().find("textarea.noborder").val();
  } else {
    textToWrite = "";
    y = 1;
    $(this)
      .parent()
      .find(".noborder")
      .each(function () {
        //textToWrite +='<tspan '+txtanchord+' x="'+x+'" y="'+fontSize*y+'">'+$(this).val();+'</tspan>';
        textToWrite += $(this).val() + " " + "\n" + " ";
        y++;
      });
  }

  style = $(this).parent().attr("style").replace('"', "'").replace('"', "'");

  var effect3d = false;

  var metalEffect = [];
  metalEffect["effect"] = "";
  metalEffect["fill"] = "";
  metalEffect["fillLight"] = "";
  metalEffect["fillShadow"] = "";

  fontFamily = $(this).parent().find(".texteditor").css("font-family");
  fontFamily = fontFamily.replace('"', "'").replace('"', "'");
  //gold effect
  if ($(this).parent().find(".texteditor").css("color") == "rgb(255, 215, 0)") {
    effect3d = true;
    metalEffect = metaleffect(
      "#efd8a2",
      "#a28156",
      "#efd8a2",
      "#2f1f05",
      "#fff3c6",
      group + "-" + number,
      textToWrite,
      width,
      height,
      fontFamily,
      fontSize,
      effect3d,
      false
    );
  }

  //silver effect
  else if (
    $(this).parent().find(".texteditor").css("color") == "rgb(192, 192, 192)"
  ) {
    effect3d = true;
    metalEffect = metaleffect(
      "#888888",
      "#dedede",
      "#F5F5F5",
      "#444444",
      "#dedede",
      group + "-" + number,
      textToWrite,
      width,
      height,
      fontFamily,
      fontSize,
      effect3d,
      false
    );
  } else if (
    $(this).parent().find(".texteditor").attr("data-effect") == "concavMe"
  ) {
    color1 = $(this).parent().find(".texteditor").css("color");
    color2 = darkerColor(
      $(this).parent().find(".texteditor").css("color"),
      0.2
    );
    shadowcolor = darkerColor(
      $(this).parent().find(".texteditor").css("color"),
      0.4
    );
    lightcolor = lighterColor(
      $(this).parent().find(".texteditor").css("color"),
      0.2
    );
    strokecolor = darkerColor(
      $(this).parent().find(".texteditor").css("color"),
      0.2
    );
    effect3d = true;
    metalEffect = metaleffect(
      color2,
      color1,
      strokecolor,
      lightcolor,
      shadowcolor,
      group + "-" + number,
      textToWrite,
      width,
      height,
      fontFamily,
      fontSize,
      effect3d,
      false
    );
  } else if (
    $(this).parent().find(".texteditor").attr("data-effect") == "convexMe"
  ) {
    color1 = $(this).parent().find(".texteditor").css("color");
    color2 = lighterColor(
      $(this).parent().find(".texteditor").css("color"),
      0.2
    );
    shadowcolor = darkerColor(
      $(this).parent().find(".texteditor").css("color"),
      0.2
    );
    lightcolor = lighterColor(
      $(this).parent().find(".texteditor").css("color"),
      0.3
    );
    strokecolor = lighterColor(
      $(this).parent().find(".texteditor").css("color"),
      0.2
    );
    effect3d = true;
    metalEffect = metaleffect(
      color1,
      color2,
      strokecolor,
      shadowcolor,
      lightcolor,
      group + "-" + number,
      textToWrite,
      width,
      height,
      fontFamily,
      fontSize,
      effect3d,
      false
    );
  } else {
    color1 = $(this).parent().find(".texteditor").css("color");
    strokecolor = $(this).parent().find(".texteditor").attr("stroke-color");
    effect3d = false;
    metalEffect = metaleffect(
      color1,
      color1,
      strokecolor,
      "transparent",
      "transparent",
      group + "-" + number,
      textToWrite,
      width,
      height,
      fontFamily,
      fontSize,
      effect3d,
      false,
      true
    );
  }

  designCompo(
    metalEffect["svg"],
    group + "-" + number,
    view,
    zindex,
    dragdrop,
    resizeable,
    rotateable,
    width,
    height,
    "svg",
    blend
  );

  if ($(this).parent().find("textarea.noborder").length > 0) {
    svg_textMultiline(
      "svgText_" + group + "-" + number,
      textToWrite.replace(/\n/g, " ± "),
      width,
      fontSize,
      txtanchord,
      x
    );
    svg_textMultiline(
      "svgText_" + group + "-" + number + "-shadow",
      textToWrite.replace(/\n/g, " ± "),
      width,
      fontSize,
      txtanchord,
      x
    );
    svg_textMultiline(
      "svgText_" + group + "-" + number + "-light",
      textToWrite.replace(/\n/g, " ± "),
      width,
      fontSize,
      txtanchord,
      x
    );
  }
  //console.log(parseInt(group))
  if (textToWrite != "") updatePriceNdk(price, parseInt(group));
  //$(this).parent().find('.noborder').css('height', '');
});

$(document).on("click", ".remove-item-block", function (event) {
  event.preventDefault();
  group = $(this).attr("data-group-target");
  others = $(this).parent().parent().find(".designer-item");
  $("#visual_" + group).remove();
  $("#item-" + group).remove();
  $("#toggler-" + group).remove();
  $("#layer-edit-" + group).remove();
  idInput = group.split("-");
  //console.log(others.length);
  if (others.length > 1) {
    $("#ndkcsfield_" + idInput[0])
      .val(designerValue)
      .trigger("keyup");
  } else {
    $("#ndkcsfield_" + idInput[0])
      .val("")
      .trigger("keyup");
    updatePriceNdk(0, $(this).attr("data-group"));
  }
  $(this).hide();
  rootGroupBlock = $(
    ".form-group[data-field='" + group + "']:not(.submitContainer)"
  );
  /*if(others.length == 1)
	 updatePriceNdk(0, group);*/
  $("#ndkcsfield_" + idInput[0]).trigger("keyup");

  checkLayerChanges();
  makeSortable();
});

$(document).on("click", ".remove-img-item", function (event) {
  event.preventDefault();
  group = $(this).attr("data-group-target");
  others = $(this).parent().parent().find(".designer-item");
  $("#visual_" + group).remove();
  $("#layer-edit-" + group).remove();
  $(this).parent().find(".selected-value").removeClass("selected-value");
  idInput = group;
  $("#ndkcsfield_" + idInput[0])
    .val("")
    .trigger("keyup");
  $(this).hide();
  if ($(this).hasClass("removePrice")) {
    $("#ndkcsfield_" + group).val("");
    updatePriceNdk(0, group);
  }

  checkLayerChanges();
  makeSortable();
});

function metaleffect(
  startColor,
  stopColor,
  strokeColor,
  shadowColor,
  lightColor,
  group,
  textToWrite,
  width,
  height,
  fontFamily,
  fontSize,
  effect3d,
  textureEffect,
  applat
) {
  if (typeof metaleffect_Override == "function") {
    return metaleffect_Override(
      startColor,
      stopColor,
      strokeColor,
      shadowColor,
      lightColor,
      group,
      textToWrite,
      width,
      height,
      fontFamily,
      fontSize,
      effect3d,
      textureEffect,
      applat
    );
  }

  console.log(textToWrite);
  applat = applat || false;
  var metalEffect = [];

  if (!applat) {
    metalEffect["effect"] =
      '<linearGradient class="svggradient" data-group-text="' +
      group +
      '"  id="metalEffect_' +
      group +
      '" x1="0%" y1="100%" y2="10%" x2="80%">';
    metalEffect["effect"] +=
      '<stop stop-color="' + startColor + '" offset="0%"></stop>';
    metalEffect["effect"] +=
      '<stop stop-color="' + stopColor + '" offset="30%"></stop>';
    metalEffect["effect"] +=
      '<stop stop-color="' + startColor + '" offset="70%"></stop>';
    metalEffect["effect"] +=
      '<stop stop-color="' + stopColor + '" offset="100%"></stop>';
    metalEffect["effect"] += "</linearGradient>";

    metalEffect["effect"] +=
      '<filter class="svgfilter" data-group-text="' +
      group +
      '" id="shadow_' +
      group +
      '" height="140%" y="20%" width="140%" x="-30%"><feGaussianBlur result="shadow" stdDeviation="0 0"></feGaussianBlur><feGaussianBlur result="shadow" stdDeviation="1 0.5"></feGaussianBlur><feOffset dx="0" dy="2"></feOffset></filter>';

    metalEffect["effect"] +=
      '<filter class="svgfilter" data-group-text="' +
      group +
      '"  id="shadow2_' +
      group +
      '" height="140%" y="20%" width="140%" x="-30%"><feGaussianBlur result="shadow" stdDeviation="0.2 0.2"></feGaussianBlur><feOffset dx="0" dy="-0.7"></feOffset></filter>';

    metalEffect["effect"] +=
      '<filter class="svgfilter" data-group-text="' +
      group +
      '" id="light_' +
      group +
      '" height="140%" y="20%" width="140%" x="-30%"><feGaussianBlur result="shadow" stdDeviation="0 0"></feGaussianBlur><feGaussianBlur result="shadow" stdDeviation="0 0"></feGaussianBlur><feOffset dy="-1" dx="0"></feOffset></filter>';

    metalEffect["fill"] =
      (textureEffect
        ? "url(#texture_" + group + ")"
        : "url(#metalEffect_" + group + ")") +
      " ;stroke: " +
      strokeColor +
      "; stroke-width:0.8";
    metalEffect["fillShadow"] =
      shadowColor + "; filter: url(#shadow_" + group + ")";
    metalEffect["fillLight"] =
      lightColor + "; filter: url(#light_" + group + ")";
  } else {
    metalEffect["effect"] = "";
    metalEffect["fill"] =
      startColor + " ;stroke: " + strokeColor + "; stroke-width:0.8";
    metalEffect["fillShadow"] = "";
    metalEffect["fillLight"] = "";
  }

  textPathEffect = "";
  svg =
    '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" class="textareaSvg composition_element" viewBox="0 0 ' +
    width +
    " " +
    (height + 5) +
    '" preserveAspectRatio="xMidYMid meet" style="' +
    style +
    '" height="' +
    height +
    '" width="' +
    width +
    '">';

  svg += metalEffect["effect"];

  fontUrl = fontFamily.replace(/\s/g, "+");
  fontUrl = fontUrl.replace(/\"/g, "");
  fontUrl = fontUrl.replace(/\'/g, "");
  fullFontUrl = "https://fonts.googleapis.com/css?family=" + fontUrl;
  styleContent = "@import url('" + fullFontUrl + "')";
  svg += '<defs><style type="text/css" >' + styleContent + "</style></defs>";
  textPathEffect += metalEffect["effect"];

  var lines = textToWrite.split("\n");
  if (lines.length > 1) {
    y = 1;
    for (var i = 0; i < lines.length; i++) {
      svglines +=
        "<tspan " +
        txtanchord +
        ' x="' +
        x +
        '" y="' +
        fontSize * y +
        '">' +
        lines[i].escape() +
        "</tspan>";
      y++;
    }
  }

  if (effect3d == true && !applat) {
    svg +=
      '<text data-font-family="' +
      fontFamily +
      '" id="svgText_' +
      group +
      '-light" x="10" y="10" style="fill:' +
      metalEffect["fillLight"] +
      ';"font-family:' +
      fontFamily +
      " ;>" +
      svglines +
      "</text>";
    svg +=
      '<text data-font-family="' +
      fontFamily +
      '" id="svgText_' +
      group +
      '-shadow" x="10" y="10" style="fill:' +
      metalEffect["fillShadow"] +
      ";font-family:" +
      fontFamily +
      ' ;">' +
      textToWrite +
      "</text>";

    textPathEffect +=
      '<text data-font-family="' +
      fontFamily +
      '" data-group-text="' +
      group +
      '" id="svgText_' +
      group +
      '-light" style="font-family:' +
      fontFamily +
      " ;font-size:" +
      fontSize * 1 +
      "px; fill:" +
      metalEffect["fillLight"] +
      ';">' +
      svglines +
      "</text>";

    textPathEffect +=
      '<text data-font-family="' +
      fontFamily +
      '" data-group-text="' +
      group +
      '" id="svgText_' +
      group +
      '-shadow" style="font-family:' +
      fontFamily +
      " ;font-size:" +
      fontSize * 1 +
      "px; fill:" +
      metalEffect["fillShadow"] +
      ';">' +
      svglines +
      "</text>";
  } else if (textureEffect) {
    svg +=
      '<pattern id="texture_' +
      group +
      '" patternUnits="userSpaceOnUse" viewBox="0 0 ' +
      width +
      " " +
      (height + 5) +
      '" height="' +
      height +
      '" width="' +
      width +
      '">';
    svg +=
      '<image xlink:href="' +
      textureEffect +
      '" height="' +
      height +
      '" width="' +
      width +
      '"/>';
    svg += "</pattern>";
  }
  svg +=
    '<text data-font-family="' +
    fontFamily +
    '" id="svgText_' +
    group +
    '"  x="10" y="10" style="fill:' +
    metalEffect["fill"] +
    ";font-family:" +
    fontFamily +
    ';">';

  svg += svglines;
  svg += "</text>";
  svg += "</svg>";

  metalEffect["textPathEffect"] = textPathEffect;
  metalEffect["svg"] = svg;

  return metalEffect;
}

var pad = function (num, totalChars) {
  var pad = "0";
  num = num + "";
  while (num.length < totalChars) {
    num = pad + num;
  }
  return num;
};

// Ratio is between 0 and 1
var changeColor = function (color, ratio, darker) {
  // Trim trailing/leading whitespace
  color = color.replace(/^\s*|\s*$/, "");

  // Expand three-digit hex
  color = color.replace(/^#?([a-f0-9])([a-f0-9])([a-f0-9])$/i, "#$1$1$2$2$3$3");

  // Calculate ratio
  var difference = Math.round(ratio * 256) * (darker ? -1 : 1),
    // Determine if input is RGB(A)
    rgb = color.match(
      new RegExp(
        "^rgba?\\(\\s*" +
          "(\\d|[1-9]\\d|1\\d{2}|2[0-4][0-9]|25[0-5])" +
          "\\s*,\\s*" +
          "(\\d|[1-9]\\d|1\\d{2}|2[0-4][0-9]|25[0-5])" +
          "\\s*,\\s*" +
          "(\\d|[1-9]\\d|1\\d{2}|2[0-4][0-9]|25[0-5])" +
          "(?:\\s*,\\s*" +
          "(0|1|0?\\.\\d+))?" +
          "\\s*\\)$",
        "i"
      )
    ),
    alpha = !!rgb && rgb[4] != null ? rgb[4] : null,
    // Convert hex to decimal
    decimal = !!rgb
      ? [rgb[1], rgb[2], rgb[3]]
      : color
          .replace(
            /^#?([a-f0-9][a-f0-9])([a-f0-9][a-f0-9])([a-f0-9][a-f0-9])/i,
            function () {
              return (
                parseInt(arguments[1], 16) +
                "," +
                parseInt(arguments[2], 16) +
                "," +
                parseInt(arguments[3], 16)
              );
            }
          )
          .split(/,/),
    returnValue;

  // Return RGB(A)
  return !!rgb
    ? "rgb" +
        (alpha !== null ? "a" : "") +
        "(" +
        Math[darker ? "max" : "min"](
          parseInt(decimal[0], 10) + difference,
          darker ? 0 : 255
        ) +
        ", " +
        Math[darker ? "max" : "min"](
          parseInt(decimal[1], 10) + difference,
          darker ? 0 : 255
        ) +
        ", " +
        Math[darker ? "max" : "min"](
          parseInt(decimal[2], 10) + difference,
          darker ? 0 : 255
        ) +
        (alpha !== null ? ", " + alpha : "") +
        ")"
    : // Return hex
      [
        "#",
        pad(
          Math[darker ? "max" : "min"](
            parseInt(decimal[0], 10) + difference,
            darker ? 0 : 255
          ).toString(16),
          2
        ),
        pad(
          Math[darker ? "max" : "min"](
            parseInt(decimal[1], 10) + difference,
            darker ? 0 : 255
          ).toString(16),
          2
        ),
        pad(
          Math[darker ? "max" : "min"](
            parseInt(decimal[2], 10) + difference,
            darker ? 0 : 255
          ).toString(16),
          2
        ),
      ].join("");
};
var lighterColor = function (color, ratio) {
  return changeColor(color, ratio, false);
};
var darkerColor = function (color, ratio) {
  return changeColor(color, ratio, true);
};

$(document).on("keyup", ".visual-text-custom-font", function () {
  group = $(this).attr("data-group");
  text = $(this).val();
  textArray = text.split("");
  //console.log(textArray);
  htmlLetter = "";

  for (var i = 0; i < textArray.length; i++) {
    htmlLetter +=
      '<span class="customFontLetter customFont_' +
      group +
      "_letter_" +
      textArray[i] +
      '">' +
      textArray[i] +
      "</span>";
  }

  $.when($(this).parent().find(".custom-font-rendering").html(htmlLetter)).then(
    function () {
      $(".customFontLetter").each(function () {
        content = $(this).css("content");
        content = content.replace('url("', "").replace('")', "");
        $(this).html('<img src="' + content + '"/>');
        convertPercentEl($(this));
      });

      //setLetterWidth();
    }
  );
});

function setLetterWidth() {
  if (typeof setLetterWidth_Override == "function") {
    return setLetterWidth_Override();
  }
  $(".customFontLetter").each(function () {
    parentWidth = $(this).parent().width();
    elWidth = $(this).width();
    $(this).width((elWidth / parentWidth) * 100 + "%");
  });
  equalheight(".customFontLetter");
}

$(document).on("click", ".submitCSText", function () {
  group = $(this).parent().find(".visual-text-custom-font").attr("data-group");
  zindex = $(this)
    .parent()
    .find(".visual-text-custom-font")
    .attr("data-zindex");
  price = $(this).parent().find(".visual-text-custom-font").attr("data-price");
  ppcprice = $(this)
    .parent()
    .find(".visual-text-custom-font")
    .attr("data-ppcprice");
  blend = $(this).parent().find(".visual-text-custom-font").attr("data-blend");

  view = $(this).parent().find(".visual-text-custom-font").attr("data-view");

  dragdrop = $(this)
    .parent()
    .find(".visual-text-custom-font")
    .attr("data-dragdrop");
  resizeable = $(this)
    .parent()
    .find(".visual-text-custom-font")
    .attr("data-resizeable");
  rotateable = $(this)
    .parent()
    .find(".visual-text-custom-font")
    .attr("data-rotateable");
  charsCount = 0;

  texte = $(this).parent().find(".visual-text-custom-font").text();

  if (texte == "" || texte == " ") {
    price = 0;
    texte = "";
  } else if (ppcprice > 0) {
    price = ppcprice * charsCount;
  } else {
    price = $(this)
      .parent()
      .find(".visual-text-custom-font")
      .attr("data-price");
  }

  if (texte == "" || texte == " ") {
    price = 0;
    texte = "";
  }

  height = $(this).parent().find(".custom-font-rendering").innerHeight();
  width = $(this).parent().find(".custom-font-rendering").innerWidth();

  html =
    '<div id="cecft_' +
    group +
    '" class="composition_element customFontTextElement" style="height:' +
    height +
    "px; width:" +
    width +
    'px">' +
    $(this).parent().find(".custom-font-rendering").html() +
    "</div>";

  //html = '<div class="composition_element customFontTextElement">'+$(this).parent().find('.custom-font-rendering').html()+'</div>';
  updatePriceNdk(price, parseInt(group));
  //$('.status_counter').hide();
  /*html2canvas($(this).parent().find('.custom-font-rendering'), {
	        onrendered: function(canvas) {
	                var dataURL = canvas.toDataURL("image/png");
	                designCompo(dataURL, group, view, zindex, dragdrop, resizeable, rotateable, width, 'auto', false);
					//$('.custom-font-rendering').css({position : 'relative', height : 'auto', width : 'auto', zIndex : ''});
					//$('.customFontLetter').css({height : '', width : ''});


	        }
	    });*/

  $.when(
    designCompo(
      html,
      group,
      view,
      zindex,
      dragdrop,
      resizeable,
      rotateable,
      width,
      height,
      "svg",
      blend
    )
  ).then(function () {
    /*$('#cecft_'+group+' .customFontLetter').each(function(){
			convertPercentEl($(this));
		});*/
    $("#cecft_" + group).css({ height: "", width: "" });
  });
});

function convertPercentEl(el) {
  if (typeof convertPercentEl_Override == "function") {
    return convertPercentEl_Override(el);
  }
  container = el.parent();
  containerWidth = container.width();
  containerHeight = container.height();

  elWidth = el.width();
  elHeight = el.height();

  elLeft = el.css("left").replace("px", "");
  elTop = el.css("top").replace("px", "");

  widthPercent = (elWidth / containerWidth) * 100 + "%";
  heightPercent = (elHeight / containerHeight) * 100 + "%";
  heightPercent = "auto";
  leftPercent = (elLeft / containerWidth) * 100 + "%";
  topPercent = (elTop / containerHeight) * 100 + "%";

  el.css({
    width: widthPercent,
    height: heightPercent,
    left: leftPercent,
    top: topPercent,
    margin: "",
  });
}

function registerInitialValues() {
  if (typeof registerInitialValues_Override == "function") {
    return registerInitialValues_Override();
  }
  $('.fieldPane > [id^="main-"]').each(function () {
    splittedGroup = $(this).attr("id").split("-");
    group =
      splittedGroup[1] +
      (typeof splittedGroup[2] != "undefined" ? "-" + splittedGroup[2] : "");

    initialValues[group] = [];
    //images
    if ($(this).find(".img-item-row").length > 0) {
      initialValues[group].push($(this).find(".img-item-row"));
    }
    //couleurs
    if ($(this).find(".color-ndk").length > 0) {
      initialValues[group].push($(this).find(".color-ndk"));
    }
    //select
    if ($(this).find(".ndk-select").length > 0) {
      initialValues[group].push($(this).find(".ndk-select"));
    }

    //radio
    if ($(this).find(".ndk-radio").length > 0) {
      initialValues[group].push($(this).find(".ndk-radio"));
    }

    //checkbox
    if ($(this).find(".ndk-checkbox").length > 0) {
      initialValues[group].push($(this).find(".ndk-checkbox"));
    }
  });
}

function loadInitialValues() {
  if (typeof loadInitialValues_Override == "function") {
    return loadInitialValues_Override();
  }
  for (idGroup in initialValues) {
    if (typeof initialValues[idGroup] != "undefined") {
      if (typeof initialValues[idGroup][0] != "undefined") {
        for (var i = 0; i < initialValues[idGroup][0].length; i++) {
          element = initialValues[idGroup][0][i];

          container = $(".form-group[data-field='" + idGroup + "']");

          //image
          if ($(element).hasClass("img-item-row")) {
            idValue = $(element).find(".img-value:eq(0)").attr("data-id-value");
            if (
              idValue != 0 &&
              typeof idValue != "undefined" &&
              idValue != "" &&
              $(
                ".form-group[data-field='" +
                  idGroup +
                  "'] .img-value[data-id-value='" +
                  idValue +
                  "']"
              ).length == 0
            ) {
              $(element).removeClass("selected-value");
              $(element).find(".img-value").removeClass("selected-value");
              $(element).find(".svg-container").removeClass("selected-svg");
              $(".form-group[data-field='" + idGroup + "'] .img-value")
                .last()
                .parent()
                .after($(element)[0].outerHTML);
            }
          }

          //color
          else if ($(element).hasClass("color-ndk")) {
            idValue = $(element).attr("data-id-value");
            if (
              idValue != 0 &&
              typeof idValue != "undefined" &&
              idValue != "" &&
              $(
                ".form-group[data-field='" +
                  idGroup +
                  "'] .color-ndk[data-id-value='" +
                  idValue +
                  "']"
              ).length == 0
            ) {
              $(element).removeClass("selected-color");
              $(".form-group[data-field='" + idGroup + "'] .color-ndk")
                .last()
                .after($(element)[0].outerHTML);
            }
          }

          //select
          else if ($(element).is("select")) {
            $(element)
              .find("option")
              .each(function () {
                option = $(this);
                idValue = $(option).attr("data-id-value");

                if (
                  idValue != 0 &&
                  typeof idValue != "undefined" &&
                  idValue != "" &&
                  $(
                    ".form-group[data-field='" +
                      idGroup +
                      "'] .ndk-select > option[data-id-value='" +
                      idValue +
                      "']"
                  ).length == 0
                ) {
                  $(".form-group[data-field='" + idGroup + "'] select").append(
                    $(option)[0].outerHTML
                  );
                }
              });
          }

          /*else( $('.fieldPane > #main-'+idGroup+' #'+$(element).attr('id')).length < 1 ){
		    		//console.log($(element)[0].attr('id'));
		    		$('#main-'+idGroup).append($(element)[0].outerHTML);
				}*/
        }
      }
    }
  }
  setTimeout(function () {
    equalheight(".img-item-row");
  }, 1000);
}

function makeGroupFieldsSlide() {
  if (typeof makeGroupFieldsSlide_Override == "function") {
    return makeGroupFieldsSlide_Override();
  }
  $(".groupFieldBlock").addClass("sliderBlock");
  $(".groupFieldBlock > .form-group").addClass("ndkackFieldItem");

  setTimeout(function () {
    ndkCfShowSlide($(".sliderBlock .ndkackFieldItem:visible:eq(0)"));
  }, 500);

  $(".sliderBlock").each(function () {
    allItems = $(this).find(".ndkackFieldItem");
    if (allItems.length > 0) {
      if (allItems.length > 1) {
        pager = '<p class="ndkcfPager">';
        allItems.each(function () {
          pager +=
            '<span data-view="' +
            $(this).attr("data-view") +
            '" target="' +
            $(this).attr("data-iteration") +
            '" class="ndkcfPagerItem"></span>';
        });
        pager += "</p>";
        $(".ndkcfPager").remove();
        $(this).append(pager).addClass("multipleSlides");
      }
    } else {
      $(this).remove();
    }
  });

  $(".groupFieldBlock").css(
    "padding-bottom",
    $(".sliderBlock .ndkackFieldItem:visible:eq(0)").innerHeight()
  );
  $(".groupFieldBlock.sliderBlock").find(".ndkcfnav").remove();
  $(".groupFieldBlock.sliderBlock.multipleSlides").append(
    '<p class="ndkcfnav"><a class="prevNdkcfItem">&nbsp;</a> <a class="nextNdkcfItem">&nbsp;</a></p>'
  );

  $(document).on("click", ".nextNdkcfItem", function () {
    found = false;
    current = $(this)
      .parent()
      .parent()
      .find(".ndkackFieldItem.activeItem:eq(0)");
    others = $(this)
      .parent()
      .parent()
      .find(".ndkackFieldItem:visible:not(.activeItem)");
    others.each(function () {
      if (
        parseFloat($(this).attr("data-iteration")) >
          parseFloat(current.attr("data-iteration")) &&
        !found
      ) {
        ndkCfShowSlide($(this), "rtl");
        found = true;
      }
    });
    if (!found) {
      ndkCfShowSlide(others.first(), "rtl");
      found = true;
    }
  });

  $(document).on("click", ".prevNdkcfItem", function () {
    current = $(this)
      .parent()
      .parent()
      .find(".ndkackFieldItem.activeItem:eq(0)");
    others = $(this)
      .parent()
      .parent()
      .find(".ndkackFieldItem:visible:not(.activeItem)");
    bigger = -1;
    others.each(function () {
      if (
        parseFloat($(this).attr("data-iteration")) <
          parseFloat(current.attr("data-iteration")) &&
        parseFloat($(this).attr("data-iteration")) > bigger
      ) {
        bigger = parseFloat($(this).attr("data-iteration"));
        target = $(this);
      }
    });

    if (typeof target != "undefined") {
      ndkCfShowSlide(target, "ltr");
    } else {
      ndkCfShowSlide(others.last(), "ltr");
    }
  });

  $(document).on("click", ".ndkcfPagerItem", function () {
    ndkCfShowSlide(
      $(this)
        .parent()
        .parent()
        .find(
          ".ndkackFieldItem[data-iteration='" + $(this).attr("target") + "']"
        )
    );
  });

  /*$(document).on('swiperight', '.sliderBlock', function(){
   	$(this).find('.prevNdkcfItem').trigger('click');
   });

   $(document).on('swipeleft', '.sliderBlock', function(){
   	$(this).find('.nextNdkcfItem').trigger('click');
   });*/

  $(".sliderBlock00").swipe({
    //Generic swipe handler for all directions
    swipe: function (
      event,
      direction,
      distance,
      duration,
      fingerCount,
      fingerData
    ) {
      if (direction == "left") $(this).find(".nextNdkcfItem").trigger("click");
      else if (direction == "right")
        $(this).find(".prevNdkcfItem").trigger("click");
    },
    //Default is 75px, set to 0 for demo so any distance triggers swipe
    threshold: 0,
  });

  $(".sliderBlock .ndkackFieldItem").resize(function () {
    $(this)
      .parent()
      .css(
        "padding-bottom",
        $(".ndkackFieldItem.activeItem:eq(0)").innerHeight()
      );
  });
}

$("audio").on("play", function () {
  var id = $(this).attr("id");

  $("audio")
    .not(this)
    .each(function (index, audio) {
      audio.pause();
    });
});

$("video").on("play", function () {
  var id = $(this).attr("id");

  $("video")
    .not(this)
    .each(function (index, video) {
      video.pause();
    });
});

function ndkCfShowSlide(el, direction) {
  if (typeof ndkCfShowSlide_Override == "function") {
    return ndkCfShowSlide_Override(el, direction);
  }
  direction = direction || "ltr";
  $(".img-item-row").css("height", "");
  el.parent().find(".ndkackFieldItem").removeClass("activeItem");

  el.parent()
    .find(".ndkackFieldItem")
    .removeClass("slideInRight")
    .removeClass("slideInLeft");
  if (direction == "rtl")
    el.parent()
      .find(".ndkackFieldItem")
      .addClass("slideInRight")
      .removeClass("slideInLeft");
  else
    el.parent()
      .find(".ndkackFieldItem")
      .removeClass("slideInRight")
      .addClass("slideInLeft");

  el.addClass("activeItem");
  el.parent().find(".ndkcfPagerItem").removeClass("activePager");
  el.parent()
    .find(".ndkcfPagerItem[target='" + el.attr("data-iteration") + "']")
    .addClass("activePager");
  //scrollToNdk(el.parent(), 800);

  setTimeout(function () {
    equalheight(".img-item-row");
    el.parent().css(
      "padding-bottom",
      $(".ndkackFieldItem.activeItem:eq(0)").innerHeight()
    );
    el.parent()
      .find(".ndkackFieldItem")
      .removeClass("slideInRight")
      .removeClass("slideInLeft");
  }, 500);
}

$(document).on("click", ".form-group", function () {
  field = $(this).attr("data-field");

  $(".editThisLayer").removeClass("layerActive");
  $(".resetZones").remove();

  $(".zone_limit, .absolute-visu")
    .removeClass("activeZone")
    .removeClass("discretZone");
  zone = $(
    ".zone_limit[data-group='" +
      field +
      "'], .absolute-visu[data-group='" +
      field +
      "']"
  );
  if (
    (zone.find(".ui-resizable, .ui-draggable, .rotatable").length > 0 ||
      zone.is(".ui-resizable", ".ui-draggable", ".rotatable")) &&
    !$(this).hasClass("activeFormGroup_ooooooo")
  ) {
    $(".form-group").removeClass("activeFormGroup");
    $(this).addClass("activeFormGroup");
    $(".zone_limit, .absolute-visu").addClass("discretZone");
    zone.addClass("activeZone").removeClass("discretZone");
    $("#layer-edit-" + field).addClass("layerActive");
    $(".editThisLayer[data-group*='" + field + "-']")
      .addClass("layerActive")
      .find(".ui-resizable, .ui-draggable, .rotatable")
      .trigger("mouseover");
    $("#layer-block").append(
      '<span class="resetZones">' + resetText + "</span>"
    );
  } else {
    $(".zone_limit, .absolute-visu")
      .removeClass("activeZone")
      .removeClass("discretZone");
    $(".editThisLayer").removeClass("layerActive");
    $(".form-group").removeClass("activeFormGroup");
    $(".resetZones").remove();
  }
});

$(document).on("click", ".editThisLayer", function () {
  group = $(this).attr("data-group").split("-");
  $(".editThisLayer").removeClass("layerActive");
  $(this).addClass("layerActive");
  $(".form-group[data-field='" + group[0] + "']").trigger("click");
});

$(document).on("mousedown", ".absolute-visu", function () {
  if ($(this).is(".ui-resizable", ".ui-draggable", ".rotatable")) {
    group = $(this).attr("data-group").split("-");
    $(".editThisLayer").removeClass("layerActive");
    $(this).addClass("activeZone");
    $(".form-group[data-field='" + group[0] + "']").trigger("click");
  }
});

$(document).on("click", ".resetZones", function () {
  $(".zone_limit, .absolute-visu")
    .removeClass("activeZone")
    .removeClass("discretZone");
  $(".editThisLayer").removeClass("layerActive");
  $(".form-group").removeClass("activeFormGroup");
  $(".resetZones").remove();
  //convertPercent();
  snapShotLight();
});

function checkLayerChanges() {
  if (typeof checkLayerChanges_Override == "function") {
    return checkLayerChanges_Override();
  }
  if ($("#layer-block").find(".editThisLayer").length == 0)
    $("#layer-block").hide();
  else if (
    $("#layer-block").find(".editThisLayer").length == 1 &&
    $("#layer-block").find(".layer_title").length == 0
  )
    $("#layer-block")
      .show()
      .prepend('<p class="layer_title">' + selectLayer + "</p>");
  else if ($("#layer-block").find(".editThisLayer").length > 0)
    $("#layer-block").show();
}

/*$(document).on('mouseout', '.activeZone > .absolute-visu', function(){
  $('.zone_limit').removeClass('activeZone');
});*/

/*$(document).on('mouseover', '#ndkcsfields-block', function(){
  $('.zone_limit').removeClass('activeZone');
});*/

/*$(document).on('mouseover', '#submitNdkcsfields', function(){
  $('.zone_limit, .absolute-visu').removeClass('activeZone').removeClass('discretZone');
  $('.form-group').removeClass('activeFormGroup');
  //convertPercent();
  snapShotLight();
});*/

$(document).on("keydown", '#ndkcsfields input[type="text"]', function (event) {
  if (event.keyCode == 13 || event.keyCode == 9) {
    $(this).focus();
    event.preventDefault();
  }
});

function makeSortable() {
  if (typeof makeSortable_Override == "function") {
    return makeSortable_Override();
  }
  //$('.itemsBlock').sortable('destroy');
  $(".itemsBlock").sortable({
    items: ".designer-item-container",
    handle: ".itemToggler",
    cursor: "move",
    opacity: 0.6,
    start: function (event, ui) {
      $(".resetZones").trigger("click");
    },
    stop: function (event, ui) {
      refZindex = ui.item
        .parent()
        .parent()
        .parent()
        .find("button:eq(0)")
        .attr("data-zindex");
      others = ui.item.parent().find(".designer-item-container");
      others.each(function () {
        $(this).attr("addzindex", $(others).index($(this)));
        block = $(this).find(".designer-item");
        target_key = block.attr("id").replace("item-", "");
        target = $("#visual_" + target_key);
        target.css("z-index", refZindex + $(others).index($(this)));

        //console.log($(others).index($(this)));
      });
    },
  });
}

$(document).on("click", ".colse-comb-tab", function () {
  $(this)
    .parent()
    .parent()
    .parent()
    .find(".combColumn")
    .removeClass("openedCol")
    .css("height", "");
});

$(document).on("click", ".ndkcf_col_title", function () {
  if (!$(this).parent().hasClass("openedCol")) {
    $(this)
      .parent()
      .parent()
      .find(".combColumn")
      .removeClass("openedCol")
      .css("height", "");

    originalHeight = $(this).parent().innerHeight();
    refPosition = $(this).parent().position().top;
    //$(this).parent().addClass('openedCol').css('height', (combHeight+originalHeight+40)+'px');
    $.when($(this).parent().addClass("openedCol")).done(function () {
      combHeight = $(this).parent().find(".combRowList").innerHeight();
      //console.log(combHeight);
      $(this)
        .parent()
        .css("height", combHeight + originalHeight + 50 + "px");
      $(".combColumn").each(function () {
        if ($(this).position().top == refPosition)
          $(this).css("height", combHeight + originalHeight + 50 + "px");
      });
    });
    equalheight($(this).parent().find(".combRow"));
  } else {
    //$(this).parent().parent().find('.combColumn').removeClass('openedCol').css('height', '');
  }
});

$(document).on("click", ".toggleQuantityDiscountBlock", function () {
  content = $(this).parent().find(".specificPriceBlock").html();
  if (!!$.prototype.fancybox) {
    $.fancybox.open(
      [
        {
          type: "inline",
          autoScale: false,
          minHeight: 30,
          width: "80%",
          height: "80%",
          showCloseButton: false,
          autoDimensions: false,
          content:
            '<div class="popupSpecificPrice clear clearfix">' +
            content +
            "</div>",
          beforeShow: function () {},
        },
      ],
      {
        padding: 0,
      }
    );
  }
});

$(document).on("click", ".toggleQuantityDiscount", function () {
  $(this).parent().find(".quantityDiscount").slideToggle();
});

function RemoveSelectOptions(num, num2) {
  inputa = $("li[data-id-value='" + num + "']").find(
    ".ndk-accessory-quantity:eq(0)"
  );
  if (parseInt(inputa.val()) == 0) {
  } else {
    $("li[data-id-value='" + num + "']").removeClass("selected-accessory");
    inputa.val(0).trigger("change");
    var price = $("#ndk-accessory-quantity-" + num).attr("data-price");
    var finalprice = $("#price_" + num2).val();
    $("#price_" + num2).val(parseInt(finalprice) - parseInt(price));
  }
}

function checaSeImgExiste(url) {
  var http = new XMLHttpRequest();
  http.open("HEAD", url, false);
  http.send();
  return http.status != 404;
}

$(document).on('click', '.accessory-ndk-no-quantity .accessory_img_block', function () {
	me = $(this).parent();
	rootBlock = $(".form-group[data-field='" + me.attr('data-group') + "']");

	input = $('#ndk-accessory-quantity-'+ me.attr('data-id-value'));
	max = parseInt(rootBlock.attr('data-qtty-max'));
	var price = $('#ndk-accessory-quantity-' + me.attr('data-id-value')).attr('data-price');
	var finalprice =  $("#price_" + me.attr('data-group')).val();

	if (max > 0) {
		rootBlock.find('.selected-accessory').removeClass('selected-accessory');
		rootBlock.find('.ndk-accessory-quantity').val(0).trigger('change');
	}

	if (parseInt(input.val()) == 0) {
		me.addClass('selected-accessory');
		input.val(1).trigger('change');
		$("#price_" + me.attr('data-group')).val(parseInt(finalprice) + parseInt(price));
	}
	else {
		me.removeClass('selected-accessory');
		input.val(0).trigger('change');
		$("#price_" + me.attr('data-group')).val(parseInt(finalprice) - parseInt(price));
	}

});

$(document).on("click", ".orientation-btn", function () {
  $(this).parent().find(".orientation-btn").removeClass("active_orientation");
  $(this).addClass("active_orientation");
  group = $(this).parent().attr("data-group-target");
  $(
    "#visual_" +
      group +
      " .composition_element, #visual_" +
      group +
      " .colorize-cover-item"
  )
    .removeClassSVG("standard-orientation")
    .removeClassSVG("reverse-orientation")
    .addClassSVG($(this).attr("data-orientation"));
});

/*
 * .addClassSVG(className)
 * Adds the specified class(es) to each of the set of matched SVG elements.
 */
$.fn.addClassSVG = function (className) {
  $(this).attr("class", function (index, existingClassNames) {
    return (
      (existingClassNames !== undefined ? existingClassNames + " " : "") +
      className
    );
  });
  return this;
};

/*
 * .removeClassSVG(className)
 * Removes the specified class to each of the set of matched SVG elements.
 */
$.fn.removeClassSVG = function (className) {
  $(this).attr("class", function (index, existingClassNames) {
    var re = new RegExp("\\b" + className + "\\b", "g");
    return existingClassNames.replace(re, "");
  });
  return this;
};

$(document).on("focus", "input.surface", function () {
  if ($(this).attr("step") != "") $(this).trigger("blur");
});

function makeSocialCompo(id_conf, popup) {
  if (typeof makeSocialCompo_Override == "function") {
    return makeSocialCompo_Override(id_conf, popup);
  }

  if (showSocialTools == 1) {
    if (!!$.prototype.fancybox && popup) {
      data = $(".ndkShareCompo").html();
      $.fancybox.open(
        [
          {
            type: "inline",
            autoScale: false,
            minHeight: 30,
            width: "80%",
            height: "80%",
            showCloseButton: false,
            autoDimensions: false,
            content:
              '<div class="popupSocialContainer clear clearfix">' +
              data +
              "</div>",
            beforeShow: function () {
              setSharedButtons(id_conf);
            },
          },
        ],
        {
          padding: 0,
        }
      );
    } else {
      setSharedButtons(id_conf);
    }
  }
}

function setSharedButtons(id_conf) {
  if (typeof setSharedButtons_Override == "function") {
    return setSharedButtons_Override(id_conf);
  }
  sharing_url = removeParamUrl(
    "id_ndk_customization_field_configuration",
    window.location.href
  );
  sharing_url = addParameterToURL(
    "id_ndk_customization_field_configuration=" + id_conf,
    sharing_url
  );
  sharing_url = addParameterToURL("date=" + $.now(), sharing_url);

  sharing_name = "";

  img_url = $(".current_config_img").attr("src");

  $(".copyLinkInput").text(sharing_url);
  if (img_url != "") $(".shareImgDl").attr("href", img_url).show();
  else $(".shareImgDl").hide();

  $.ajax({
    async: true,
    type: "GET",
    global: false,
    dataType: "html",
    url: baseUrl + "modules/ndk_advanced_custom_fields/front_ajax.php",
    data: { id_conf: id_conf, action: "getConfImage" },
    success: function (data) {
      //var conf_img_url = baseUrl+'img/scenes/'+data;
      var conf_img_url = $("#image-url-0").val();
      $(".current_config_img:eq(0)").attr("src", conf_img_url).show();
      $("button.ndk-social-sharing:not(.shareImgDl), button.social-sharing").on(
        "click",
        function () {
          type = $(this).attr("data-type");
          if (type.length) {
            switch (type) {
              case "twitter":
                window.open(
                  "https://twitter.com/intent/tweet?text=" +
                    sharing_name +
                    " " +
                    encodeURIComponent(sharing_url),
                  "sharertwt",
                  "toolbar=0,status=0,width=640,height=445"
                );
                break;
              case "facebook":
                window.open(
                  "http://www.facebook.com/sharer.php?u=" + sharing_url,
                  "sharer",
                  "toolbar=0,status=0,width=660,height=445"
                );
                break;
              case "google-plus":
                window.open(
                  "https://plus.google.com/share?url=" + sharing_url,
                  "sharer",
                  "toolbar=0,status=0,width=660,height=445"
                );
                break;
              case "pinterest":
                window.open(
                  "http://www.pinterest.com/pin/create/button/?media=" +
                    conf_img_url +
                    "&url=" +
                    sharing_url,
                  "sharerpinterest",
                  "toolbar=0,status=0,width=660,height=445"
                );
                break;
              case "copyLink":
                copyToClipboard(".copyLinkInput:eq(0)");
                break;
            }
          }
        }
      );
    },
  });
}

function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}

function addParameterToURL(param, sourceURL) {
  _url = sourceURL;
  _url += (_url.indexOf("?") !== -1 ? "&" : "?") + param;
  return _url;
}

function removeParamUrl(key, sourceURL) {
  var rtn = sourceURL.split("?")[0],
    param,
    params_arr = [],
    queryString = sourceURL.indexOf("?") !== -1 ? sourceURL.split("?")[1] : "";
  if (queryString !== "") {
    params_arr = queryString.split("&");
    for (var i = params_arr.length - 1; i >= 0; i -= 1) {
      param = params_arr[i].split("=")[0];
      if (param === key) {
        params_arr.splice(i, 1);
      }
    }
    rtn = rtn + (params_arr.lenght > 0 ? "?" + params_arr.join("&") : "");
  }
  return rtn;
}

$("textarea.noborder").on("keyup change", function () {
  $(this)
    .css("height", "auto")
    .css("height", this.scrollHeight + (this.offsetHeight - this.clientHeight));
  $(this)
    .parent()
    .css("height", "auto")
    .css(
      "height",
      this.scrollHeight + (this.offsetHeight - this.clientHeight) + 15
    );
});

/*
 * Browser Detect script
 */
BrowserDetect = (function () {
  // script settings
  var options = {
    osVersion: true,
    minorBrowserVersion: true,
  };

  // browser data
  var browserData = {
    browsers: {
      chrome: uaMatch(/Chrome\/([0-9\.]*)/),
      firefox: uaMatch(/Firefox\/([0-9\.]*)/),
      safari: uaMatch(/Version\/([0-9\.]*).*Safari/),
      opera: uaMatch(/Opera\/.*Version\/([0-9\.]*)/, /Opera\/([0-9\.]*)/),
      msie: uaMatch(/MSIE ([0-9\.]*)/, /Trident.*rv:([0-9\.]*)/),
    },
    engines: {
      webkit: uaContains("AppleWebKit"),
      trident: uaMatch(/(MSIE|Trident)/),
      gecko: uaContains("Gecko"),
      presto: uaContains("Presto"),
    },
    platforms: {
      win: uaMatch(/Windows NT ([0-9\.]*)/),
      mac: uaMatch(/Mac OS X ([0-9_\.]*)/),
      linux: uaContains("X11", "Linux"),
    },
  };

  // perform detection
  var ua = navigator.userAgent;
  var detectData = {
    platform: detectItem(browserData.platforms),
    browser: detectItem(browserData.browsers),
    engine: detectItem(browserData.engines),
  };

  // private functions
  function uaMatch(regExp, altReg) {
    return function () {
      var result = regExp.exec(ua) || (altReg && altReg.exec(ua));
      return result && result[1];
    };
  }
  function uaContains(word) {
    var args = Array.prototype.slice.apply(arguments);
    return function () {
      for (var i = 0; i < args.length; i++) {
        if (ua.indexOf(args[i]) < 0) {
          return;
        }
      }
      return true;
    };
  }
  function detectItem(items) {
    var detectedItem = null,
      itemName,
      detectValue;
    for (itemName in items) {
      if (items.hasOwnProperty(itemName)) {
        detectValue = items[itemName]();
        if (detectValue) {
          return {
            name: itemName,
            value: detectValue,
          };
        }
      }
    }
  }

  // add classes to root element
  (function () {
    // helper functions
    var addClassJS = function (cls) {
      var html = document.documentElement;
      html.className += (html.className ? " " : "") + cls;
    };
    var getVersion = function (ver) {
      return typeof ver === "string" ? ver.replace(/\./g, "_") : "unknown";
    };

    // add classes
    if (detectData.platform) {
      addClassJS(detectData.platform.name);
      if (options.osVersion) {
        addClassJS(
          detectData.platform.name + "-" + getVersion(detectData.platform.value)
        );
      }
    }
    if (detectData.engine) {
      addClassJS(detectData.engine.name);
    }
    if (detectData.browser) {
      addClassJS(detectData.browser.name);
      addClassJS(
        detectData.browser.name + "-" + parseInt(detectData.browser.value, 10)
      );
      if (options.minorBrowserVersion) {
        addClassJS(
          detectData.browser.name + "-" + getVersion(detectData.browser.value)
        );
      }
    }
  })();

  // export detection information
  return detectData;
})();

function ndkImagetoDataURLForSvg(url, callback) {
  var image = new Image();
  if (url.indexOf("http") !== -1) {
    image.onload = function () {
      var canvas = document.createElement("canvas");
      canvas.width = this.naturalWidth; // or 'width' if you want a special/scaled size
      canvas.height = this.naturalHeight; // or 'height' if you want a special/scaled size

      canvas.getContext("2d").drawImage(this, 0, 0);
      //callback(canvas.toDataURL('image/png'));
      callback(image);
    };

    image.src = url;
  } else {
    callback(false);
  }
}

function png2svg(bgImage, maskUrl, color, group) {
  //var options = { numberofcolors : 2, strokewidth : 0 , viewbox : true};
  var options = {
    corsenabled: false,
    ltres: 1,
    qtres: 1,
    pathomit: 1,
    rightangleenhance: true,

    // Color quantization
    colorsampling: 2,
    numberofcolors: 2,
    mincolorratio: 0,
    colorquantcycles: 3,

    // Layering method
    layering: 0,

    // SVG rendering
    strokewidth: 0,
    linefilter: true,
    scale: 1,
    roundcoords: 1,
    viewbox: true,
    desc: false,
    lcpr: 0,
    qcpr: 0,

    // Blur
    blurradius: 0,
    blurdelta: 10,
  };

  if (bgImage) {
    width = bgImage.naturalWidth;
    height = bgImage.naturalHeight;
    textureEffect = bgImage.src;

    background =
      '<defs><pattern xmlns="http://www.w3.org/2000/svg" id="texture_' +
      group +
      '" patternUnits="userSpaceOnUse" height="' +
      height +
      '" width="' +
      width +
      '" overflow="visible">';
    background +=
      '<image xlink:href="' +
      textureEffect +
      '" height="' +
      height +
      '" width="' +
      width +
      '" x="0" y="0" />';
    background += "</pattern></defs>";
    ImageTracer.imageToSVG(
      maskUrl,
      function (svgstr) {
        $("#visual_" + group).prepend(svgstr);
        $("#visual_" + group)
          .find("path")
          .attr("fill", "url(#texture_" + group + ")");
        svgNode = $("#visual_" + group).find("svg")[0];
        newSvgStr = svgNode.outerHTML;
        fullSvgStr = newSvgStr.replace(
          'xml:space="preserve">',
          'xml:space="preserve">' + background
        );
        imgNode =
          '<object class="replaced-svg composition_element" data="' +
          "data:image/svg+xml;base64," +
          window.btoa(fullSvgStr) +
          '" type="image/svg+xml">' +
          '<img src="maskUrl"/>' +
          "</object>";
        $("#visual_" + group).prepend(imgNode);
        $("#visual_" + group)
          .find("svg")
          .remove();
      },
      options
    );
  } else {
    ImageTracer.imageToSVG(
      maskUrl,
      function (svgstr) {
        $("#visual_" + group)
          .find("svg")
          .remove();
        $("#visual_" + group).prepend(svgstr);
        $("#visual_" + group)
          .find("path")
          .attr("fill", color);
        $("#visual_" + group)
          .find("svg")
          .addClassSVG("replaced-svg composition_element")
          .attr("id", "traced_svg_" + group);
      },
      options
    );
  }
  //$('.orientation_selection[data-group-target='+group+']').find('.active_orientation').trigger('click');
}

// paulo - trocar a cor do store
function trocaCorStore(campoStore, novaImagem) {

	if (checaSeImgExiste("https://" + document.domain + "/img/fechos_pergola/" + novaImagem + ".png") == true) {
		if (typeof zindexImgs[campoStore] !== 'undefined') {
			$("#image-block").append("<div class='absolute-visu view-0 absolute-img aluclass_fechos aluclass_fechos_tecidos aluclass_" + campoStore + "' style='z-index: 1;'><img class='composition_element img-reponsive aluclass_" + campoStore + "' src='/img/fechos_pergola/" + novaImagem + ".png'/></div>");
		} else {
			$("#image-block").append("<div class='absolute-visu view-0 absolute-img aluclass_fechos aluclass_fechos_tecidos aluclass_" + campoStore + "' style='z-index: 2;'><img class='composition_element img-reponsive aluclass_" + campoStore + "' src='/img/fechos_pergola/" + novaImagem + ".png'/></div>");
		}
	}
}


// paulo - habilitar ou desabilitar campo de cor do store se tiver 1 ou mais store selecionados
$(document).on('click', 'li[data-group="2001"], li[data-group="2017"], li[data-group="2014"], li[data-group="2018"], li[data-group="2280"], li[data-group="2281"], li[data-group="3103"], li[data-group="3106"], li[data-group="3108"], li[data-group="4778"], li[data-group="4777"], li[data-group="4877"], li[data-group="4878"]', function () {
	var group = $(this).data('group');

	var opcoesStore = [];
	// Pergola Promo (Starter)
	opcoesStore[2001] = ["15002", "15003", "15004", "15005"]; // Autoportee
  opcoesStore[2017] = ["15094", "15095", "15096"]; // Adossee
  /*
  // promo manuelle
  opcoesStore[4778] = ["27640", "27641", "27642"]; // adossee
  opcoesStore[4777] = ["27628", "27629", "27630", "27631"]; // autoportee
  */
  // Pergola Easy SM
	opcoesStore[4877] = ["28260", "28261", "28262", "28263"]; // Autoportee
  opcoesStore[4878] = ["28272", "28273", "28274"]; // Adossee
	// Pergola Grandlux Std
	opcoesStore[2280] = ["17805", "17806", "17807"]; // Adossee
	opcoesStore[2281] = ["17814", "17815", "17816", "17817"]; // Autoportee
	// Pergola Grandlux SM
	opcoesStore[2014] = ["15076", "15077", "15078", "15079"]; // Autoportee
  opcoesStore[2018] = ["15102", "15103", "15104"]; // Adossee
	//Pergola aluminium classique
	opcoesStore[3103] = ["22114", "22115", "22116"];
	//Pergola aluminium TOP PRIX
	opcoesStore[3106] = ["22129"];
	//Pergola aluminium classique  sur mesure
	opcoesStore[3108] = ["22143", "22144", "22145"];

	var totalStore = 0;
	for (i = 0; i < opcoesStore[group].length; i++) {
		if ($('li[data-id-value="' + opcoesStore[group][i] + '"]').hasClass('selected-accessory')) {
			totalStore++;
		}
	}

	if (totalStore == 0) {
		if ($("div[data-field='2234']").length) { // campo cor do store - Pergola Promo (Starter) Autoportee
      RemoveField('2234');
			$("#ndkcsfield_3065").html("");
			$("#text_3065").attr("value", "");
    } else if ($("div[data-field='4911']").length) { // campo cor do store - Pergola Promo (Starter) Adossee
      RemoveField('4911');
		} else if ($("div[data-field='4879']").length) { // campo cor do store - Pergola Easy SM Adossee
      RemoveField('4879');
			//$("#ndkcsfield_3065").html("");
			//$("#text_3065").attr("value", "");
    } else if ($("div[data-field='4881']").length) { // campo cor do store - Pergola Easy SM Autoportee
      RemoveField('4881');
			//$("#ndkcsfield_3065").html("");
			//$("#text_3065").attr("value", "");
		} else if ($("div[data-field='2251']").length) { // campo cor do store - Pergola Grandlux SM Adossee e Autoportee
      RemoveField('2251');
			$("#ndkcsfield_3065").html("");
			$("#text_3065").attr("value", "");
		} else if ($("div[data-field='2289']").length) { // campo cor do store - Pergola Grandlux Std Adossee
      RemoveField('2289');
			$("#ndkcsfield_3065").html("");
			$("#text_3065").attr("value", "");
    } else if ($("div[data-field='4913']").length) { // campo cor do store - Pergola Grandlux Std Autoportee
      RemoveField('4913');
			$("#ndkcsfield_3065").html("");
			$("#text_3065").attr("value", "");
		} else if ($("div[data-field='3104']").length) { // campo cor do store - Pergola aluminium classique toiture
      RemoveField('3104');
			$("#ndkcsfield_3065").html("");
			$("#text_3065").attr("value", "");
		} else if ($("div[data-field='3105']").length) { // campo cor do store - Pergola aluminium TOP PRIX
      RemoveField('3105');
			$("#ndkcsfield_3065").html("");
			$("#text_3065").attr("value", "");
		} else if ($("div[data-field='3109']").length) { // campo cor do store - Pergola aluminium classique SM
      RemoveField('3109');
			$("#ndkcsfield_3065").html("");
			$("#text_3065").attr("value", "");
		}
	} else {
		if ($("div[data-field='2234']").length) { // campo cor do store - Pergola Promo (Starter) Autoportee
      ShowField('2234');
		} else if ($("div[data-field='4911']").length) { // campo cor do store - Pergola Promo (Starter) Adossee
			ShowField('4911');
    } else if ($("div[data-field='4879']").length) { // campo cor do store - Pergola Easy SM Adossee
      ShowField('4879');
    } else if ($("div[data-field='4881']").length) { // campo cor do store - Pergola Easy SM Autoportee
			ShowField('4881');
		}	else if ($("div[data-field='2251']").length) { // campo cor do store - pergola Grandlux SM Adossee e Autoportee
			ShowField('2251');
		} else if ($("div[data-field='2289']").length) { // campo cor do store - Pergola Grandlux Std Adossee
			ShowField('2289');
    } else if ($("div[data-field='4913']").length) { // campo cor do store - Pergola Grandlux Std Autoportee
      ShowField('4913');
    } else if ($("div[data-field='3104']").length) { // campo cor do store - Pergola aluminium classique toiture
      ShowField('3104');
		} else if ($("div[data-field='3105']").length) { // campo cor do store - Pergola aluminium TOP PRIX
			ShowField('3105');
		} else if ($("div[data-field='3109']").length) { // campo cor do store - Pergola aluminium classique sur mersure
			ShowField('3109');
		}
	}

  // for (i = 0; i < opcoesStore[group].length; i++) {
	// 	if ($('li[data-id-value="' + opcoesStore[group][i] + '"]').hasClass('selected-accessory')) {
  //     trocaCorStore(campoStore, novaImagem);
  //     var campoCorStore = $(this).data("value");

  //     if (campoCorStore.match(/7016/)) {
  //       corStore = "7016";
  //     } else {
  //       corStore = "9016";
  //     }
	// 	}
	// }
});


// Joana - Habilitar ou desabilitar campo de cor do estore zip se tiver 1 ou mais estores zip selecionados
$(document).on('click', 'li[data-group="2001"], li[data-group="2017"], li[data-group="2014"], li[data-group="2018"], li[data-group="2280"], li[data-group="2281"], li[data-group="3103"], li[data-group="3106"], li[data-group="3108"], li[data-group="4778"], li[data-group="4777"], li[data-group="4877"], li[data-group="4878"]', function () {
	var group = $(this).data('group');

	var opcoesStoreZip = [];
	//Pergola Promo (Starter)
	opcoesStoreZip[2001] = ["31022", "31023", "31024", "31025"]; // Autoportee
  opcoesStoreZip[2017] = ["31019", "31020", "31021"]; // Adossee
  //Pergola Easy SM
	opcoesStoreZip[4877] = ["31008", "31009", "31010", "31011"]; // Autoportee
  opcoesStoreZip[4878] = ["30935", "30936", "30937"]; // Adossee
	//Pergola Grandlux STD
	opcoesStoreZip[2280] = ["31026", "31027", "31028"]; // Adossee
	opcoesStoreZip[2281] = ["31029", "31030", "31031", "31032"]; // Autoportee
	//Pergola Grandlux SM
	opcoesStoreZip[2014] = ["31015", "31016", "31017", "31018"]; // Autoportee
  opcoesStoreZip[2018] = ["31012", "31013", "31014"]; // Adossee
	//Pergola Aluminium Classique
	//opcoesStoreZip[3103] = ["22114", "22115", "22116"];
  //Pergola Aluminium TOP PRIX
	//opcoesStoreZip[3106] = ["22129"];
	//Pergola Aluminium Classique SM
	//opcoesStoreZip[3108] = ["22143", "22144", "22145"];

	var totalStoreZip = 0;
	for (i = 0; i < opcoesStoreZip[group].length; i++) {
		if ($('li[data-id-value="' + opcoesStoreZip[group][i] + '"]').hasClass('selected-accessory')) {
			totalStoreZip++;
		}
	}

	if (totalStoreZip == 0) {
		if ($("div[data-field='5599']").length) { // Campo cor do estore zip - Pergola Promo (Starter) Adossee e Autoportee
      RemoveField('5599');
			$("#ndkcsfield_3065").html("");
			$("#text_3065").attr("value", "");
		} else if ($("div[data-field='5587']").length) { // Campo cor do estore zip - Pergola Easy SM Adossee e Autoportee
      RemoveField('5587');
			$("#ndkcsfield_3065").html("");
			$("#text_3065").attr("value", "");
		} else if ($("div[data-field='5598']").length) { // Campo cor do estore zip - Pergola Grandlux SM Adossee e Autoportee
      RemoveField('5598');
			$("#ndkcsfield_3065").html("");
			$("#text_3065").attr("value", "");
		} else if ($("div[data-field='5600']").length) { // Campo cor do estore zip - Pergola Grandlux STD Adossee e Autoportee
      RemoveField('5600');
			$("#ndkcsfield_3065").html("");
			$("#text_3065").attr("value", "");
		} else if ($("div[data-field='3104']").length) { // Campo cor do estore zip - Pergola Aluminium Classique
      RemoveField('3104');
			$("#ndkcsfield_3065").html("");
			$("#text_3065").attr("value", "");
		} else if ($("div[data-field='3105']").length) { // Campo cor do estore zip - Pergola Aluminium TOP PRIX
      RemoveField('3105');
			$("#ndkcsfield_3065").html("");
			$("#text_3065").attr("value", "");
		} else if ($("div[data-field='3109']").length) { // Campo cor do estore zip - Pergola Aluminium Classique SM
      RemoveField('3109');
			$("#ndkcsfield_3065").html("");
			$("#text_3065").attr("value", "");
		}
	} else {
		if ($("div[data-field='5599']").length) { // Campo cor do estore zip - Pergola Promo (Starter) Adossee e Autoportee
      ShowField('5599');
    } else if ($("div[data-field='5587']").length) { // Campo cor do estore zip - Pergola Easy SM Adossee e Autoportee
      ShowField('5587');
		}	else if ($("div[data-field='5598']").length) { // Campo cor do estore zip - Pergola Grandlux SM Adossee e Autoportee
			ShowField('5598');
		} else if ($("div[data-field='5600']").length) { // Campo cor do estore zip - Pergola Grandlux STD Adossee e Autoportee
			ShowField('5600');
    } else if ($("div[data-field='3104']").length) { // Campo cor do estore zip - Pergola Aluminium Classique
      ShowField('3104');
		} else if ($("div[data-field='3105']").length) { // Campo cor do estore zip - Pergola Aluminium TOP PRIX
			ShowField('3105');
		} else if ($("div[data-field='3109']").length) { // Campo cor do estore zip - Pergola Aluminium Classique SM
			ShowField('3109');
		}
	}

});


// paulo - se a cor do tecido do store for diferente da estrutura, aplica as cores
$(document).on('click', 'li[data-group="2234"], li[data-group="4911"], li[data-group="2251"], li[data-group="2289"], li[data-group="4913"], li[data-group="3104"], li[data-group="3105"], li[data-group="3109"], li[data-group="4779"], li[data-group="4879"], li[data-group="4881"], li[data-group="5587"], li[data-group="5598"], li[data-group="5599"], li[data-group="5600"]', function () {
	var campoCorStore = $(this).data("value");

	if (campoCorStore.match(/7016/)) {
		corStore = "7016";
  } else if (campoCorStore.match(/3030/)) {
		corStore = "3030";
  } else if (campoCorStore.match(/0202/)) {
		corStore = "0202";
	} else {
		corStore = "9016";
	}
	// console.log('corStore '+corStore);

	var camposStores = [];
	// campos Pergola Promo (Starter): "15002", "15003", "15004", "15005", "15094", "15095", "15096" --- 31019", "31020", "31021", "31022", "31023", "31024", "31025"
  // campos Promo Manuelle: "27640", "27641", "27642", "27628", "27629", "27630", "27631"
  // campos Pergola Grandlux SM: "15076", "15077", "15078", "15079", "15102", "15103", "15104" --- "31012", "31013", "31014", "31015", "31016", "31017", "31018"
	// campos Pergola Grandlux Std: "17805", "17806", "17807", "17814", "17815", "17816", "17817" --- "31026", "31027", "31028", "31029", "31030", "31031", "31032"
  // campos Pergola Easy SM: "28260", "28261", "28262", "28263", "28272", "28273", "28274" --- "30935", "30936", "30937", "31008", "31009", "31010", "31011"
  // campos Pergola Aluminium Classique Standard: "22114", "22115", "22116"
  // campos Pergola Aluminium Top Prix: 22129
  // campos Pergola Aluminium Clasique Sur Mesure: "22143", "22144", "22145"
	camposStores = ["15002", "15003", "15004", "15005", "15094", "15095", "15096", "15076", "15077", "15078", "15079", "15102", "15103", "15104", "17805", "17806", "17807", "17814", "17815", "17816", "17817", "27640", "27641", "27642", "27628", "27629", "27630", "27631", "28260", "28261", "28262", "28263", "28272", "28273", "28274", "22114", "22115", "22116", "22129", "22143", "22144", "22145","30935","30936","30937", "31008", "31009", "31010", "31011", "31012", "31013", "31014", "31015", "31016", "31017", "31018", "31019", "31020", "31021", "31022", "31023", "31024", "31025", "31026", "31027", "31028", "31029", "31030", "31031", "31032"];

	$.each($('li[data-group="2401"].selected-color, li[data-group="2409"].selected-color, li[data-group="2425"].selected-color, li[data-group="2011"].selected-color, li[data-group="2019"].selected-color, li[data-group="2007"].selected-color, li[data-group="2302"].selected-color, li[data-group="2278"].selected-color, li[data-group="2279"].selected-color, li[data-group="4769"].selected-color, li[data-group="4770"].selected-color, li[data-group="4864"].selected-color, li[data-group="4865"].selected-color, li[data-group="5151"].selected-color, li[data-group="5166"].selected-color'), function () {
		campoCorEstrutura = $(this).data("value");
	});

	if (campoCorEstrutura.match(/7016/)) {
		corEstrutura = "7016";
		legendaCorEstrutura = "Gris RAL " + corEstrutura;
	} else if (campoCorEstrutura.match(/9016/)) {
		corEstrutura = "9016";
		legendaCorEstrutura = "Blanc RAL " + corEstrutura;
	} else if (campoCorEstrutura.match(/9005/)) {
		corEstrutura = "9005";
		legendaCorEstrutura = "Noir RAL " + corEstrutura;
	} else if (campoCorEstrutura.match(/8019/)) {
		corEstrutura = "8019";
		legendaCorEstrutura = "Gris RAL " + corEstrutura;
	} else if (campoCorEstrutura.match(/8014/)) {
		corEstrutura = "8014";
		legendaCorEstrutura = "Marron RAL " + corEstrutura;
	} else if (campoCorEstrutura.match(/7035/)) {
		corEstrutura = "7035";
		legendaCorEstrutura = "Gris RAL " + corEstrutura;
	} else if (campoCorEstrutura.match(/6005/)) {
		corEstrutura = "6005";
		legendaCorEstrutura = "Vert RAL " + corEstrutura;
	} else if (campoCorEstrutura.match(/5015/)) {
		corEstrutura = "5015";
		legendaCorEstrutura = "Bleu RAL " + corEstrutura;
	} else if (campoCorEstrutura.match(/5013/)) {
		corEstrutura = "5013";
		legendaCorEstrutura = "Bleu RAL " + corEstrutura;
	} else if (campoCorEstrutura.match(/3005/)) {
		corEstrutura = "3005";
		legendaCorEstrutura = "Rouge RAL " + corEstrutura;
	} else {
		corEstrutura = "1015";
		legendaCorEstrutura = "Ivoire RAL " + corEstrutura;
	}


	if ($(this).data("group") == "2234" || $(this).data("group") == "4911" || $(this).data("group") == "4779" || $(this).data("group") == "2289" || $(this).data("group") == "4913" || $(this).data("group") == "5599" || $(this).data("group") == "5600") { // Pergola Promo (Starter), Promo Manuelle e Grandlux Std
		if (corStore != corEstrutura) {
			$("div").remove(".aluclass_fechos_tecidos");
			for (i = 0; i < camposStores.length; i++) {
				if ($("img.aluclass_" + camposStores[i]).length) {
					var novaImagem = camposStores[i] + "-" + corStore + "-tecido";
					console.log('novaImagem ' + novaImagem);
					trocaCorStore(camposStores[i], novaImagem);
				}
			}
		} else {
			$("div").remove(".aluclass_fechos_tecidos");
		}
	} else { // Pergola Grandlux SM e Easy SM
		if (corStore != "7016" && corStore != "3030") {
			$("div").remove(".aluclass_fechos_tecidos");
			for (i = 0; i < camposStores.length; i++) {
				if ($("img.aluclass_" + camposStores[i]).length) {
					var novaImagem = camposStores[i] + "-" + corStore + "-tecido";
					console.log('novaImagem ' + novaImagem);
					trocaCorStore(camposStores[i], novaImagem);
				}
			}
		} else {
			$("div").remove(".aluclass_fechos_tecidos");
		}
	}

	var totalFechos = 0;
	console.log(camposStores.length);
	for (i = 0; i < camposStores.length; i++) {
		if ($('li[data-id-value="' + camposStores[i] + '"]').hasClass('selected-accessory')) {
			totalFechos++;
		}
	}
	console.log(totalFechos);
	if (totalFechos > 0) {
		console.log('atribui a cor da estrutura ' + legendaCorEstrutura);
		$("#ndkcsfield_3065").html(legendaCorEstrutura);
		$("#text_3065").attr("value", legendaCorEstrutura);
	}

});

// paulo ++ mostra a cor da lamina gris se cliente quiser lamina na mesma cor da pergola promo - criamos isso pois é uma pergunta com opcoes tipo radio, que nao tem efeito visual no codigo nativo do ndk
$(document).on('click', 'input.ndk-radio', function () {
	var ndkradio = $(this).data('group');
	var opcaoRadio = $(this).data('id-value');
	if (ndkradio == "2264" || ndkradio == "2262") {
		if (opcaoRadio == "17675" || opcaoRadio == "17673") {
			if (!$("div.aluclass_" + opcaoRadio + "").length) {
				$("#image-block").append("<div class='absolute-visu view-0 absolute-img aluclass_fechos aluclass_lamina_pergola aluclass_" + opcaoRadio + "' style='z-index: 1;'><img class='composition_element img-reponsive aluclass_" + opcaoRadio + "' src='/img/laminas_pergola/lamina-gris-promo.png'/></div>");
			}
		} else {
			// console.log('remove lamina cinza');
			$("div").remove(".aluclass_lamina_pergola");
		}
	}
});

$(document).on('click', 'li[data-group="2522"]', function () {
	var corEscolhida = $(this).data("value");
	if (corEscolhida.match(/7016/)) {
		corEscolhida = "7016";
	} else {
		corEscolhida = "9016";
	}
	if (corEscolhida == "9016") {
		var novaImagem = "store-vertical-frente-9016-tecido";
		console.log('novaImagem ' + novaImagem);
		$("#image-block").append("<div class='absolute-visu view-0 absolute-img aluclass_fechos_tecidos' style='z-index: 2;'><img class='composition_element img-reponsive' src='/img/fechos_pergola/" + novaImagem + ".png'/></div>");
	} else {
		$("div").remove(".aluclass_fechos_tecidos");
	}
});
// paulo -- mostra a cor da lamina gris se cliente quiser lamina na mesma cor da pergola promo - criamos isso pois é uma pergunta com opcoes tipo radio, que nao tem efeito visual no codigo nativo do ndk
