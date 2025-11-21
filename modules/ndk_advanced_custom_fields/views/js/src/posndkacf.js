
function ndkone(aluCustomization,aluCustomizationCount,aluCustomizationLength) {
  setTimeout(function(){
    var aluCustomizationXX = aluCustomization[aluCustomizationCount][1].replace("XX", "=");
    $("#ndkcsfield_"+aluCustomization[aluCustomizationCount][0]).val(aluCustomizationXX).trigger("change");

     if(aluCustomizationCount == aluCustomizationLength-1){
      $('#ndkloader').remove();
    }

  }, 1000*aluCustomizationCount);

}

function ndktwo(aluCustomization,aluCustomizationCount,aluCustomizationLength) {
  setTimeout(function(){
    $("img.img-value[data-id-value='" + aluCustomization[aluCustomizationCount][1] + "']").trigger("click");
     if(aluCustomizationCount == aluCustomizationLength-1){
      $('#ndkloader').remove();
    }
  }, 1000*aluCustomizationCount);
}

function ndkthree(aluCustomization,aluCustomizationCount,aluCustomizationLength) {
  setTimeout(function(){
    $("li.color-ndk[data-id-value='" + aluCustomization[aluCustomizationCount][1] + "']").trigger("click");

     if(aluCustomizationCount == aluCustomizationLength-1){
      $('#ndkloader').remove();
    }
  }, 1000*aluCustomizationCount);
}
function ndkfour(aluCustomization,aluCustomizationCount,aluCustomizationLength) {
  setTimeout(function(){
    $("input.ndk-radio[data-id-value='" + aluCustomization[aluCustomizationCount][1] + "']").trigger("click");

     if(aluCustomizationCount == aluCustomizationLength-1){
      $('#ndkloader').remove();
    }
  }, 1000*aluCustomizationCount);
}
function ndkzero(aluCustomization,aluCustomizationCount,aluCustomizationLength) {
  setTimeout(function(){
    $("#text_"+aluCustomization[aluCustomizationCount][0]).val(aluCustomization[aluCustomizationCount][1]).change();
    $("#ndkcsfield_"+aluCustomization[aluCustomizationCount][0]).val(aluCustomization[aluCustomizationCount][1]).change();

     if(aluCustomizationCount == aluCustomizationLength-1){
      $('#ndkloader').remove();
    }
  }, 1000*aluCustomizationCount);
}
function ndkonze(aluCustomization,aluCustomizationCount,aluCustomizationLength) {
  setTimeout(function(){
    var assecarray = aluCustomization[aluCustomizationCount][1].split("|");
    assecarray.forEach(function(assec)  {
      var quantyarray = assec.split("_");
      $("#ndk-accessory-quantity-" + quantyarray[0] ).val(quantyarray[1]).change();
    });

     if(aluCustomizationCount == aluCustomizationLength-1){
      $('#ndkloader').remove();
    }
  }, 1000*aluCustomizationCount);
}
function ndktwentythree(aluCustomization,aluCustomizationCount,aluCustomizationLength) {
  setTimeout(function(){
    var assecarray = aluCustomization[aluCustomizationCount][1].split("_");
    assecarray.forEach(function(assec)  {
      if(!$( "li.accessory-ndk-no-quantity[data-id-value='" + assec + "']" ).hasClass( "selected-accessory" )) {
        $("#img_div_" + assec).trigger("click");
      }
    });

     if(aluCustomizationCount == aluCustomizationLength-1){
      $('#ndkloader').remove();
    }

  }, 1000*aluCustomizationCount);
}
function ndkeithteen(aluCustomization,aluCustomizationCount,aluCustomizationLength) {
  setTimeout(function(){
    var aluCustomizationArray = aluCustomization[aluCustomizationCount][1].split('|');

    $("#dimension_text_width_"+aluCustomization[aluCustomizationCount][0]).val(aluCustomizationArray[0]).trigger("change").trigger("focusout");
    $("#dimension_text_height_"+aluCustomization[aluCustomizationCount][0]).val(aluCustomizationArray[1]).trigger("change").trigger("focusout");

     if(aluCustomizationCount == aluCustomizationLength-1){
      $('#ndkloader').remove();
    }

  }, 1000*aluCustomizationCount);
}
function ndknineteen(aluCustomization,aluCustomizationCount,aluCustomizationLength) {
  setTimeout(function(){
    var aluCustomizationArray = aluCustomization[aluCustomizationCount][1].split('|');
    var aluCustomizationXX = aluCustomizationArray[0].replace("XX", "=");
    $("#dimension_text_width_"+aluCustomization[aluCustomizationCount][0]).val(aluCustomizationXX).trigger("change").trigger("focusout");
    var aluCustomizationXX = aluCustomizationArray[1].replace("XX", "=");
    $("#dimension_text_height_"+aluCustomization[aluCustomizationCount][0]).val(aluCustomizationXX).trigger("change").trigger("focusout");

    if(aluCustomizationCount == aluCustomizationLength-1) {
      $('#ndkloader').remove();
    }

  }, 1000*aluCustomizationCount);
}

$(window).on("load",  function () {

  var aluCustomizationLength = aluCustomization.length;

  if(aluCustomizationLength > 0){
    $('body').append('<div class="ndk-loader" id="ndkloader"><div class="sk-folding-cube"><div class="sk-cube1 sk-cube"></div><div class="sk-cube2 sk-cube"></div><div class="sk-cube4 sk-cube"></div><div class="sk-cube3 sk-cube"></div></div></div>');

      setTimeout(function () {

        var aluCustomizationLength = aluCustomization.length;
        var typealuCustomization = 0;
        var aluCustomizationCount = 0;

        for(aluCustomizationCount = 0; aluCustomizationCount < aluCustomizationLength;  aluCustomizationCount++){

          typealuCustomization =  $(".form-group[data-field='" + aluCustomization[aluCustomizationCount][0] + "']").data('typefield');

          switch(typealuCustomization){
            case 1:
              ndkone(aluCustomization,aluCustomizationCount,aluCustomizationLength);
            break;
            case 2:
              ndktwo(aluCustomization,aluCustomizationCount,aluCustomizationLength);
            case 3:
              ndkthree(aluCustomization,aluCustomizationCount,aluCustomizationLength);
            break;
            case 4:
              ndkfour(aluCustomization,aluCustomizationCount,aluCustomizationLength);
            break;
            case 0:
              ndkzero(aluCustomization,aluCustomizationCount,aluCustomizationLength);
            break;

            case 11:
              ndkonze(aluCustomization,aluCustomizationCount,aluCustomizationLength);
            break;

            case 23:
              ndktwentythree(aluCustomization,aluCustomizationCount,aluCustomizationLength);
            break;
            case 18:
              ndkeithteen(aluCustomization,aluCustomizationCount,aluCustomizationLength);
            break
            case 19:
            ndknineteen(aluCustomization,aluCustomizationCount,aluCustomizationLength);
            break
          };
      }

    }, 1000);
  }

});

