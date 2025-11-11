/*
 * Custom code goes here.
 * A template should always ship with an empty custom.js
 */

// ++ paulo - script para alterar a imagem do produto quando é personalizada pelo ndk
// function imagemProdutoNDK() {
// 	$.each( $(".aluclass_linkRender"), function() {
// 		var datachave = $(this).data('chave');
// 		var renderhtml = $(this).data('renderhtml');
// 		$('iframe[data-thumbchave="'+datachave+'"]').attr("src", renderhtml);
// 	});
// }
// -- paulo - script para alterar a imagem do produto quando é personalizada pelo ndk

var alugalleryarray = [];
var alugallercount = 0;

function amIclicked(e, element)
{
    e = e || event;
    var target = e.target || e.srcElement;
    if(target.id==element.id)
        return true;
    else
        return false;
}

function showAluGallery() {


  alugalleryarray = $(".alugallery").map(function(){return $(this).attr("data-image-alu");}).get();
  $(".alugallerybox-image").attr("src",alugalleryarray[0]);
  var parent = $('.alugallerybox-overlay-fixed');
  var child = $('.alugallerybox-type-image');
  var childbox = $('#alugallerybox-img');
  var childboxload = $('#alugallerybox-loading');
  var widthalu = screen.width-(screen.width*0.08);
  var leftbox =parent.width()/2 - child.width()/2

  if(leftbox < 0){
    leftbox = (screen.width*0.08)/2;
  }

  if(widthalu > 800){
    widthalu = 800;
  }
  childbox.css({ width: widthalu,  height: widthalu });
  childboxload.css({ width: widthalu,  height: widthalu });
  child.css({ width: widthalu,  left: leftbox });
  $("#alugallerybox-product").show();
}

function hideAluGallery() {
  $("#alugallerybox-product").hide();
}


function oneClick(event, element)
{
    if(amIclicked(event, element))
    {
         $("#alugallerybox-product").hide();
    }
}


function nextAluGallery() {
  alugallercount ++;
  $( "#alugallerybox-loading" ).addClass( "alugallerybox-loading-img" );
  if(alugallercount >alugalleryarray.length-1 ){
    $(".alugallerybox-image").attr("src",alugalleryarray[0]).load(function() {
      $("#alugallerybox-loading").removeClass("alugallerybox-loading-img");
     });
    alugallercount = 0;
  }else{
    $(".alugallerybox-image").attr("src",alugalleryarray[alugallercount]).load(function() {
      $("#alugallerybox-loading").removeClass("alugallerybox-loading-img");
     });
  }

}

function previousAluGallery() {
  alugallercount --;
  $( "#alugallerybox-loading" ).addClass( "alugallerybox-loading-img" );
  if(0 > alugallercount ){
    $(".alugallerybox-image").attr("src",alugalleryarray[alugalleryarray.length-1]).load(function() {
      $("#alugallerybox-loading").removeClass("alugallerybox-loading-img");
     });
    alugallercount  = alugalleryarray.length-1;
  }else{
    $(".alugallerybox-image").attr("src",alugalleryarray[alugallercount]).load(function() {
      $("#alugallerybox-loading").removeClass("alugallerybox-loading-img");
     });
  }
}


var TagDevisContacted;
function checkYesNoDevisContacted() {
  if ($("#yes").prop("checked")) {
    TagDevisContacted = "yes";
  } else {
    TagDevisContacted = "no";
  }
}

function loadImagesMenu(idmenu) {
  $("img.imgMenuBlock." + idmenu + "").each(function () {
    var srcById = $(this).data("src");
    $(this).attr("src", srcById);
  });
  // ver se src esta preenchido, se tiver, aborta, senao, preenche
}

(function ($) {
  // pausar video quando clicar fora do modal - paulo
  $(document).click(function () {
    if ($("#codWatch").is(":visible")) {
      $("#codWatch").attr("src", "");
    }
  });

  $(document).ready(function () {
    /** Scripts para paginação do pageAvis */

    let page = 1; // página atual
    var perPage = 5; // itens por página
    let exibirMobile = 2; //exibe quantidade de botoes no mobile
    let exibir = 5; //exibe quantidade de botoes no desktop
    let buttonPage = "";
    let buttonPagePosterior = 1;

    $("#anterior").click(function () {
      page = buttonPage;
      var anterior = page - 1 == 0 ? 1 : page - 1;
      buttonPage = anterior;
      $(".buttonOne").addClass(buttonPage == 1 ? "active" : "");
      getAjax(anterior);

      updateInicial(anterior);

      updatePage(anterior);
    });

    $("#posterior").click(function () {
      var totalPageComment = $(".buttonAvis").attr("data-totalPage");
      page = buttonPagePosterior;
      var posterior =
        page + 1 >= totalPageComment ? totalPageComment : page + 1;
      buttonPagePosterior = posterior;
      getAjax(posterior);

      updateInicial(posterior);

      updatePage(posterior);
    });

    $(".buttonOne").click(function () {
      var pageOne = $($(this)).text();
      $(".buttonOne").addClass(pageOne == 1 ? "active" : "");
      $(".buttonAvis").removeClass("active");
      getAjax(pageOne);

      updateInicial(pageOne);

      updatePage(pageOne);
    });

    $(".buttonLast").click(function () {
      var pageLast = $($(this)).text();
      $(".buttonLast").addClass(pageLast ? "active" : "");
      $(".buttonAvis").removeClass("active");
      getAjax(pageLast);

      updateFinal(pageLast);

      updatePage(pageLast);
    });

    $(".buttonAvis").click(function () {
      buttonPage = parseInt($($(this)).text());
      if (buttonPage > 1) {
        $(".buttonOne").removeClass("active");
        $(".buttonAvis").removeClass("active");
        var testeAvis = $($(this)).val();
        $(".buttonAvis[value=" + testeAvis + "]").addClass("active");
      }
      getAjax(buttonPage);

      updateInicial(buttonPage);

      updatePage(buttonPage);
    });

    function updatePage(buttonPage) {
      var totalPageComment = $(".buttonAvis").attr("data-totalPage");

      var j = 0;

      for (
        var i =
          buttonPage == 1
            ? 2
            : buttonPage == totalPageComment
            ? buttonPage - exibir
            : buttonPage > totalPageComment - exibir
            ? totalPageComment - exibir
            : buttonPage;
        i <
        exibir +
          (buttonPage == 1
            ? 2
            : buttonPage > totalPageComment - exibir
            ? totalPageComment - exibir
            : buttonPage);
        i++
      ) {
        $(".buttonAvis").eq(j).text(i);

        var url = new URL(window.location.href);
        url.searchParams.set("pageavis", buttonPage);
        var newUrl = url.href;
        history.pushState(null, "", newUrl);

        j++;
      }
    }

    function updateInicial(numPage) {
      if (numPage > 4) {
        var tablePointsDesk = "";
        tablePointsDesk =
          "<a style='text-decoration: none; font-weight:500; background-color: #fff;' class='page-link'> ... </a>";
        $(".PointDesk").html(tablePointsDesk);
      } else {
        $(".PointDesk").html("");
        var tablePointsDeskFinal = "";
        tablePointsDeskFinal =
          "<a style='text-decoration: none; font-weight:500; background-color: #fff;' class='page-link'> ... </a>";
        $(".PointDesk1").html(tablePointsDeskFinal);
      }

      if (numPage > 2) {
        var tablePointsMobile = "";
        tablePointsMobile =
          "<a style='text-decoration: none; font-weight:500; background-color: #fff;' class='page-link'> ... </a>";
        $(".PointMobile").html(tablePointsMobile);
      } else {
        $(".PointMobile").html("");
      }
    }

    function updateFinal(numPage) {
      var totalPageComment = $(".buttonAvis").attr("data-totalPage");

      if (numPage < totalPageComment - exibir) {
        var tablePointsDesk = "";
        tablePointsDesk =
          "<a style='text-decoration: none; font-weight:500; background-color: #fff;' class='page-link'> ... </a>";
        $(".PointDesk1").html(tablePointsDesk);
      } else {
        $(".PointDesk1").html("");
        var tablePointsDeskInicial = "";
        tablePointsDeskInicial =
          "<a style='text-decoration: none; font-weight:500; background-color: #fff;' class='page-link'> ... </a>";
        $(".PointDesk").html(tablePointsDeskInicial);
      }

      if (numPage < totalPageComment - exibirMobile) {
        var tablePointsMobile = "";
        tablePointsMobile =
          "<a style='text-decoration: none; font-weight:500; background-color: #fff;' class='page-link'> ... </a>";
        $(".PointMobile1").html(tablePointsMobile);
      } else {
        $(".PointMobile1").html("");
      }
    }

    function getAjax(page) {
      $.ajax({
        url: "ajax/avis.php",
        type: "GET",
        dataType: "json",
        async: true,
        data: {
          page: page,
          perPage: perPage,
        },

        success: function (dados) {
          var data = dados.data;
          var image = dados.dadosImage.image;
          console.log(dados);
          totalPage = dados.totalPage;
          var tituloProduto = dados.dadosImage.titleproduto;
          var urlProduto = dados.dadosImage.urlProduto;

          $(".titleComment").empty();
          $(".date").empty();
          $(".content").empty();
          $(".customerComment").empty();
          $(".section-img img").removeAttr("src");
          $(".star_content").empty();
          $(".section-titre a").empty();
          for (var i = 0; i < data.length; i++) {
            if (data && data[i]) {
              $(".titleComment").eq(i).text(data[i].title);
            }

            if (data && data[i] && data[i].date_add) {
              var date = new Date(data[i].date_add);
              var formattedDate =
                ("0" + date.getDate()).slice(-2) +
                "/" +
                ("0" + (date.getMonth() + 1)).slice(-2) +
                "/" +
                date.getFullYear();
              $(".date")
                .eq(i)
                .text("Publié le " + formattedDate);
            }

            if (data && data[i] && data[i].content) {
              $(".content").eq(i).text(data[i].content);
            }

            if (data && data[i] && data[i].customer_name) {
              $(".customerComment").eq(i).text(data[i].customer_name);
            }

            if (data && data[i] && data[i].grade) {
              if (data[i].grade == 5) {
                $(".star_content")
                  .eq(i)
                  .html(
                    '<div class="star_0 star star_on"></div><div class="star_0 star star_on"></div><div class="star_0 star star_on"></div>    <div class="star_0 star star_on"></div><div class="star_0 star star_on"></div>'
                  );
              } else if (data[i].grade == 4) {
                $(".star_content")
                  .eq(i)
                  .html(
                    '<div class="star_1 star star_on"></div><div class="star_1 star star_on"></div><div class="star_1 star star_on"></div><div class="star_1 star star_on"></div><div class="star_1 star"></div>'
                  );
              } else if (data[i].grade == 3) {
                $(".star_content")
                  .eq(i)
                  .html(
                    '<div class="star_2 star star_on"></div><div class="star_2 star star_on"></div><div class="star_2 star star_on"></div><div class="star_2 star"></div><div class="star_2 star"></div>'
                  );
              } else if (data[i].grade == 2) {
                $(".star_content")
                  .eq(i)
                  .html(
                    '<div class="star_3 star star_on"></div><div class="star_3 star star_on"></div><div class="star_3 star"></div><div class="star_3 star"></div><div class="star_3 star"></div>'
                  );
              } else if (data[i].grade == 1) {
                $(".star_content")
                  .eq(i)
                  .html(
                    '<div class="star_4 star star_on"></div><div class="star_4 star"></div><div class="star_4 star"></div><div class="star_4 star"></div><div class="star_4 star"></div>'
                  );
              } else if (data[i].grade == 0) {
                $(".star_content")
                  .eq(i)
                  .html(
                    '<div class="star_5 star"></div><div class="star_5 star"></div><div class="star_5 star"></div><div class="star_5 star"></div><div class="star_5 star"></div>'
                  );
              }
            }

            if (image && image[i]) {
              console.log(image[i]);
              //$('.section-img img').eq(i).attr('src', image[i].replace('cdn-fr.priximbattable.net/', ''));
              $(".section-img img")
                .eq(i)
                .attr("src", "https://" + image[i]);
            }

            $(".section-titre a")
              .eq(i)
              .attr("href", urlProduto[i])
              .attr("target", "_blank")
              .text(tituloProduto[i]);
          }
        },
        error: function () {
          alert("Erro de Comunicação com o Banco de Dados ");
        },
      });
    }

    /** Fim dos Scripts da paginação do pageAvis */

    if (
      navigator.userAgent.match(
        /Mobile|Windows Phone|Lumia|Android|webOS|iPhone|iPod|Blackberry|PlayBook|BB10|Opera Mini|\bCrMo\/|Opera Mobi/i
      )
    ) {
      $(window).scroll(function () {
        if ($("#productprogressbarfluid").length == 1) {
          var pos1pro = $(window).scrollTop();
          var pos2pro = $("#productprogressbarfluid").offset().top;
          var pos3pro = $("#submitNdkcsfields").offset().top;

          if (pos1pro + 37 >= pos2pro + 37) {
            if (pos1pro + 150 < pos3pro) {
              widthndk = $("#ndkcsfields").width();
              $("#productprogressbar").addClass("progress-scroll");
              $("#productprogressbar").show();
              $("#productprogressbar").css({ width: widthndk + "px" });
            } else $("#productprogressbar").hide();
          } else {
            $("#productprogressbar").removeClass("progress-scroll");
          }
        }
        if ($("#ndkcsfields-block").length == 1) {
          var pos1 = $(window).scrollTop();
          var pos2 = $("#ndkcsfields-block").offset().top;
          if (pos1 > pos2) {
            $("#menu_float_mobile").slideDown();
            $(".backtop").css({ bottom: "110px" });
            $(".grecaptcha-badge").css({ bottom: "110px" });
          } else {
            $("#menu_float_mobile").slideUp();
            $(".backtop").css({ bottom: "0px" });
            $(".grecaptcha-badge").css({ bottom: "0px" });
          }
        }
      });
    } else {
      $(window).scroll(function () {
        if ($("#productprogressbarfluid").length == 1) {
          var pos1pro = $(window).scrollTop();
          var pos2pro = $("#productprogressbarfluid").offset().top;
          var pos3pro = $("#submitNdkcsfields").offset().top;

          if (pos1pro + 37 >= pos2pro + 37) {
            if (pos1pro + 150 < pos3pro) {
              widthndk = $("#ndkcsfields").width();
              $("#productprogressbar").addClass("progress-scroll");
              $("#productprogressbar").show();
              $("#productprogressbar").css({ width: widthndk + "px" });
            } else $("#productprogressbar").hide();
          } else {
            $("#productprogressbar").removeClass("progress-scroll");
          }
        }
        if ($("#name_title_product").length == 1) {
          var pos1 = $(window).scrollTop();
          var pos2 = $("#name_title_product").offset().top;
          if (pos1 > pos2) {
            $("#menu_float").slideDown();
            $(".backtop").css({ bottom: "110px" });
            $(".grecaptcha-badge").css({ bottom: "110px" });
          } else {
            $("#menu_float").slideUp();
            $(".backtop").css({ bottom: "0px" });
            $(".grecaptcha-badge").css({ bottom: "0px" });
          }
        }
      });
    }

    $(".closebar").click(function () {
      var isVisible = $("#menu_float").is(":visible");
      var isVisibleMob = $("#menu_float_mobile").is(":visible");
      if (isVisible || isVisibleMob) {
        $("#menu_float").slideUp();
        $("#menu_float_mobile").slideUp();
        $(".backtop").css({ bottom: "0px" });
        $(".grecaptcha-badge").css({ bottom: "0px" });
      } else {
        $("#menu_float").slideDown();
        $("#menu_float_mobile").slideDown();
        $(".backtop").css({ bottom: "110px" });
        $(".grecaptcha-badge").css({ bottom: "110px" });
      }
    });

    $("#btnCollapseDescription").click(function () {
      // const string = $(this).html();
      const string = $("#labelDescription").html();
      if (string === "Appuyez pour voir la description") {
        // $(this).html("Cacher la description");
        $("#labelDescription").html("Appuyez pour cacher la description");
        $("#arrowIconDescription").removeClass("fa-arrow-down");
        $("#arrowIconDescription").addClass("fa-arrow-up");
      } else {
        // $(this).html("Voir description");
        $("#labelDescription").html("Appuyez pour voir la description");
        $("#arrowIconDescription").removeClass("fa-arrow-up");
        $("#arrowIconDescription").addClass("fa-arrow-down");
      }
    });

    $(".newAlu-tab").click(function () {
      const getTab = $(this).data("tab");
      $(".newAlu-tab").removeClass("active");
      $("." + getTab).addClass("active");
      $(".newAlu-tab-content").addClass("elementHidden");
      $(".newAlu_" + getTab).removeClass("elementHidden");
    });

    $("input.promo-input").keydown(function (event) {
      if (event.keyCode == 13) {
        event.preventDefault();
        return false;
      }
    });

    /*var cmsPage = $(".cms-id-6").length;
    if (cmsPage != 1) {
      if (document.cookie.indexOf("pi_consent_lgpd") < 0) {
        // document.body.style.position = "fixed";
        var containerConsentLGPD = document.querySelector(
          "#containerConsentLGPD"
        );
        containerConsentLGPD.style.display = "flex";
      }

      $(".ConsentLGPDno").click(function () {
        // expireIn = new Date(Date.now() + 86400e3);
        expireIn = new Date(Date.now() + 8640000000);
        expireIn = expireIn.toUTCString();

        // var cookies = document.cookie.split(";");
        // for (var i = 0; i < cookies.length; i++) {
        // 	var cookie = cookies[i];
        // 	var eqPos = cookie.indexOf("=");
        // 	var valueCookie = cookie.split("=");
        // 	var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        // 	document.cookie = name + "="+valueCookie[1]+";expires="+expireIn+"; path=/"
        // 	// document.cookie = name + "=;expires="+expireIn+"; path=/";
        // }

        document.cookie =
          "pi_consent_lgpd=no; expires=" + expireIn + "; path=/";

        var containerConsentLGPD = document.querySelector(
          "#containerConsentLGPD"
        );
        containerConsentLGPD.style.display = "none";
        // document.body.removeAttribute("style");
      });

      $(".ConsentLGPDyes").click(function () {
        expireIn = new Date(Date.now() + 8640000000);
        expireIn = expireIn.toUTCString();
        // document.cookie = "pi_consent_lgpd=yes; path=/";
        document.cookie =
          "pi_consent_lgpd=yes; expires=" + expireIn + "; path=/";
        var containerConsentLGPD = document.querySelector(
          "#containerConsentLGPD"
        );
        containerConsentLGPD.style.display = "none";
        // document.body.removeAttribute("style");
      });
    }*/
    // -- paulo -> popup de lei geral de proteção de dados

    // ++ paulo - carregamento de imagens do menu sob demanda
    $(".mm_menu_content_title").on("mouseover", function () {
      var id_menu = $(this).data("idmenu");
      loadImagesMenu(id_menu);
    });

    /*$('.mm_menu_content_title').on('click', function() {
      var id_menu = $(this).data('idmenu');
      loadImagesMenu(id_menu);
    });*/

    $(".mm_menus_li").on("click", function () {
      var id_menu = $(this).find(".mm_menu_content_title").data("idmenu");
      loadImagesMenu(id_menu);
    });

    // -- paulo - carregamento de imagens do menu sob demanda


    // ++ paulo - ocultar campos
    $("select#ndkcsfield_3012 option:eq(1)").attr("selected", true);
    $("div[data-field='3012']").css("display", "none");
    $("div[data-field='3065']").css("display", "none"); // campo de cor da estrutura do store
    // -- paulo - ocultar campos

    // ++ paulo - GTM tag devis
    $("#btn_tag_devis").click(function () {
      checkYesNoDevisContacted();
    });
    // -- paulo - GTM tag devis

    // ++ vasco - add pack
    $("#addpacktranquillissime").click(function () {
      $("#lineven_servicespacksorder").hide();
      $("#messagemwait").show();
      $.ajax({
        url: "/panier?add=1&id_product=13432",
        success: function (result) {
          location.reload();
        },
      });
    });
    // -- vasco - add pack

    // ++ paulo - insere valor 1 para a altura (campo oculto)
    $("#dimension_text_height_373").val("1"); //miami
    $("#dimension_text_height_390").val("1"); //orlando
    $("#dimension_text_height_463").val("1"); //las vegas
    $("#dimension_text_height_383").val("1"); //MIAMI BATTANT
    $("#dimension_text_height_387").val("1"); //orlando BATTANT
    $("#dimension_text_height_460").val("1"); //las vegas BATTANT
    $("#dimension_text_height_385").val("1"); //MIAMI PORTILLON
    $("#dimension_text_height_465").val("1"); //las vegas PORTILLON
    $("#dimension_text_height_392").val("1"); //ORLANDO PORTILLON
    $("#dimension_text_height_4575").val("1"); //pergola Alu Classique
    $("#dimension_text_height_2023").val("1"); //pergola suncontrol 3
    $("#dimension_text_height_208").val("1200"); //BARRIÈRE DE PISCINE
    $("#dimension_text_height_414").val("1200"); //BARRIÈRE DE PISCINE
    $("#dimension_text_height_2818").val("1100"); //Garde Corps Clasic
    $("#dimension_text_height_2777").val("1100"); //Garde Corps Personnalisable
    //$('#dimension_text_height_2777').val('1100'); //Garde Corps Personnalisable
    $("#dimension_text_height_3501").val("1"); //Poteau aluminium 150x150 sur mesure
    // -- paulo - insere valor 1 para a altura (campo oculto)

    //++ adds value to the field in the event click when modifying image - Garde Corps
    // $(".img-value-2805").click(function () {
    //   $('#dimension_text_height_2806').val('1100'); //Garde Corps Neo Sable
    // }),
    //   $(".img-value-2805").click(function () {
    //     $('#dimension_text_height_2793').val('1100'); //Garde Corps Neo Simple
    //   }),
    //   $(".img-value-2801").click(function () {
    //     $('#dimension_text_height_2802').val('1100'); //Garde Corps Contemporain Sable
    //   }),
    //   $(".img-value-2801").click(function () {
    //     $('#dimension_text_height_2792').val('1100'); //Garde Corps Contemporain Simple
    //   }),
    //-- adds value to the field in the event click when modifying image - Garde Corps

    //++ adds value to the field in the event click when modifying image - Barriere de Piscine
    $(".img-value-2819").click(function () {
      $("#dimension_text_height_208").val("1200"); //Barriere de Piscine Contemporaine Simple
    }),
      $(".img-value-2819").click(function () {
        $("#dimension_text_height_2820").val("1200"); //Barriere de Piscine Contemporaine Sable
      }),
      //-- adds value to the field in the event click when modifying image - Barriere de Piscine

      // ++ paulo - chama a funcao para exibir imagens dos produtos quando apagar item do carrinho
      // $('.remove-from-cart').click(function(){
      // 	$( document ).ajaxComplete(function( event, request, settings ) {
      // 		imagemProdutoNDK();
      //     });
      // });
      // -- paulo - chama a funcao para exibir imagens dos produtos quando apagar item do carrinho

      $("#modalinfo_close").click(function () {
        $("#modalinfo").modal("hide");
        return false;
      });
    //open modal videos - Paulo aluclass
    $(".embedAluclass").click(function () {
      var link = $(this).data("watch");
      $("#codWatch").attr(
        "src",
        "https://www.youtube.com/embed/" + link + "?rel=0"
      );
      $("#modalEmbedAluclass").modal("show");
      return false;
    });
    $("#modalEmbedAluclass_close").click(function () {
      $("#modalEmbedAluclass").modal("hide");
      $("#codWatch").attr("src", "");
      return false;
    });
    //open modal videos - Paulo aluclass

    //open modal 3D - Paulo aluclass
    $(".embed3DAluclass").click(function () {
      var link = $(this).data("id");
      var name_prod = $(this).data("title-product");
      window.open(
        "https://priximbattable.net/3d/" + link + ".html?name=" + name_prod,
        "_blank"
      );
      return false;
    });
    $("#modal3DAluclass_close").click(function () {
      $("#modal3DAluclass").modal("hide");
      return false;
    });
    //open modal 3D - Paulo aluclass

    //open modal PDF (manuais, fichas tecnicas, etc) - Paulo aluclass
    $(".embedAluclassPDF").click(function () {
      var link = $(this).data("pdf");
      if (
        /mobile/i.test(navigator.userAgent) &&
        !/ipad|tablet/i.test(navigator.userAgent)
      ) {
        $("#modalEmbedAluclassPDF").modal("show");
        $("#codPdf").attr(
          "src",
          "https://docs.google.com/viewerng/viewer?url=" +
            link +
            "&embedded=true"
        );
      } else {
        $("#modalEmbedAluclassPDF").modal("show");
        $("#codPdf").attr("src", link);
      }

      return false;
    });
    $("#modalEmbedAluclassPDF_close").click(function () {
      $("#modalEmbedAluclassPDF").modal("hide");
      $("#codPdf").attr("src", "");
      return false;
    });
    //open modal PDF (manuais, fichas tecnicas, etc) - Paulo aluclass

    //open modal cart france entrepot - address selected
    $(".embedAluclassEntrepot").click(function () {
      // var departamento = $('#morada_delivery_selected').val();
      var departamento = $(this).data("depto");
      // var pais = $('#pais_delivery_selected').val();
      // if (pais == "Belgique") {
      // 	$("#frase_local").removeClass("ocultaArmazem");
      // 	$('#local_entrepot').html("Morangis (91) - France");
      // 	$('#map_france').attr('src', '/img/cms/departementsFrance_livraison_91.png');
      // } else if (pais == "France") {
      // 	$("#frase_local").removeClass("ocultaArmazem");
      // 	var to_38 = ["55", "57", "54", "67", "88", "52", "70", "68", "90", "21", "25", "39", "71", "01", "74", "03", "63", "42", "69", "73", "38", "15", "43", "07", "26", "05", "48", "12", "30", "84", "04", "06", "81", "34", "13", "83", "31", "09", "11", "66"];
      // 	if($.inArray(departamento, to_38) !== -1){
      // 		$('#local_entrepot').html("l'Isère (38)");
      // 		$('#map_france').attr('src', '/img/cms/departementsFrance_livraison_38.png');
      // 	} else {
      // 		$('#local_entrepot').html("Morangis (91)");
      // 		$('#map_france').attr('src', '/img/cms/departementsFrance_livraison_91.png');
      // 	}
      // } else {
      // 	$('#map_france').attr('src', '/img/cms/departementsFrance_livraison_all.png');
      // }
      if (departamento == "38") {
        $("#local_entrepot").html("l'Isère (38)");
        $("#map_france").attr(
          "src",
          "/img/cms/departementsFrance_livraison_38.png"
        );
        $("#frase_local").removeClass("ocultaArmazem");
      } else {
        $("#local_entrepot").html("Morangis (91)");
        $("#map_france").attr(
          "src",
          "/img/cms/departementsFrance_livraison_91.png"
        );
        $("#frase_local").removeClass("ocultaArmazem");
      }
      $("#modalEmbedAluclassEntrepot").modal("show");
      return false;
    });
    $("#modalEmbedAluclass_close").click(function () {
      $("#modalEmbedAluclassEntrepot").modal("hide");
      $("#local_entrepot").html("");
      $("#map_france").attr("src", "");
      return false;
    });
    //open modal cart france entrepot - address selected

    if (
      prestashop.page.page_name == "product" &&
      $("#pp_real_text").length > 0 &&
      $("#pp_typed").length > 0
    ) {
      var options = {
        stringsElement: "#pp_real_text",
        typeSpeed: 80,
        loop: true,
      };

      var typed = new Typed("#pp_typed", options);
    }

    var position = $(window).scrollTop();
    $(window).scroll(function () {
      var scroll = $(window).scrollTop();
      if (scroll > position) {
        if (position > 45) {
          $(".backtop").fadeIn("slow");
        }
      } else {
        $(".backtop").fadeOut("slow");
      }
      position = scroll;
    });
    $(".backtotop").click(function () {
      $("html, body").animate(
        {
          scrollTop: 0,
        },
        1000,
        "easeInOutExpo"
      );
      return false;
    });

  });

  $(window).on("load", function () {

    // $(".fancyboxGallery").fancybox({
    //   padding: 0,
    //   onUpdate: function () {
    //     $("#fancybox-thumbs ul").draggable({
    //       axis: "x",
    //     });
    //     var posXY = "";
    //     $(".fancybox-skin").draggable({
    //       axis: "x",
    //       drag: function (event, ui) {
    //         // get position
    //         posXY = ui.position.left;

    //         // if drag distance bigger than +- 100px: cancel drag function..
    //         if (posXY > 100) {
    //           return false;
    //         }
    //         if (posXY < -100) {
    //           return false;
    //         }
    //       },
    //       stop: function () {
    //         // ... and get next or previous image
    //         if (posXY > 95) {
    //           $.fancybox.prev();
    //         }
    //         if (posXY < -95) {
    //           $.fancybox.next();
    //         }
    //       },
    //     });
    //   },
    // });


    //++ Vasco Ribeiro verificar se existe campos NDK Obrigatorio.
    var required = $(".form-group:not([class*='disabled_value_by'])").find(
      ".required_field"
    );
    var requiredcount = 0;
    var grouprequired = 0;

    required.each(function () {
      if ($(this).is(":radio")) {
        if (
          parseInt($(this).parent().parent().parent().attr("data-field")) !=
          parseInt(grouprequired)
        ) {
          grouprequired = $(this).parent().parent().parent().attr("data-field");
          requiredcount++;
        }
      } else {
        var check_verificaCampo = ["11", "23", "17", "24"];
        verificaCampo = $(this)
          .parent()
          .parent()
          .parent()
          .attr("data-typefield"); /* paulo - ignora erro de qtd */
        if ($.inArray(verificaCampo, check_verificaCampo) === -1) {
          if (
            parseInt($(this).parent().parent().parent().attr("data-field")) !=
            parseInt(grouprequired)
          ) {
            grouprequired = $(this)
              .parent()
              .parent()
              .parent()
              .attr("data-field");
            requiredcount++;
          }
        }
      }
    });

    if (requiredcount < 1) {
      $("#productprogressbarfluid").hide();
    }

    //-- Vasco Ribeiro verificar se existe campos NDK Obrigatorio.

    // ++ paulo - trocar o placeholder de campos especificos
    $("input[id=dimension_text_height_36]").attr("placeholder", "profondeur"); // store-banne
    $("input[id=dimension_text_height_673]").attr("placeholder", "profondeur"); // pergola toile motorisee
    $("input[id=dimension_text_height_674]").attr("placeholder", "profondeur"); // pergola toile motorisee
    // -- paulo - trocar o placeholder de campos especificos

    // ++ paulo - script para remover efeitos aos e scroll no mobile
    if (
      /mobile/i.test(navigator.userAgent) &&
      !/ipad|tablet/i.test(navigator.userAgent)
    ) {
      // $(".row[data-aos='fade-left']").removeAttr("data-aos");
      // $(".row[data-aos='fade-right']").removeAttr("data-aos");
      // $("[data-aos]").removeAttr("data-aos");
      $("#aluclass_scroll").removeClass("cart-flutua-scroll");
    }
    // -- paulo - script para remover efeitos aos e scroll no mobile

    // ++ paulo - script para colocar layer de img a medida na foto do produto
    $.each($(".img-a-medida"), function () {
      var divname = $(this).data("divname");

      if (
        divname.includes("MESURE") ||
        divname.includes("mesure") ||
        divname.includes("Mesure")
      ) {
        $(this).removeClass("img-a-medida-hide");
      }
    });
    // -- paulo - script para colocar layer de img a medida na foto do produto

    // ++ paulo - script para colocar layer de img a medida na foto do produto
    $.each($(".img-a-promotion"), function () {
      var divname = $(this).data("divname");
      if (
        divname.includes("PROMOTION") ||
        divname.includes("promotion") ||
        divname.includes("Promotion")
      ) {
        $(this).removeClass("img-a-medida-hide");
      }
    });
    // -- paulo - script para colocar layer de img a medida na foto do produto

    // ++ paulo - script para colocar layer de img top prix na foto do produto
    $.each($(".img-a-top-prix"), function () {
      var divname = $(this).data("divname");
      if (
        divname.includes("TOP PRIX") ||
        divname.includes("top prix") ||
        divname.includes("Top Prix")
      ) {
        $(this).removeClass("img-a-medida-hide");
      }
    });
    // -- paulo - script para colocar layer de img top prix na foto do produto
    // ++ Miguel  - script para colocar layer de img Promo a na foto do produto
    $.each($(".img-promo"), function () {
      var divname = $(this).data("divname");
      if (
        divname.includes("STARTER") ||
        divname.includes("starter") ||
        divname.includes("Starter")
      ) {
        $(this).removeClass("img-a-medida-hide");
      }
    });
    // ++ Miguel  - script para colocar layer de img Fermeture a na foto do produto
    $.each($(".img-fermeture"), function () {
      var divname = $(this).data("divname");
      if (
        divname.includes("FERMETURE") ||
        divname.includes("fermeture") ||
        divname.includes("Fermeture")
      ) {
        $(this).removeClass("img-a-medida-hide");
      }
    });

    $.each($(".offre-grilles-tag"), function () {
      var dividprod = $(this).data('dividprod');

      if (dividprod == "640216" || dividprod == "640217" ) {
        $(this).removeClass("img-a-medida-hide");
      }
    });

    $.each($(".img-oferta-3-estores"), function () {
      var dividprod = $(this).data('dividprod');

      if (dividprod == "1379" || dividprod == "640151" ) {
        $(this).removeClass("img-a-medida-hide");
      }
    });

    $.each($(".img-oferta-table"), function () {
      var dividprod = $(this).data('dividprod');

      if (dividprod == "640147" || dividprod == "640148" || dividprod == "640207" || dividprod == "640208") {
        $(this).removeClass("img-a-medida-hide");
      }
    });

    // $.each($(".img-solde"), function () {
    //   var divname = $(this).data("divname");
    //   var dividprod = $(this).data("dividprod");

    //   if (
    //     dividprod == "640145" ||
    //     dividprod == "68627" ||
    //     dividprod == "640146" ||
    //     dividprod == "640025" ||
    //     dividprod == "68667" ||
    //     dividprod == "640024" ||
    //     dividprod == "640144" ||
    //     dividprod == "640143" ||
    //     divname.includes("SOLDES") ||
    //     divname.includes("soldes") ||
    //     divname.includes("Soldes")
    //   ) {
    //     $(this).removeClass("img-a-medida-hide");
    //   }
    // });

    // ++ Miguel  - script para colocar layer de img Destockage a na foto do produto
    // $.each($(".img-destockage"), function () {
    //   var divname = $(this).data("divname");
    //   if (
    //     divname.includes("DESTOCKAGE") ||
    //     divname.includes("destockage") ||
    //     divname.includes("Destockage")
    //   ) {
    //     $(this).removeClass("img-a-medida-hide");
    //   }
    // });
    // ++ paulo - script para colocar layer de img cloture
    // 100x55
    $.each($(".img-cloture-100"), function () {
      var dividprod = $(this).data("dividprod");
      if (dividprod == "48485") {
        $(this).removeClass("img-a-medida-hide");
      }
    });
    // 200x55 5mm
    $.each($(".img-cloture-200-5mm"), function () {
      var dividprod = $(this).data("dividprod");
      if (dividprod == "68627") {
        $(this).removeClass("img-a-medida-hide");
      }
    });
    // 200x55 4mm - Miguel
    $.each($(".img-cloture-200-4mm"), function () {
      var dividprod = $(this).data("dividprod");
      if (dividprod == "68667") {
        $(this).removeClass("img-a-medida-hide");
      }
    });
    // -- paulo - script para colocar layer de img cloture

    // ++ paulo - script para colocar tag soldes para produtos bonnes affaires
    $.each($(".img-tag-soldes"), function () {
      var divname = $(this).data("divname");
      if (
        divname.includes("DESTOCKAGE") ||
        divname.includes("destockage") ||
        divname.includes("Destockage") ||
        divname.includes("Soldes") ||
        divname.includes("soldes") ||
        divname.includes("SOLDES")
      ) {
        $(this).removeClass("img-a-medida-hide");
      }
    });
    // -- paulo - script para colocar tag soldes para produtos bonnes affaires

    // ++ paulo - script para colocar layer de img de BLACK FRIDAY por cima da foto do produto
    var blackFridayProducts = [
      "640030",
      "640036",
      "640032",
      "640033",
      "640056",
      "640034",
      "640067",
      "640035",
      "640069",
    ];
    $.each($(".img-black-friday"), function () {
      if (
        $.inArray($(this).data("dividprod").toString(), blackFridayProducts) !==
        -1
      ) {
        $(this).removeClass("img-a-medida-hide");
      }
    });
    // -- paulo - script para colocar layer de img de BLACK FRIDAY por cima da foto do produto


  });
})(jQuery);

// vasco atualizar preço quando altera os campos do prestashop
$(".form-control-select").change(function () {
  $(document).ajaxComplete(function (event, request, settings) {
    var text = $("span[itemprop='price'][content]").html();
    $(".productPriceUp").html(text);
  });
});



// vasco - Comparativos de produtos

if (
  navigator.userAgent.match(
    /Mobile|Windows Phone|Lumia|Android|webOS|iPhone|iPod|Blackberry|PlayBook|BB10|Opera Mini|\bCrMo\/|Opera Mobi/i
  )
) {
} else {
  $("#scroll2 div").width($("#scroll1 table").width());

  $("#scroll1").on("scroll", function () {
    $("#scroll2").scrollLeft($(this).scrollLeft());
  });
  $("#scroll2").on("scroll", function () {
    $("#scroll1").scrollLeft($(this).scrollLeft());
  });

  $("#buttonselect").data("statusComparatif", "noSelect");
}

function checkColunm(name) {
  if ($("#" + name).is(":checked")) {
    $("." + name)
      .removeClass("no_select")
      .addClass("yes_select");
  } else {
    $("." + name)
      .removeClass("yes_select")
      .addClass("no_select");
  }
}

function checkSelect() {
  var statusComparatif = $("#buttonselect").attr("data-statuscomparatif");

  var checkBoxes = document.querySelectorAll(".select_input");
  var selecionados = 0;
  $("#erro_comparer").text("");

  checkBoxes.forEach(function (el) {
    if (el.checked) {
      selecionados++;
    }
  });
  console.log(statusComparatif);

  if (statusComparatif == "noSelect") {
    if (selecionados > 1) {
      $(".no_select").hide();
      $("#buttonselect").attr("data-statuscomparatif", "yesSelect");
      $("#buttonselect").text("Afficher Tout");
    } else {
      $("#erro_comparer").text("Veuillez sélectionner au moins deux produits.");
    }
  } else {
    $(".no_select").show();
    $("#buttonselect").attr("data-statuscomparatif", "noSelect");
    $("#buttonselect").text("Votre Selection Afficher");
  }
}

function SelectFilter() {
  var currentLocation = window.location.hostname;
  valuefilter = $("#filtercomparative").val();
  currentLocation =
    "https://" +
    currentLocation +
    "/comparatif?ctg=45" +
    "&order=" +
    valuefilter;
  //console.log(currentLocation);
  window.location.href = currentLocation;
}

// vasco - Comparativos de produtos - Fim

function RemovePack() {
  $("#lineven_servicespacksorder").show();
}

//link
//open modal link cart - Vasco aluclass

function ShowModalLinkCart() {
  $("#warning_mail_linkcart").html("");
  $(".messegelinkcart").hide();
  $(".sendlinkcart").show();
  $("#modalEmbedlinkcart").modal("show");

  return false;
}

$(".embedlinkcart").click(function () {
  ShowModalLinkCart();
});

$("#modalEmbedlinkcart_close").click(function () {
  $("#modalEmbedlinkcart").modal("hide");
  return false;
});

$("#btn_tag_linkcart").click(function () {
  const emailRegex = /\S+@\S+\.\S+/;

  $("#warning_mail_linkcart").html("");
  $("#warning_name_linkcart").html("");

  email = $("#mail_linkcart").val();
  emailcomercial = $("#email_comercial_linkcart").val();
  sharecart = $("#sharecart").val();
  phoneCustomer = $("#phone_linkcart").val();
  nameCustomer = $("#name_linkcart").val();
  var info =
    "<i>Il manque une information obligatoire pour pouvoir partager le panier d'achat!</i>";

  if (nameCustomer == "") {
    $("#warning_name_linkcart").html(info);
    return false;
  }

  if (email == "") {
    $("#warning_mail_linkcart").html(info);
    return false;
  }

  if (!emailRegex.test(email)) {
    $("#warning_mail_linkcart").html("<i>Email invalide!</i>");
    return false;
  }

  $.ajax({
    type: "POST",
    url: "../ajax/index.php",
    data: {
      setaction: "sharelink",
      email: email,
      sharecart: sharecart,
      nameCustomer: nameCustomer,
      phoneCustomer: phoneCustomer,
      emailcomercial: emailcomercial,
    },
    beforeSend: function () {
      $("#warning_messagelinkcart").html("Envoyer...");
      $(".messegelinkcart").show();
      $(".sendlinkcart").hide();
    },
    success: function (data) {
      if (data.trim() == "sucess") {
        $("#warning_messagelinkcart").html(
          "Panier d'achat partagé. Un e-mail a été envoyé à l'adresse e-mail que vous avez indiquée."
        );
        $(".messegelinkcart").show();
        $(".sendlinkcart").hide();
      } else {
        if (data == "errorMail") {
          $("#warning_mail_linkcart").html("<i>Email invalide!</i>");
        }
        if (data == "errorSendMail") {
          $("#warning_messagelinkcart").html(
            "Désolé, il y a eu un problème lors de l'envoi de l'e-mail. Veuillez réessayer plus tard. Merci."
          );
          $(".messegelinkcart").show();
          $(".sendlinkcart").hide();
        }
      }
    },
  });
});

//PDF
//open modal PDF - Vasco aluclass
$(".imgPDF").click(function () {
  $(".messegecatalogo").hide();
  $(".sendcatalogo").show();
  $("#modalEmbedDownloadpdf").modal("show");
  return false;
});
$("#modalEmbedDownloadpdf_close").click(function () {
  $("#modalEmbedDownloadpdf").modal("hide");
  return false;
});

$("#btn_tag_pdf_catalgo").click(function () {
  const emailRegex = /\S+@\S+\.\S+/;

  $("#warning_mail_pdf").html("");
  $("#warning_name_pdf").html("");
  $("#warning_phone_pdf").html("");

  email = $("#customer-information-pdf #mail_catalogue").val();
  emailcomercial = $("#customer-information-pdf #email_comercial_cata").val();
  nameCustomer = $("#customer-information-pdf #name_catalogue").val();
  phoneCustomer = $("#customer-information-pdf #phone_catalogue").val();
  cataloguename = $("#customer-information-pdf #catalogue_name").val();

  var info = "<i>Il manque une information obligatoire à votre catalogue!</i>";

  if (nameCustomer == "") {
    $("#warning_name_pdf").html(info);
    return false;
  }
  if (email == "") {
    $("#warning_mail_pdf").html(info);
    return false;
  }

  if (phoneCustomer == "") {
    $("#warning_phone_pdf").html(info);
    return false;
  }

  if (!emailRegex.test(email)) {
    $("#warning_mail_pdf").html("<i>Email invalide!</i>");
    return false;
  }

  $.ajax({
    type: "POST",
    url: "../catalogue_pdf/index.php",
    data: {
      setmail: "yes",
      customermail: email,
      nameCustomer: nameCustomer,
      phoneCustomer: phoneCustomer,
      cataloguename: cataloguename,
      emailcomercial: emailcomercial,
    },
    beforeSend: function () {
      $("#warning_messagecatalogo_pdf").html("Envoyer...");
      $(".messegecatalogo").show();
      $(".sendcatalogo").hide();
    },
    success: function (data) {
      if (data == "sucess") {
        $("#warning_messagecatalogo_pdf").html(
          "Merci d'avoir demandé le catalogue,nous avons envoyé un e-mail à l'adresse e-mail que vous avez indiquée."
        );
        $(".messegecatalogo").show();
        $(".sendcatalogo").hide();
      } else {
        if (data == "errorMail") {
          $("#warning_mail_pdf").html("<i>Email invalide!</i>");
        }
        if (data == "errorName") {
          $("#warning_name_pdf").html("<i>Nom invalide!</i>");
        }
        if (data == "errorPhone") {
          $("#warning_phone_pdf").html("<i>Téléphone invalide!</i>");
        }
        if (data == "errorSendMail") {
          $("#warning_messagecatalogo_pdf").html(
            "Désolé, il y a eu un problème lors de l'envoi de l'e-mail. Veuillez réessayer plus tard. Merci."
          );
          $(".messegecatalogo").show();
          $(".sendcatalogo").hide();
        }
      }
    },
  });
});

$(".handleClickToPrintCGV").click(function () {
  $("#buttonPrintCGV").removeClass("elementHidden");
});

/*review_fix


$('.indicereparabilite').click(function () {
  $('#modalEmbedReparabilite').modal('show');
  $('.bodyrepairmessage').hide();
  $('.bodyrepair').show();
  $('#btn_tag_review_fix').show();
  return false;
});*/
$("#modalEmbedReparabilite_close").click(function () {
  $("#modalEmbedReparabilite").modal("hide");
  $(".bodyrepairmessage").hide();
  $(".bodyrepair").show();
  $("#btn_tag_review_fix").show();
  return false;
});

function setBubble(range, bubble) {
  const val = range.value;
  const min = range.min ? range.min : 1;
  const max = range.max ? range.max : 10;
  //const newVal = Number(((val - min) * 10) / (max - min));
  const newVal = val * 10 - 10 + (3 + (4 - 4 * (val / 10)));
  $(".info-bubblescore").html(val);
  $(".range-value").css("left", newVal + "%");
  // Sorta magic numbers based on size of the native UI thumb
  //bubble.style.left = "calc("+newVal+"% + (8 - "+newVal+" * 0.15px))";
}

$("#rangescore").on("input", function () {
  var rangescore = $(this).val();
  var score = parseInt(rangescore);

  const range = document.getElementById("rangescore");
  const bubble = document.getElementById("bubblescore");

  setBubble(range, bubble);

  switch (score) {
    case 1:
    case 2:
      $(".info-bubblescore").css("background", "#FF1F31");

      $("#bubblescore").addClass("range-value1");
      $("#bubblescore").removeClass("range-value2");
      $("#bubblescore").removeClass("range-value3");
      $("#bubblescore").removeClass("range-value4");
      $("#bubblescore").removeClass("range-value5");
      $("#rangescore").addClass("sliderColor1");
      $("#rangescore").removeClass("sliderColor2");
      $("#rangescore").removeClass("sliderColor3");
      $("#rangescore").removeClass("sliderColor4");
      $("#rangescore").removeClass("sliderColor5");
      break;
    case 3:
    case 4:
      $("#bubblescore").removeClass("range-value1");
      $("#bubblescore").addClass("range-value2");
      $("#bubblescore").removeClass("range-value3");
      $("#bubblescore").removeClass("range-value4");
      $("#bubblescore").removeClass("range-value5");
      $(".info-bubblescore").css("background", "#FF7A2B");
      $("#rangescore").removeClass("sliderColor1");
      $("#rangescore").addClass("sliderColor2");
      $("#rangescore").removeClass("sliderColor3");
      $("#rangescore").removeClass("sliderColor4");
      $("#rangescore").removeClass("sliderColor5");
      break;
    case 5:
    case 6:
      $("#bubblescore").removeClass("range-value1");
      $("#bubblescore").removeClass("range-value2");
      $("#bubblescore").addClass("range-value3");
      $("#bubblescore").removeClass("range-value4");
      $("#bubblescore").removeClass("range-value5");
      $(".info-bubblescore").css("background", "#FFC900");
      $("#rangescore").removeClass("sliderColor1");
      $("#rangescore").removeClass("sliderColor2");
      $("#rangescore").addClass("sliderColor3");
      $("#rangescore").removeClass("sliderColor4");
      $("#rangescore").removeClass("sliderColor5");
      break;
    case 7:
    case 8:
      $("#bubblescore").removeClass("range-value1");
      $("#bubblescore").removeClass("range-value2");
      $("#bubblescore").removeClass("range-value3");
      $("#bubblescore").addClass("range-value4");
      $("#bubblescore").removeClass("range-value5");
      $(".info-bubblescore").css("background", "#78C928");
      $("#rangescore").removeClass("sliderColor1");
      $("#rangescore").removeClass("sliderColor2");
      $("#rangescore").removeClass("sliderColor3");
      $("#rangescore").addClass("sliderColor4");
      $("#rangescore").removeClass("sliderColor5");
      break;
    case 9:
    case 10:
      $("#bubblescore").removeClass("range-value1");
      $("#bubblescore").removeClass("range-value2");
      $("#bubblescore").removeClass("range-value3");
      $("#bubblescore").removeClass("range-value4");
      $("#bubblescore").addClass("range-value5");
      $(".info-bubblescore").css("background", "#01994C");
      $("#rangescore").removeClass("sliderColor1");
      $("#rangescore").removeClass("sliderColor2");
      $("#rangescore").removeClass("sliderColor3");
      $("#rangescore").removeClass("sliderColor4");
      $("#rangescore").addClass("sliderColor5");
      break;
  }
});

$("#btn_tag_review_fix").click(function () {
  score = parseInt($("#rangescore").val());
  id_product = parseInt($("#id_produt_review_fix").val());
  $.ajax({
    type: "POST",
    url: "../ajax/index.php",
    data: { setaction: "reviewfix", score: score, id_product: id_product },
    success: function (data) {
      if (data == "sucess") {
        $(".bodyrepairmessage").show();
        $(".bodyrepair").hide();
        $("#btn_tag_review_fix").hide();
      }
    },
  });
});

/*rappel*/
function ClearModal() {
  $("#popup_image_webp").attr("src", "");
  $("#popup_image").attr("src", "");
  $("#popup_image").attr("alt", "");
  $("#warning_name_rappel").html("");
  $("#warning_mail_rappel").html("");
  $("#warning_phone_rappel").html("");
  $("#last_name_rappel").val("");
  $("#email_rappel").val("");
  $("#phone_rappel").val("");
  $("#email_comercial").val("");
  $("#email_comercial_visual").show();
  $("#headerrappelmessage").html("");
}

$(".embedblog").click(function () {
  ClearModal();
  $("#popup_image_webp").attr("src", "/img/cms/popup-question.webp");
  $("#popup_image").attr("src", "/img/cms/popup-question.jpg");
  $("#popup_image").attr("alt", "Une question");
  $(".bodyrappelmessage").html(
    "Votre demande a bien été enregistrée, nous vous contacterons dans les plus brefs délais."
  );
  $(".namerappel").html("Être appelé dans les plus brefs délais");
  $("#coderappel").val("blog");
  $(".rappelheader").css("background-color", "#e38b54");
  $("#btn_tag_rappel").css("background-color", "#e38b54");
  $(".namerappel").css("color", "white");
  $("#btn_tag_rappel").css("color", "white");
  $(".bodyrappelmessage").hide();
  $(".bodyrappel").show();
  $("#btn_tag_rappel").show();
  $("#modalEmbedRappel").modal("show");

  return false;
});

$(".embedcomparatif").click(function () {
  ClearModal();
  $("#popup_image_webp").attr("src", "/img/cms/popup-compare.webp");
  $("#popup_image").attr("src", "/img/cms/popup-compare.jpg");
  $("#popup_image").attr("alt", "Une question");
  $('.bodyrappelmessage').html('Votre demande a bien été enregistrée, nous vous contacterons dans les plus brefs délais.');
  $('.namerappel').html('Être appelé dans les plus brefs délais');
  $('#coderappel').val('comparatif');
  $(".rappelheader").css("background-color", "#b0d998");
  $("#btn_tag_rappel").css("background-color", "#b0d998");
  $(".namerappel").css("color", "white");
  $("#btn_tag_rappel").css("color", "white");
  $(".bodyrappelmessage").hide();
  $(".bodyrappel").show();
  $("#btn_tag_rappel").show();
  $("#modalEmbedRappel").modal("show");

  return false;
});

function ShowModalAluDevis() {
  $("#modalEmbedDevis").modal("show");
  return false;
}

function ShowModalRappel() {
  ClearModal();
  $("#popup_image_webp").attr("src", "/img/cms/popup-question.webp");
  $("#popup_image").attr("src", "/img/cms/popup-question.jpg");
  $("#popup_image").attr("alt", "Une question");
  $("#email_comercial_visual").hide();
  $(".bodyrappelmessage").html(
    "Votre demande a bien été enregistrée, nous vous contacterons dans les plus brefs délais."
  );
  $(".namerappel").html("Être appelé dans les plus brefs délais");
  $("#coderappel").val("rappel");
  $(".rappelheader").css("background-color", "#B6CAE5");
  $("#btn_tag_rappel").css("background-color", "#B6CAE5");
  $(".namerappel").css("color", "white");
  $("#btn_tag_rappel").css("color", "white");
  $(".bodyrappelmessage").hide();
  $(".bodyrappel").show();
  $("#btn_tag_rappel").show();
  $("#modalEmbedRappel").modal("show");

  return false;
}
$(".embedRappel").click(function () {
  ShowModalRappel();
});
function ShowModalCoupon() {
  ClearModal();
  $("#popup_image_webp").attr("src", "/img/cms/popup-voucher.webp");
  $("#popup_image").attr("src", "/img/cms/popup-voucher.jpg");
  $("#popup_image").attr("alt", "Une question");
  $(".bodyrappelmessage").html(
    "Votre demande a bien été enregistrée, nous vous contacterons dans les plus brefs délais."
  );
  $(".namerappel").html("Demander s'il y a un coupon disponible");
  $("#coderappel").val("coupon");
  $(".rappelheader").css("background-color", "#9AD0C7");
  $("#btn_tag_rappel").css("background-color", "#9AD0C7");
  $(".namerappel").css("color", "white");
  $("#btn_tag_rappel").css("color", "white");
  $(".bodyrappelmessage").hide();
  $(".bodyrappel").show();
  $("#btn_tag_rappel").show();
  $("#modalEmbedRappel").modal("show");

  return false;
}
$(".embedcoupon").click(function () {
  ShowModalCoupon();
});

function ShowModalGagne() {
  ClearModal();
  $(".bodyrappelmessage").html(
    "Félicitations, vous concourrez pour un cadeau !"
  );
  $(".namerappel").html(
    'Inscrivez-vous et gagnez un cadeau*<br>  <a href="https://priximbattable.net/content/19-anniversaire" target="_blank" ><small style="font-weight: 500;font-size: 0.675rem;color: red;">*voir conditions du concours</small></a>'
  );
  $("#coderappel").val("gagne");
  $(".rappelheader").css("background-color", "#daa520");
  $("#btn_tag_rappel").css("background-color", "#daa520");
  $(".namerappel").css("color", "white");
  $("#btn_tag_rappel").css("color", "white");
  $(".bodyrappelmessage").hide();
  $(".bodyrappel").show();
  $("#btn_tag_rappel").show();
  $("#modalEmbedRappel").modal("show");

  return false;
}
$(".embedGagne").click(function () {
  ShowModalGagne();
});

function ShowModalCoupon10() {
  ClearModal();
  $("#popup_image_webp").attr("src", "/img/cms/popup-discount.webp");
  $("#popup_image").attr("src", "/img/cms/popup-discount.png");
  $("#popup_image").attr("alt", "Coupon");
  $(".bodyrappelmessage").html(
    "Coupon envoyé par email. Veuillez vérifier votre email"
  );
  $(".namerappel").html("Demander un coupon de réduction de 5%");
  $("#headerrappelmessage").html(
    "Nous vous envoyons le code par mail, il est valable 1 jour et pour un seul mail. Attention la quantité de coupon est limitée."
  );
  $("#coderappel").val("coupon10");
  $(".rappelheader").css("background-color", "#D0312D");
  $("#btn_tag_rappel").css("background-color", "#D0312D");
  $(".namerappel").css("color", "white");
  $("#btn_tag_rappel").css("color", "white");
  $(".bodyrappelmessage").hide();
  $(".bodyrappel").show();
  $("#btn_tag_rappel").show();
  $("#modalEmbedRappel").modal("show");

  return false;
}
$(".embedcoupon10").click(function () {
  ShowModalCoupon10();
});

$(".embeddevis").click(function () {
  ClearModal();
  $("#popup_image").attr("src", "/img/cms/popup-question.jpg");
  $("#popup_image").attr("alt", "Une question");
  $(".bodyrappelmessage").html(
    "Votre demande a bien été enregistrée, nous vous contacterons dans les plus brefs délais."
  );
  $(".namerappel").html("Je souhaiterais recevoir un devis");
  $("#coderappel").val("devis");
  $(".rappelheader").css("background-color", "#ABC4C7");
  $("#btn_tag_rappel").css("background-color", "#ABC4C7");
  $(".namerappel").css("color", "white");
  $("#btn_tag_rappel").css("color", "white");
  $(".bodyrappelmessage").hide();
  $(".bodyrappel").show();
  $("#btn_tag_rappel").show();
  $("#modalEmbedRappel").modal("show");

  return false;
});
$("#modalEmbedRappel_close").click(function () {
  $("#modalEmbedRappel").modal("hide");
  $(".bodyrappelmessage").hide();
  $(".bodyrappelmessage").html("");
  $("#headerrappelmessage").html("");
  $("#coderappel").val("");
  $(".rappelheader").css("background-color", "white");
  $(".namerappel").html("");
  $(".bodyrappel").show();
  $("#btn_tag_rappel").show();
  return false;
});

$("#btn_tag_rappel").click(function () {
  const emailRegex = /\S+@\S+\.\S+/;

  $("#warning_name_rappel").html("");
  $("#warning_mail_rappel").html("");
  $("#warning_phone_rappel").html("");

  last_name_rappel = $("#last_name_rappel").val();
  email_rappel = $("#email_rappel").val();
  email_comercial_rappel = $("#email_comercial").val();
  phone_rappel = $("#phone_rappel").val();
  coderappel = $("#coderappel").val();

  var info = "<i>Il manque une information obligatoire!</i>";

  if (last_name_rappel == "") {
    $("#warning_name_rappel").html(info);
    return false;
  }
  if (email_rappel == "") {
    $("#warning_mail_rappel").html(info);
    return false;
  }

  if (phone_rappel == "") {
    $("#warning_phone_rappel").html(info);
    return false;
  }

  if (!emailRegex.test(email_rappel)) {
    $("#warning_mail_rappel").html("<i>Email invalide!</i>");
    return false;
  }

  $.ajax({
    type: "POST",
    url: "../ajax/index.php",
    data: {
      setaction: "rappelcoupon",
      email_comercial_rappel: email_comercial_rappel,
      coderappel: coderappel,
      phone_rappel: phone_rappel,
      email_rappel: email_rappel,
      last_name_rappel: last_name_rappel,
    },
    success: function (data) {
      if (data == "sucess") {
        $(".bodyrappelmessage").show();
        $(".bodyrappel").hide();
        $("#btn_tag_rappel").hide();
      }
      if (data == "temp") {
        $('#headerrappelmessage').html('Veuillez attendre 20 secondes avant de commander à nouveau.');
        $('#headerrappelmessage').effect("shake");
      }
      if (data == "error") {
        $("#headerrappelmessage").html(
          "Un seul coupon peut être attribué par personne."
        );
        $("#headerrappelmessage").effect("shake");
      }
    },
  });
});

var currentLocation = window.location.hostname;
currentLocation = "https://" + currentLocation + "/commande?shipfree=0";
$(".btn_commander").attr("href", currentLocation);

$("#check-remove-liraison").removeAttr("checked");

function cartSubtotalShippingchange() {
  var price = $("#cart-subtotal-products > .value")
    .text()
    .replace(",", ".")
    .replace(/\s/g, "")
    .replace("€", "");
  var discount = $("#cart-subtotal-discount > .value")
    .text()
    .replace(",", ".")
    .replace(/\s/g, "")
    .replace("€", "");
  var livraison = $("#cart-subtotal-shipping > .value")
    .text()
    .replace(",", ".")
    .replace(/\s/g, "")
    .replace("€", "");

  var temp = $("#cart-subtotal-shipping > .value").html();
  var val = $("#cart-subtotal-shipping-temp").val();

  if (!discount) {
    discount = 0;
  }

  if (isNaN(livraison)) {
    livraison = $("#cart-subtotal-shipping-temp").val();
  } else {
    var temp = livraison;
  }
  if (isNaN(livraison)) {
    livraison = 0;
  }

  if ($("#cart-subtotal-products-temp").val() == "non") {
    var tempP = $(".cart-total > .value").html();
    $("#cart-subtotal-products-temp").val(tempP);
  }

  var currentLocation = window.location.hostname;

  if (val == "collect") {
    var total = parseFloat(price) - parseFloat(discount);
    total = new Intl.NumberFormat("fr-FR", {
      style: "currency",
      currency: "EUR",
    }).format(total);
    $("#cart-subtotal-shipping > .value").html("collect");
    $(".cart-total > .value").html(total);
    currentLocation = "https://" + currentLocation + "/commande?shipfree=1";
    $(".btn_commander").attr("href", currentLocation);
  } else {
    var total =
      parseFloat(price) + parseFloat(livraison) - parseFloat(discount);
    total = new Intl.NumberFormat("fr-FR", {
      style: "currency",
      currency: "EUR",
    }).format(total);
    if (!isNaN(val)) {
      val = new Intl.NumberFormat("fr-FR", {
        style: "currency",
        currency: "EUR",
      }).format(parseFloat(val));
    }
    $("#cart-subtotal-shipping > .value").html(val);
    currentLocation = "https://" + currentLocation + "/commande?shipfree=0";
    $(".btn_commander").attr("href", currentLocation);
    $(".cart-total > .value").html(total);
  }

  $("#cart-subtotal-shipping-temp").val(temp);
}

/*rappel end*/

// novo menu
$(".alumenu a.alumenu-item").mouseover(function () {
  const target = $(this).data("target");

  $(".alumenu a.alumenu-item.active").each(function () {
    const otherTargets = $(this).data("target");
    if (otherTargets !== target) {
      $(".alumenu-item").removeClass("active");
      $(".alumenu-sub-item").addClass("hide-block");
    }
  });

  $(".alumenu-item[data-target='" + target + "']").addClass("active");
  $(".alumenu-overlay").removeClass("hide-block");
  $("#" + target).removeClass("hide-block");
});

$(".alumenu").mouseleave(function () {
  $(".alumenu-item").removeClass("active");
  $(".alumenu-overlay").addClass("hide-block");
  $(".alumenu-sub-item").addClass("hide-block");
});

$("#alumenu-mobile .load").click(function () {
  if ($("#alumenu-mobile .items-menu").css("left") == "-250px") {
    $("#alumenu-mobile .items-menu").animate(
      { left: "0" },
      { queue: false, duration: 250 }
    );
  } else {
    $("#alumenu-mobile .items-menu").animate(
      { left: "-250px" },
      { queue: false, duration: 250 }
    );
  }

  $(".alumenu-mobile-sub-item.open-sub-item").each(function () {
    $(this).removeClass("open-sub-item");
  });
});

$("#alumenu-mobile .items-menu .close-menu").click(function () {
  if ($("#alumenu-mobile .items-menu").css("left") == "-250px") {
    $("#alumenu-mobile .items-menu").animate(
      { left: "0" },
      { queue: false, duration: 250 }
    );
  } else {
    $("#alumenu-mobile .items-menu").animate(
      { left: "-250px" },
      { queue: false, duration: 250 }
    );
  }

  $(".alumenu-mobile-sub-item.open-sub-item").each(function () {
    $(this).removeClass("open-sub-item");
  });
});

$("#alumenu-mobile .item-menu").click(function () {
  const target = $(this).data("target");

  $(".alumenu-mobile-sub-item.open-sub-item").each(function () {
    if (target != $(this).attr("id")) {
      $(this).removeClass("open-sub-item");
    }
  });

  if ($("#" + target + ".open-sub-item").length) {
    $("#" + target).removeClass("open-sub-item");
  } else {
    $("#" + target).addClass("open-sub-item");
  }
});

if (
  navigator.userAgent.match(
    /Mobile|Windows Phone|Lumia|Android|webOS|iPhone|iPod|Blackberry|PlayBook|BB10|Opera Mini|\bCrMo\/|Opera Mobi/i
  )
) {
} else {
  $(window).scroll(function () {
    if ($("#alumenu").length == 1 && $("#wrapper").length == 1) {
      var pos1pro = $(window).scrollTop();
      var pos2pro = $("#wrapper").offset().top;
      if (pos1pro > pos2pro - 50) {
        $("#alumenu").addClass("alu-menu-scroll");
      } else {
        $("#alumenu").removeClass("alu-menu-scroll");
      }
    }
  });
}

$("#seeGifts").click(function () {
  $("#bar-birthday").addClass("bar-show");
  $("#bar-birthday").removeClass("bar-hide");

  $(this).addClass("hide-block");
  $("#closeGifts").removeClass("hide-block");

  confetti({
    particleCount: 1200,
    spread: 600,
    origin: { y: 0.5 },
  });
});

$("#closeGifts").click(function () {
  $("#bar-birthday").addClass("bar-hide");
  $("#bar-birthday").removeClass("bar-show");

  $(this).addClass("hide-block");
  $("#seeGifts").removeClass("hide-block");
});

window.Tawk_API = window.Tawk_API || {};

var mailclient = "";

window.Tawk_API.onPrechatSubmit = function (data) {
  mailclient = data[1].answer;
  let coderappel = "chat";

  $.ajax({
    type: "POST",
    url: "../ajax/index.php",
    data: {
      setaction: "rappelcoupon",
      coderappel: coderappel,
      phone_rappel: data[2].answer,
      email_rappel: data[1].answer,
      last_name_rappel: data[0].answer,
    },
  });
};

window.Tawk_API.onAgentJoinChat = function (data) {
  $.ajax({
    type: "POST",
    url: "../ajax/index.php",
    data: {
      setaction: "namechatcheck",
      name: data["name"],
      mailclient: mailclient,
    },
  });
};
