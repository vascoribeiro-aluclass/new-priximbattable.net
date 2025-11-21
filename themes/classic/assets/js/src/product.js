var alugalleryarray = [];
var alugalleryarraythumnails = [];
var alugalleryarrayvideo = [];
var alugalleryarrayvideo_thumbs = [];
var alugallercount = 0;

function amIclicked(e, element) {
  e = e || event;
  var target = e.target || e.srcElement;
  if (target.id == element.id)
    return true;
  else
    return false;
}

function showAluGallery() {

  alugalleryarray = $(".alugallery").map(function () { return $(this).attr("data-image-alu"); }).get();
  alugalleryarrayvideo = $(".alugallery").map(function () { return $(this).attr("data-video-alu"); }).get();
  alugalleryarray = alugalleryarray.concat(alugalleryarrayvideo);
  // if(yes == "true"){
  //   alugalleryarray.forEach(string => {
  //     $("#alugallerybox-img").html('<img class="alugallerybox-image" src="" alt="">');
  //   });
  //   $(".alugallerybox-image").attr("src", src);
  // }else{
  //   alugalleryarray = alugalleryarray.concat(alugalleryarrayvideo);
  //   alugalleryarray.forEach(string => {
  //     if(string.includes("youtube")){
  //       $("#alugallerybox-img").html('<iframe class="alugallerybox-image" width="800" height="800" src="" frameborder="0" allowfullscreen=""></iframe>');
  //     }else{
  //       $("#alugallerybox-img").html('<img class="alugallerybox-image" src="" alt="">');
  //     }
  //   });
  //   $(".alugallerybox-image").attr("src",alugalleryarray[0]);
  // }

  // var parent = $('.alugallerybox-overlay-fixed');
  // var child = $('.alugallerybox-type-image');
  // var childbox = $('#alugallerybox-img');
  // var childboxload = $('#alugallerybox-loading');
  // var widthalu = screen.width-(screen.width*0.08);
  // var leftbox =parent.width()/2 - child.width()/2

  // if(leftbox < 0){
  //   leftbox = (screen.width*0.08)/2;
  // }

  // if(widthalu > 800){
  //   widthalu = 800;
  // }
  // childbox.css({ width: widthalu,  height: widthalu });
  // childboxload.css({ width: widthalu,  height: widthalu });
  // child.css({ width: widthalu,  left: leftbox });
  // $("#alugallerybox-product").show();
}

let currentSlide = 0;
// $(".prev").css("display", "none");
alugalleryarraythumnails = $(".alugalleryThumbs").map(function () {
  return $(this).attr("src");
}).get();
alugalleryarrayvideo_thumbs = $(".alugallery").map(function () {
  return $(this).attr("data-video-alu");
}).get();

var alugalleryarraythumnails = alugalleryarraythumnails.concat(alugalleryarrayvideo_thumbs);

// if(window.matchMedia("(min-width: 768px)").matches && alugalleryarraythumnails.length < 4){
//   $('.next.button_carrosel').css("display","none");
//   $('.prev.button_carrosel').css("display","none");
// }

var width_total_thumbs = 0;
var currentthumbnail = 0;
// if ($(".check3D").val() == "yes") {
//   if (window.matchMedia("(max-width: 767px)").matches) {
//     width_total_thumbs = 1;
//   } else if (window.matchMedia("(max-width: 1300px)").matches) {
//     width_total_thumbs = 2;
//   } else {
//     width_total_thumbs = 3;
//   }
// } else {
//   if (window.matchMedia("(max-width: 767px)").matches) {
//     width_total_thumbs = 2;
//   } else {
//     width_total_thumbs = 4;
//   }
// }

if (window.matchMedia("(min-width: 320px)").matches && window.matchMedia("(max-width: 440px)").matches) {
  width_total_thumbs = 2;
  $("#img_thumb_0").removeClass("pb-20");
}
if (window.matchMedia("(min-width: 441px)").matches && window.matchMedia("(max-width: 565px)").matches) {
  width_total_thumbs = 3;
  $("#img_thumb_0").removeClass("pb-20");
}
if (window.matchMedia("(min-width: 566px)").matches) {
  width_total_thumbs = 4;
  $("#img_thumb_0").removeClass("pb-20");
}

if (window.matchMedia("(min-width: 768px)").matches) {
  width_total_thumbs = 2;
  $("#img_thumb_0").removeClass("pb-20");
}

if (window.matchMedia("(min-width: 1120px)").matches) {
  width_total_thumbs = 3;
  $("#img_thumb_0").removeClass("pb-20");
}

if (window.matchMedia("(min-width: 1432px)").matches) {
  width_total_thumbs = 4;
  $("#img_thumb_0").removeClass("pb-20");
}
if (window.matchMedia("(max-width: 767px)").matches) {
  if (alugalleryarraythumnails.length == 0) {
    $('.prev').css("display", "none");
    $('.next').css("display", "none");
  }else if(alugalleryarraythumnails.length == 1){
    $('.prev').css("display","none");
    $('.next').css("display","none");
  }else if(alugalleryarraythumnails.length == 2 && $(".check3D").val() != "yes"){
    $('.prev').css("display","none");
    $('.next').css("display","none");
  }else if(alugalleryarraythumnails.length >= 2 && $(".check3D").val() == "yes" && window.matchMedia("(max-width: 440px)").matches){
    $('.prev').css("display","block");
    $('.next').css("display","block");
  }else if(alugalleryarraythumnails.length >= 2 && alugalleryarraythumnails.length <= 3 && $(".check3D").val() == "yes" && window.matchMedia("(min-width: 441px)").matches){
    $('.prev').css("display","none");
    $('.next').css("display","none");
  }
}else{
  if (alugalleryarraythumnails.length == 0){
    $('.prev').css("display","none");
    $('.next').css("display","none");
  }
  if (alugalleryarraythumnails.length == 1){
    $('.prev').css("display","none");
    $('.next').css("display","none");
  }
  if (alugalleryarraythumnails.length == 2){
    $('.prev').css("display","none");
    $('.next').css("display","none");
  }
  if(alugalleryarraythumnails.length == 3){
    $('.prev').css("display","none");
    $('.next').css("display","none");
  }
  if (alugalleryarraythumnails.length == 3 && width_total_thumbs == 3) {
    $('.prev').css("display", "none");
    $('.next').css("display", "none");
  }

  if(alugalleryarraythumnails.length == 4 && $(".check3D").val() != "yes"){
    $('.prev').css("display","none");
    $('.next').css("display","none");
  }

  if(alugalleryarraythumnails.length > 3 && $(".check3D").val() == "yes"){
    $('.prev').css("display","block");
    $('.next').css("display","block");
  }
}
if ($(".check3D").val() == "yes") {
  alugalleryarraythumnails.unshift("/img/cms/3d.png");
  var a = document.createElement('a');
  var b = document.createElement('a');
  var img_3d = document.createElement('img');
  var img_3d_b = document.createElement('img');
  // a.href = "";
  a.setAttribute("data-id", $(".dataId").val());
  a.setAttribute("data-title-product", $(".dataTitleProduct").val());
  a.setAttribute("class", "embed3DAluclass");
  img_3d.src = "/img/cms/3d.png";
  img_3d.alt = "";
  img_3d.setAttribute("class", "img-3d");
  a.appendChild(img_3d);
  b.setAttribute("data-id", $(".dataId").val());
  b.setAttribute("data-title-product", $(".dataTitleProduct").val());
  b.setAttribute("class", "embed3DAluclass");
  img_3d_b.src = "/img/cms/3d.png";
  img_3d_b.alt = "";
  img_3d_b.setAttribute("class", "img-3d");
  b.appendChild(img_3d_b);
}

//Slides Mobile
// function loadSlides() {
//   const slidesContainer = document.querySelector('.slides');
//   slidesContainer.innerHTML = ''; // Limpa o conteúdo atual
//   // if ($(".check3D").val() == "yes") {
//   //   slidesContainer.appendChild(a);
//   // }
//   for (let i = 0; i < width_total_thumbs; i++) {
//     if (currentSlide + i < alugalleryarraythumnails.length) {
//       // console.log('total= '+ 'id_thumbs_'+(currentSlide + i));
//       const img = document.createElement('img');
//       const video_thumbs = "youtube";
//       img.src = alugalleryarraythumnails[currentSlide + i];
//       img.alt = "";
//       img.className = "image-padd-thumnails";
//       img.onclick = () => openPopupThumbnails($('.id_thumbs_' + (currentSlide + i)).data('click'));
//       slidesContainer.appendChild(img);
//     }
//   }
// }

function loadSlides() {
  const slidesContainer = document.querySelector('.slides');
  slidesContainer.innerHTML = ''; // Limpa o conteúdo atual
  // if($(".check3D").val() == "yes"){
  //   slidesContainer.appendChild(a);
  // }
  for (let i = 0; i < width_total_thumbs; i++) {
    if (currentSlide + i < alugalleryarraythumnails.length) {
      const img = document.createElement('img');
      const video_thumbs = "youtube";
      if(alugalleryarraythumnails[currentSlide + i].indexOf(video_thumbs) != -1){
        img.src = "/img/cms/video_youtube.png";
      }else{
        img.src = alugalleryarraythumnails[currentSlide + i];
      }
      img.alt = "";
      if($(".check3D").val() == "yes"){
        if(alugalleryarraythumnails[currentSlide + i] == "/img/cms/3d.png"){
          img.onclick = () => window.open("https://priximbattable.net/3d/" + $(".dataId").val() + ".html?name=" + $(".dataTitleProduct").val(), "_blank");
          img.setAttribute("id", "img_thumb_" + i);
          img.setAttribute("class", "img-3d");
        }else{
          img.setAttribute("id", "img_thumb_" + i);
          img.className = "image-padd-thumnails animation-in";
          // img.className = "pb-20";
          if(alugalleryarraythumnails[currentSlide + i].indexOf(video_thumbs) != -1){
            img.onclick = () => openPopupThumbnails($('.id_thumbs_video_' + ((currentSlide + i)-1)).data('videoAlu'), (currentSlide + i)-1);
          }else{
            img.onclick = () => openPopupThumbnails($('.id_thumbs_' + ((currentSlide + i)-1)).data('click'), (currentSlide + i)-1);
          }
        }
      }else{
        if(alugalleryarraythumnails[currentSlide + i] == "/img/cms/3d.png"){
          img.onclick = () => window.open("https://priximbattable.net/3d/" + $(".dataId").val() + ".html?name=" + $(".dataTitleProduct").val(), "_blank");
          img.setAttribute("id", "img_thumb_" + i);
          img.setAttribute("class", "img-3d");
        }else{
          img.setAttribute("id", "img_thumb_" + i);
          img.className = "image-padd-thumnails animation-in";
          // img.className = "pb-20";
          if(alugalleryarraythumnails[currentSlide + i].indexOf(video_thumbs) != -1){
            img.onclick = () => openPopupThumbnails($('.id_thumbs_video_' + ((currentSlide + i))).data('videoAlu'), (currentSlide + i));
          }else{
            img.onclick = () => openPopupThumbnails($('.id_thumbs_' + ((currentSlide + i))).data('click'), (currentSlide + i));
          }
        }
      }
      slidesContainer.appendChild(img);
      // $("#img_thumb_0").addClass("pb-20");

      // if (window.innerWidth > 1300) {
      //   $("#img_thumb_1").addClass("pb-20");
      // }
    }
  }
}

//Slides Desktop
// function loadSlides2() {
//   const slidesContainer2 = document.querySelector('.slides2');
//   slidesContainer2.innerHTML = ''; // Limpa o conteúdo atual
//   if ($(".check3D").val() == "yes") {
//     slidesContainer2.appendChild(b);
//   }
//   for (let i = 0; i < width_total_thumbs; i++) {
//     if (currentSlide + i < alugalleryarraythumnails.length) {
//       const img = document.createElement('img');
//       img.src = alugalleryarraythumnails[currentSlide + i];
//       img.alt = "";
//       img.setAttribute("id", "img_thumb_" + i);
//       img.className = "image-padd-thumnails";
//       img.onclick = () => openPopupThumbnails($('.id_thumbs_' + (currentSlide + i)).data('click'));
//       slidesContainer2.appendChild(img);
//       $("#img_thumb_0").addClass("pb-20");

//       if (window.innerWidth > 1300) { $("#img_thumb_1").addClass("pb-20"); }
//       else { $("#img_thumb_1").addClass("pb-50"); }

//       if (i == 2 && $(".check3D").val() == "yes") {
//         $("#img_thumb_" + i).addClass("pb-50");
//       } else if (i == 3 && $(".check3D").val() != "yes") {
//         $("#img_thumb_" + i).addClass("pb-50");
//       } else if ($(".check3D").val() != "yes") {
//         $("#img_thumb_0").css("padding-top", "50px");
//       }
//     }
//   }
// }

function loadSlides2() {
  const slidesContainer2 = document.querySelector('.slides2');
  slidesContainer2.innerHTML = ''; // Limpa o conteúdo atual
  // if ($(".check3D").val() == "yes") {
  //   slidesContainer2.appendChild(b);
  // }
  for (let i = 0; i < width_total_thumbs; i++) {
    if (currentSlide + i < alugalleryarraythumnails.length) {
      const img = document.createElement('img');
      const video_thumbs = "youtube";
      if(alugalleryarraythumnails[currentSlide + i].indexOf(video_thumbs) != -1){
        img.src = "/img/cms/video_youtube.png";
      }else{
        img.src = alugalleryarraythumnails[currentSlide + i];
      }
      img.alt = "";
      if($(".check3D").val() == "yes"){
        if(alugalleryarraythumnails[currentSlide + i] == "/img/cms/3d.png"){
          img.onclick = () => window.open("https://priximbattable.net/3d/" + $(".dataId").val() + ".html?name=" + $(".dataTitleProduct").val(), "_blank");
          img.setAttribute("id", "img_thumb_" + i);
          img.setAttribute("class", "img-3d");
        }else{
          img.setAttribute("id", "img_thumb_" + i);
          img.className = "pb-20 image-padd-thumnails animation-in";
          if(alugalleryarraythumnails[currentSlide + i].indexOf(video_thumbs) != -1){
            img.onclick = () => openPopupThumbnails($('.id_thumbs_video_' + ((currentSlide + i)-1)).data('videoAlu'), (currentSlide + i)-1);
            img.className = "img-3d";
          }else{
            img.onclick = () => openPopupThumbnails($('.id_thumbs_' + ((currentSlide + i)-1)).data('click'), (currentSlide + i)-1);
          }
        }
      }else{
        if(alugalleryarraythumnails[currentSlide + i] == "/img/cms/3d.png"){
          img.onclick = () => window.open("https://priximbattable.net/3d/" + $(".dataId").val() + ".html?name=" + $(".dataTitleProduct").val(), "_blank");
          img.setAttribute("id", "img_thumb_" + i);
          img.setAttribute("class", "img-3d");
        }else{
          img.setAttribute("id", "img_thumb_" + i);
          img.className = "pb-20 image-padd-thumnails animation-in";
          if(alugalleryarraythumnails[currentSlide + i].indexOf(video_thumbs) != -1){
            img.onclick = () => openPopupThumbnails($('.id_thumbs_video_' + ((currentSlide + i))).data('videoAlu'), (currentSlide + i));
            img.className = "img-3d";
          }else{
            img.onclick = () => openPopupThumbnails($('.id_thumbs_' + ((currentSlide + i))).data('click'), (currentSlide + i));
          }
        }
      }
      // img.setAttribute("data-img", currentSlide + i);
      // img.setAttribute("data-id", currentSlide + i)
      slidesContainer2.appendChild(img);
      $("#img_thumb_0").addClass("pb-20");

      if (window.innerWidth > 1300) {
        $("#img_thumb_1").addClass("pb-20");
      }
      // console.log(currentSlide + i);
    }
  }
}

function moveSlides(n) {
  const totalSlides = alugalleryarraythumnails.length;
  currentSlide += n;
  // console.log(currentSlide);
  // if (currentSlide == 1) {
  //   $('.prev').css("display", "block");
  //   $('.next').css("display", "block");
  //   if (window.innerWidth > 767) { $('.img-3d').css("padding-top", "45px"); }
  // }
  // if (currentSlide <= 0) {
  //   $('.prev').css("display", "none");
  //   $('.next').css("display", "block");
  //   if (window.innerWidth > 767) { $('.img-3d').css("padding-top", "0px"); }
  // }

  // if (currentSlide == totalSlides - width_total_thumbs) {
  //   $('.prev').css("display", "block");
  //   $('.next').css("display", "none");
  // }
  // if (currentSlide < totalSlides - width_total_thumbs && currentSlide > 0) {
  //   $('.prev').css("display", "block");
  //   $('.next').css("display", "block");
  // }

  // if (currentSlide < 0) {
  //   currentSlide = 0; // Limite inferior
  // } else if (currentSlide > totalSlides - width_total_thumbs) {
  //   currentSlide = totalSlides - width_total_thumbs; // Limite superior
  // }

  // if (window.matchMedia("(max-width: 767px)").matches) {
  //   loadSlides(); // Carrega as imagens atualizadas
  // } else if (window.matchMedia("(min-width: 768px)").matches) {
  //   loadSlides2(); // Carrega as imagens atualizadas
  // }

  if (currentSlide < 0) {
    currentSlide = totalSlides - width_total_thumbs; // Limite inferior
  }
  else if (currentSlide > totalSlides - width_total_thumbs) {
      currentSlide = 0; // Limite superior
      // $("#img_thumb_0").addClass("pt-50");
  }

  if (window.matchMedia("(max-width: 767px)").matches) {
    $("#img_thumb_0").removeClass("animation-in");
    $("#img_thumb_1").removeClass("animation-in");
    $("#img_thumb_2").removeClass("animation-in");
    $("#img_thumb_3").removeClass("animation-in");

    $("#img_thumb_0").addClass("animation-out");
    $("#img_thumb_1").addClass("animation-out");
    $("#img_thumb_2").addClass("animation-out");
    $("#img_thumb_3").addClass("animation-out");
    setTimeout(() => {
      loadSlides();
      $("#img_thumb_0").css("opacity", "0");
      $("#img_thumb_1").css("opacity", "0");
      $("#img_thumb_2").css("opacity", "0");
      $("#img_thumb_3").css("opacity", "0");
      setTimeout(() => {
        $("#img_thumb_0").addClass("animation-in");
        $("#img_thumb_1").addClass("animation-in");
        $("#img_thumb_2").addClass("animation-in");
        $("#img_thumb_3").addClass("animation-in");
        $("#img_thumb_0").on("animationend", () => {
          $("#img_thumb_0").css("opacity", "1");
          $("#img_thumb_1").css("opacity", "1");
          $("#img_thumb_2").css("opacity", "1");
          $("#img_thumb_3").css("opacity", "1");
        });
      }, 0);
    }, 900);
  }else if(window.matchMedia("(min-width: 768px)").matches){
    $("#img_thumb_0").removeClass("animation-in");
    $("#img_thumb_1").removeClass("animation-in");
    $("#img_thumb_2").removeClass("animation-in");
    $("#img_thumb_3").removeClass("animation-in");

    $("#img_thumb_0").addClass("animation-out");
    $("#img_thumb_1").addClass("animation-out");
    $("#img_thumb_2").addClass("animation-out");
    $("#img_thumb_3").addClass("animation-out");
    setTimeout(() => {
      loadSlides2();
      $("#img_thumb_0").css("opacity", "0");
      $("#img_thumb_1").css("opacity", "0");
      $("#img_thumb_2").css("opacity", "0");
      $("#img_thumb_3").css("opacity", "0");
      setTimeout(() => {
        $("#img_thumb_0").addClass("animation-in");
        $("#img_thumb_1").addClass("animation-in");
        $("#img_thumb_2").addClass("animation-in");
        $("#img_thumb_3").addClass("animation-in");
        $("#img_thumb_0").on("animationend", () => {
          $("#img_thumb_0").css("opacity", "1");
          $("#img_thumb_1").css("opacity", "1");
          $("#img_thumb_2").css("opacity", "1");
          $("#img_thumb_3").css("opacity", "1");
        });
      }, 0);
    }, 900);
  }
}

function openPopupThumbnails(imageSrc, currentSlidePup) {
  // showAluGallery()
  // $("#alugallerybox-img").html('<img class="alugallerybox-image" src="" alt="" style="width:100%;">');
  // $(".alugallerybox-image").attr("src", imageSrc);

  showAluGallery(imageSrc)
  if(imageSrc.indexOf("youtube") != -1){
    $("#alugallerybox-img").html('<iframe class="alugallerybox-image" src="" alt="" style="width:100%;">');
    $(".alugallerybox-image").attr("src", imageSrc);
    $(".alugallerybox-image").attr("data-img", currentSlidePup);
    alugallercount = currentSlidePup;
  }else{
    $("#alugallerybox-img").html('<img class="alugallerybox-image" src="" alt="" style="width:100%;">');
    $(".alugallerybox-image").attr("src", imageSrc);
    $(".alugallerybox-image").attr("data-img", currentSlidePup);
    alugallercount = currentSlidePup;
  }
  var parent = $('.alugallerybox-overlay-fixed');
  var child = $('.alugallerybox-type-image');
  var childbox = $('#alugallerybox-img');
  var childboxload = $('#alugallerybox-loading');
  var widthalu = screen.width - (screen.width * 0.08);
  var leftbox = parent.width() / 2 - child.width() / 2

  if (leftbox < 0) {
    leftbox = (screen.width * 0.08) / 2;
  }

  if (widthalu > 800) {
    widthalu = 800;
  }
  childbox.css({ width: widthalu, height: widthalu });
  childboxload.css({ width: widthalu, height: widthalu });
  child.css({ width: widthalu, left: leftbox });
  $("#alugallerybox-product").show();
}

function closePopupThumbnails() {
  const popup = document.getElementById('popup');
  popup.style.display = 'none';
}

function hideAluGallery() {
  $("#alugallerybox-product").hide();
}


function oneClick(event, element) {
  if (amIclicked(event, element)) {
    $("#alugallerybox-product").hide();
  }
}


function nextAluGallery() {
  alugallercount++;
  $("#alugallerybox-loading").addClass("alugallerybox-loading-img");
  $("#alugallerybox-loading").css("display", "block");
  if (alugallercount > alugalleryarray.length - 1) {
    loadSrc(alugalleryarray[0]);
    // $(".alugallerybox-image").attr("src",alugalleryarray[0]).load(function() {
    //   $("#alugallerybox-loading").removeClass("alugallerybox-loading-img");
    //   $("#alugallerybox-loading").css("display","none");
    //  });
    alugallercount = 0;
  } else {
    loadSrc(alugalleryarray[alugallercount]);
    // $(".alugallerybox-image").attr("src",alugalleryarray[alugallercount]).load(function() {
    //   $("#alugallerybox-loading").removeClass("alugallerybox-loading-img");
    //   $("#alugallerybox-loading").css("display","none");
    //  });
  }

}

function previousAluGallery() {
  alugallercount--;
  $("#alugallerybox-loading").addClass("alugallerybox-loading-img");
  $("#alugallerybox-loading").css("display", "block");
  if (0 > alugallercount) {
    loadSrc(alugalleryarray[alugalleryarray.length - 1]);
    // $(".alugallerybox-image").attr("src",alugalleryarray[alugalleryarray.length-1]).load(function() {
    //   $("#alugallerybox-loading").removeClass("alugallerybox-loading-img");
    //   $("#alugallerybox-loading").css("display","none");
    //  });
    alugallercount = alugalleryarray.length - 1;
  } else {
    loadSrc(alugalleryarray[alugallercount]);
    // $(".alugallerybox-image").attr("src",alugalleryarray[alugallercount]).load(function() {
    //   $("#alugallerybox-loading").removeClass("alugallerybox-loading-img");
    //   $("#alugallerybox-loading").css("display","none");
    //  });
  }
}

function loadSrc(src) {
  $("#alugallerybox-img").html('');
  if (src.includes("youtube")) {
    $("#alugallerybox-img").html('<iframe style="width:100%;" class="alugallerybox-image" width="800" height="800" src="" frameborder="0" allowfullscreen=""></iframe>');
  } else {
    $("#alugallerybox-img").html('<img class="alugallerybox-image" src="" alt="" style="width:100%;">');
  }
  $(".alugallerybox-image").attr("src", src);

  $("#alugallerybox-loading").removeClass("alugallerybox-loading-img");
  $("#alugallerybox-loading").css("display", "none");
}

if (window.matchMedia("(max-width: 767px)").matches) {
  $("#img_thumb_0").removeClass("animation-in");
  $("#img_thumb_1").removeClass("animation-in");
  $("#img_thumb_2").removeClass("animation-in");
  $("#img_thumb_3").removeClass("animation-in");

  $("#img_thumb_0").addClass("animation-out");
  $("#img_thumb_1").addClass("animation-out");
  $("#img_thumb_2").addClass("animation-out");
  $("#img_thumb_3").addClass("animation-out");
  setTimeout(() => {
    loadSlides();
    $("#img_thumb_0").css("opacity", "0");
    $("#img_thumb_1").css("opacity", "0");
    $("#img_thumb_2").css("opacity", "0");
    $("#img_thumb_3").css("opacity", "0");
    setTimeout(() => {
      $("#img_thumb_0").addClass("animation-in");
      $("#img_thumb_1").addClass("animation-in");
      $("#img_thumb_2").addClass("animation-in");
      $("#img_thumb_3").addClass("animation-in");
      $("#img_thumb_0").on("animationend", () => {
        $("#img_thumb_0").css("opacity", "1");
        $("#img_thumb_1").css("opacity", "1");
        $("#img_thumb_2").css("opacity", "1");
        $("#img_thumb_3").css("opacity", "1");
      });
    }, 0);
  }, 900);
}else if(window.matchMedia("(min-width: 768px)").matches){
  $("#img_thumb_0").removeClass("animation-in");
  $("#img_thumb_1").removeClass("animation-in");
  $("#img_thumb_2").removeClass("animation-in");
  $("#img_thumb_3").removeClass("animation-in");

  $("#img_thumb_0").addClass("animation-out");
  $("#img_thumb_1").addClass("animation-out");
  $("#img_thumb_2").addClass("animation-out");
  $("#img_thumb_3").addClass("animation-out");
  setTimeout(() => {
    loadSlides2();
    $("#img_thumb_0").css("opacity", "0");
    $("#img_thumb_1").css("opacity", "0");
    $("#img_thumb_2").css("opacity", "0");
    $("#img_thumb_3").css("opacity", "0");
    setTimeout(() => {
      $("#img_thumb_0").addClass("animation-in");
      $("#img_thumb_1").addClass("animation-in");
      $("#img_thumb_2").addClass("animation-in");
      $("#img_thumb_3").addClass("animation-in");
      $("#img_thumb_0").on("animationend", () => {
        $("#img_thumb_0").css("opacity", "1");
        $("#img_thumb_1").css("opacity", "1");
        $("#img_thumb_2").css("opacity", "1");
        $("#img_thumb_3").css("opacity", "1");
      });
    }, 0);
  }, 900);
}
