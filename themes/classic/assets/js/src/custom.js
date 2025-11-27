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

    /* Página Service de Pose Portails - Scroll */
    $("#conditions").click(function() {
      $("html, body").animate({
        scrollTop: $('#conditions-eligibilite').offset().top
      }, 800, function() {
        $("#conditions-eligibilite").click();
      });
    });

    // codigo para fazer reload da pagina ao clicar na paginacao
    $(".js-search-link").click(function () {
      const reloadPage = $(this).attr("href")
      console.log(reloadPage)
      window.location.href = reloadPage
    })

    // script para scroll na ficha tecnica
    $("#alu-button-after-image").click(function() {
      $("html, body").animate({
        scrollTop: $('#alu-button').offset().top
      }, 800, function() {
        $("#alu-button").click();
      });
    });

    $("#comments-button-after-image").click(function() {
      $("html, body").animate({
        scrollTop: $('#comments-button').offset().top
      }, 800, function() {
        $("#comments-button").click();
      });
    });

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
            $("#chatbox.bottom_right").css({ bottom: "150px" });
          } else {
            $("#menu_float_mobile").slideUp();
            $(".backtop").css({ bottom: "0px" });
            $(".grecaptcha-badge").css({ bottom: "0px" });
            $("#chatbox.bottom_right").css({ bottom: "20px" });
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
            $("#chatbox.bottom_right").css({ bottom: "130px" });
          } else {
            $("#menu_float").slideUp();
            $(".backtop").css({ bottom: "0px" });
            $(".grecaptcha-badge").css({ bottom: "0px" });
            $("#chatbox.bottom_right").css({ bottom: "20px" });
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

    let conteudoInjetado = false;
    let alturaBotaoAlu = 0;
    const product_id = $("#product_page_product_id").val();

    $("#alu-button").click(async function () {
      if (conteudoInjetado) {
        $("#alu-content").hide();
        conteudoInjetado = false;
        $("#alu-button").html(
          'Voir fiche technique <i class="fa fa-arrow-down rotate"></i>'
        );
      } else {
        await $.get(
          "/descricoes/" + product_id + ".html",
          function (data) {
            $("#alu-content").html(data);
            $("#alu-content").show();
            conteudoInjetado = true;
            $("#alu-button").html(
              'Fermer fiche technique <i class="fa fa-arrow-up rotate"></i>'
            );

            alturaBotaoAlu = $("#alu-button").offset().top - 50;

            initializeModalEvents();
          }
        );
      }
    });


    $(".btn_open_description").on("click", function () {
      alturaBotaoAlu = $("#alu-button").offset().top - 90;
      $("html, body").animate({ scrollTop: alturaBotaoAlu }, "slow");

      const alu_content_visible = $('#alu-content').is(':visible');
      if (!alu_content_visible) {
        $("#alu-button").click();
      }

      return false;
    });

    function initializeModalEvents() {
      // Abrir modal PDF
      $(".embedAluclassPDF").click(function () {
        var link = $(this).attr("data-pdf");

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

      // Abrir modal YouTube
      $(".embedAluclass").click(function () {
        var link = $(this).data("watch");
        $("#codWatch").attr(
          "src",
          "https://www.youtube.com/embed/" + link + "?rel=0"
        );
        $("#modalEmbedAluclass").modal("show");
        return false;
      });

      // Fechar modal
      $("#modalEmbedAluclassPDF_close, #modalEmbedAluclass_close").click(
        function () {
          $("#modalEmbedAluclassPDF, #modalEmbedAluclass").modal("hide");
          $("#codPdf").attr("src", "");
          $("#codWatch").attr("src", "");
          return false;
        }
      );
    }

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
        type: "POST",
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


    //open modal videos - Paulo aluclass
    $(".embedAluclass").click(function () {
      var link = $(this).data("watch");
      $("#codWatch").attr(
        "src",
        "https://www.youtube.com/embed/" + link + "?rel=0"
      );
      $("#modalEmbedAluclass").modal("show");

      const thisPage = $("body").attr("id");
      if (thisPage == "pageavis") {
        $("div.modal-backdrop").removeClass("show");
        $("div.modal-backdrop").addClass("in");

        $("div.modal-backdrop").removeClass("show");
        $("div.modal-backdrop").addClass("in");

        $("#modalEmbedAluclass").removeClass("show");
        $("#modalEmbedAluclass").addClass("in");
      }

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
        "/3d/" + link + ".html?name=" + name_prod,
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

    /*$("body.lang-fr").on("mouseleave",function (e) {
      // console.log("saindo");
      // console.log($(window).height()+", "+$(window).width());

      if(e.clientY <= 0 || e.clientX <= 0 || e.clientX > $(window).width() || e.clientY > $(window).height()){
        if (document.cookie.indexOf("leave_site") < 0) {
          // console.log("nao tem cookie");
          // console.log("define cookie");
            if (e.target.nodeName.toLowerCase() !== "select") {
              expireCookieLeaveSite = new Date(Date.now() + 300000); // 60s * 60m * 24h * time in minutes
              expireCookieLeaveSite = expireCookieLeaveSite.toUTCString();
              // console.log("cookie expira em " + expireCookieLeaveSite);
              document.cookie = "leave_site=yes; expires=" + expireCookieLeaveSite + "; path=/";
              ShowModalCoupon10OutSite();
            }
        }
      }
      // console.log("saiu");
    });*/

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

    tags_products()

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
  ClearModalPanier();
  $(".equipa-video-pop-up").remove();
  $(".popup_rapp").html('<picture class="image_status"><source id="popup_image_webp" srcset="/img/cms/popup-question.webp" type="image/webp"><img loading="lazy" id="popup_image" src="/img/cms/popup-question.jpg" class="img-fluid" alt="" /></picture>');
  $(".popup_rapp").removeClass("col-md-6");
  $(".popup_rapp").addClass("col-md-5");
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

function InsereLegendProdut(idtitleproduct) {
  var valtitleproduct = $("#titleproduct_" + idtitleproduct).val();
  $.ajax({
    type: "POST",
    url: '../ajax/index.php',
    data: { setaction: 'titleproduct', idtitleproduct: idtitleproduct, valtitleproduct: valtitleproduct },
    success: function (data) {
      $("#modalinfomessage").html('Légende inséré avec succès sur le produit.');
      $("#modalinfo").modal('show');
    },
  });

  return false;
}

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
        $(".messegelinkcart").show();
        $(".image_status").remove();
        $(".popup_rapp").removeClass("col-md-5");
        $(".popup_rapp").addClass("col-md-6");
        $("#warning_messagelinkcart").css("display", "flex");
        $("#warning_messagelinkcart").css("flex-direction", "column");
        $("#warning_messagelinkcart").css("align-items", "center");
        if(window.matchMedia("(min-width: 768px)").matches){
          $(".center-row").css("display", "flex");
          $(".center-row").css("align-items", "center");
        }else{
          $(".center-row").css("display", "block");
          $(".center-row").css("align-items", "");
        }
        $(".popup_rapp").html('<iframe class="embed-responsive-item equipa-video-pop-up" id="codPdf" src="https://www.youtube.com/embed/XeaufyZmtMg" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
        $("#warning_messagelinkcart").html(
          // "Panier d'achat partagé. Un e-mail a été envoyé à l'adresse e-mail que vous avez indiquée."
          '<picture><source srcset="/img/cms/coeur.webp" type="image/webp"><img loading="lazy" class="img-fluid img-centre" src="/img/cms/coeur.gif" alt="Merci" width="120" height="120"></picture><p class="text-uppercase text-merci-1">Nous vous remercions de votre confiance, merci !</p><p class="text-merci-2">Regardez la vidéo et rencontrez notre équipe</p>'
        );
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

//professionnels
function ClearModalProfessionnels() {
  $("#name_professionnels").val("");
  $("#mail_professionnels").val("");
  $("#phone_professionnels").val("");
  $("#siret_professionnels").val("");
  $("#warning_siret_professionnels").html("");
  $("#warning_name_professionnels").html("");
  $("#warning_mail_professionnels").html("");
  $("#warning_phone_professionnels").html("");
}


$(".professionnelsmodel").click(function () {
  ClearModalProfessionnels();
  $("#btn_tag_professionnels").show();
  $(".popup_rapp").html('<picture class="image_status"><source id="popup_image_webp" srcset="/img/cms/service-pose02.webp" type="image/webp"><img id="popup_image" src="/img/cms/service-pose02.jpg" class="img-fluid" alt="" /></picture>');
  $(".bodyprofessionnelsmessage").hide();
  $(".bodyprofessionnels").show();
  $("#modalEmbedprofessionnels").modal("show");
  return false;
});
$("#modalEmbedprofessionnel_close").click(function () {
  $("#modalEmbedprofessionnels").modal("hide");
  return false;
});



$("#btn_tag_professionnels").click(function () {
  const emailRegex = /\S+@\S+\.\S+/;

  $("#warning_siret_professionnels").html("");
  $("#warning_name_professionnels").html("");
  $("#warning_mail_professionnels").html("");
  $("#warning_phone_professionnels").html("");

  email = $("#mail_professionnels").val();
  nameCustomer = $("#name_professionnels").val();
  phoneCustomer = $("#phone_professionnels").val();
  siretname = $("#siret_professionnels").val();

  var info = "<i>Cette information est obligatoire! </i>";

  if (nameCustomer == "") {
    $("#warning_siret_professionnels").html(info);
    return false;
  }

  if (nameCustomer == "") {
    $("#warning_name_professionnels").html(info);
    return false;
  }
  if (email == "") {
    $("#warning_mail_professionnels").html(info);
    return false;
  }

  if (phoneCustomer == "") {
    $("#warning_phone_professionnels").html(info);
    return false;
  }

  if (!emailRegex.test(email)) {
    $("#warning_mail_professionnels").html("<i>Email invalide!</i>");
    return false;
  }

  $.ajax({
    type: "POST",
    url: '../ajax/index.php',
    data: {
      setaction: "sendprofessionnels",
      customermail: email,
      nameCustomer: nameCustomer,
      phoneCustomer: phoneCustomer,
      siretname: siretname,
    },
    beforeSend: function () {
      $("#warning_messageprofessionnel_pdf").html("Envoyer...");
      $(".bodyprofessionnelsmessage").show();
      $(".bodyprofessionnels").hide();
      $("#btn_tag_professionnels").hide();
    },
    success: function (data) {
      if (data == "sucess") {

        $("#warning_messageprofessionnel_pdf").html(
          // "Merci d'avoir demandé le catalogue,nous avons envoyé un e-mail à l'adresse e-mail que vous avez indiquée."
          '<picture><source srcset="/img/cms/coeur.webp" type="image/webp"><p class="text-uppercase text-merci-1">Nous vous remercions de votre confiance, merci !</p>'
        );


        $(".bodyprofessionnelsmessage").show();
        $(".bodyprofessionnels").hide();
      } else {
        if (data == "errorSendMail") {
          $("#warning_messageprofessionnel_pdf").html(
            "Désolé, il y a eu un problème lors de l'envoi de l'e-mail. Veuillez réessayer plus tard. Merci."
          );
          $(".bodyprofessionnelsmessage").show();
          $(".bodyprofessionnels").hide();
        }
      }
    },
  });
});

//professionnels

//PDF
//open modal PDF - Vasco aluclass
$(".imgPDF").click(function () {
  ClearModalCatalogue();
  $(".equipa-video-pop-up").remove();
  $(".popup_rapp").html('<picture class="image_status"><source id="popup_image_webp" srcset="/img/cms/popup-catalogue.webp" type="image/webp"><img loading="lazy" id="popup_image" src="/img/cms/popup-catalogue.jpg" class="img-fluid" alt="" /></picture>');
  $(".popup_rapp").removeClass("col-md-6");
  $(".popup_rapp").addClass("col-md-5");
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
        $(".messegelinkcart").show();
        $(".image_status").remove();
        $(".popup_rapp").removeClass("col-md-5");
        $(".popup_rapp").addClass("col-md-6");
        $("#warning_messagecatalogo_pdf").css("display", "flex");
        $("#warning_messagecatalogo_pdf").css("flex-direction", "column");
        $("#warning_messagecatalogo_pdf").css("align-items", "center");
        if(window.matchMedia("(min-width: 768px)").matches){
          $(".center-row").css("display", "flex");
          $(".center-row").css("align-items", "center");
        }else{
          $(".center-row").css("display", "block");
          $(".center-row").css("align-items", "");
        }
         $(".popup_rapp").html('<iframe class="embed-responsive-item equipa-video-pop-up" id="codPdf" src="https://www.youtube.com/embed/XeaufyZmtMg" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
        $("#warning_messagecatalogo_pdf").html(
          // "Merci d'avoir demandé le catalogue,nous avons envoyé un e-mail à l'adresse e-mail que vous avez indiquée."
          '<picture><source srcset="/img/cms/coeur.webp" type="image/webp"><img loading="lazy" class="img-fluid img-centre" src="/img/cms/coeur.gif" alt="Merci" width="120" height="120"></picture><p class="text-uppercase text-merci-1">Nous vous remercions de votre confiance, merci !</p><p class="text-merci-2">Regardez la vidéo et rencontrez notre équipe.</p>'
        );
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

let text_btn_checkout;
let label_text_checkout;
$("#alu-btn-pay").css("margin-top","10px");
$("#buttonPrintCGV").css("margin-top","10px");
$(".ps-shown-by-js").click(function () {
  var id_pay = $(this).attr('data-module-name');

  switch (id_pay) {
    case 'ps_checkpayment':
      label_text_checkout = "je confirme ma commande avec payement par chèque";
      break;

    case 'ps_wirepayment':
      label_text_checkout = " je confirme ma commande par virement";
      break;

    default:
      label_text_checkout = "payer maintenant";
      break;
  }

  if (typeof id_pay !== "undefined") {
    text_btn_checkout = label_text_checkout;
  } else {
    text_btn_checkout = text_btn_checkout;
  }

  if (id_pay == 'ps_checkpayment') {
    $("#alu-btn-pay").html(text_btn_checkout);
  } else if (id_pay == 'ps_wirepayment') {
    $("#alu-btn-pay").html(text_btn_checkout);
  } else {
    $("#alu-btn-pay").html(text_btn_checkout);
  }
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
   $("#btn_tag_rappel").html("ENVOYEZ VOTRE DEMANDE");
}

// panier
function ClearModalPanier() {
  $("#name_linkcart").val("");
  $("#mail_linkcart").val("");
  $("#phone_linkcart").val("");
  $("#email_comercial_linkcart").val("");
}

//catalogue
function ClearModalCatalogue() {
  $("#name_catalogue").val("");
  $("#mail_catalogue").val("");
  $("#phone_catalogue").val("");
  $("#email_comercial_cata").val("");
}

$(".embedservicepose").click(function () {
  ClearModal();
  $(".popup_rapp").html('<picture class="image_status"><source id="popup_image_webp" srcset="/img/cms/service-pose01.webp" type="image/webp"><img loading="lazy" id="popup_image" src="/img/cms/service-pose01.jpg" class="img-fluid" alt="" /></picture>');
  $(".popup_rapp").removeClass("col-md-6");
  $(".popup_rapp").addClass("col-md-5");

  $(".bodyrappelmessage").html(
    "<p class='text-uppercase'>Nous vous remercions de votre confiance, merci !</p>"
  );
  $(".namerappel").html("Être appelé pour un renseignement sur la pose");
  $("#coderappel").val("servicepose");
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


function ShowModalConsultion() {
  ClearModal();
  $(".equipa-video-pop-up").remove();
  $(".popup_rapp").html('<picture class="image_status"><source id="popup_image_webp" srcset="/img/cms/popup-question.webp" type="image/webp"><img loading="lazy" id="popup_image" src="/img/cms/popup-question.jpg" class="img-fluid" alt="" /></picture>');
  $(".popup_rapp").removeClass("col-md-6");
  $(".popup_rapp").addClass("col-md-5");
  $("#popup_image").attr("alt", "Une question");
  $("#email_comercial_visual").hide();
  $(".bodyrappelmessage").html(
    '<picture><source srcset="/img/cms/coeur.webp" type="image/webp"><img loading="lazy" class="img-fluid img-centre" src="/img/cms/coeur.gif" alt="Merci" width="120" height="120"></picture><p class="text-uppercase text-merci-1">Nous vous remercions de votre confiance, merci !</p><p class="text-merci-2">Regardez la vidéo et rencontrer notre équipe</p>'
  );
  $(".namerappel").html("JE SOUHAITE UNE ÉTUDE GRATUITE");
  $("#coderappel").val("consultation");
  $("#btn_tag_rappel").html("Envoyer une demande de consultation gratuite.");
  $(".rappelheader").css("background-color", "#FFCF00");
  $("#btn_tag_rappel").css("background-color", "#FFCF00");
  $(".namerappel").css("color", "white");
  $("#btn_tag_rappel").css("color", "white");
  $(".bodyrappelmessage").hide();
  $(".bodyrappel").show();
  $("#btn_tag_rappel").show();
  $("#modalEmbedRappel").modal("show");

  return false;
}

function ShowModalRappel() {
  ClearModal();
  // $("#popup_image_webp").attr("src", "/img/cms/popup-question.webp");
  // $("#popup_image").attr("src", "/img/cms/popup-question.jpg");
  $(".equipa-video-pop-up").remove();
  $(".popup_rapp").html('<picture class="image_status"><source id="popup_image_webp" srcset="/img/cms/popup-question.webp" type="image/webp"><img loading="lazy" id="popup_image" src="/img/cms/popup-question.jpg" class="img-fluid" alt="" /></picture>');
  $(".popup_rapp").removeClass("col-md-6");
  $(".popup_rapp").addClass("col-md-5");
  $("#popup_image").attr("alt", "Une question");
  $("#email_comercial_visual").hide();
  $(".bodyrappelmessage").html(
    // "Votre demande a bien été enregistrée, nous vous contacterons dans les plus brefs délais."
    '<picture><source srcset="/img/cms/coeur.webp" type="image/webp"><img loading="lazy" class="img-fluid img-centre" src="/img/cms/coeur.gif" alt="Merci" width="120" height="120"></picture><p class="text-uppercase text-merci-1">Nous vous remercions de votre confiance, merci !</p><p class="text-merci-2">Regardez la vidéo et rencontrez notre équipe</p>'
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
    'Inscrivez-vous et gagnez un cadeau*<br>  <a href="/content/19-anniversaire" target="_blank" ><small style="font-weight: 500;font-size: 0.675rem;color: red;">*voir conditions du concours</small></a>'
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

function ShowModalCoupon10OutSite() {
  ClearModal();
  $("#popup_image_webp").attr("src", "/img/cms/popup-close-site.webp");
  $("#popup_image").attr("src", "/img/cms/popup-close-site.jpg");
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


function sendContacterInstalltion() {
  const emailRegex = /\S+@\S+\.\S+/;

  $("#warning_email_installation").removeClass("show").html("");
  $("#global_warning").removeClass("show").html("");

  let name_installation = $("#name_installation").val();
  let prename_installation = $("#prename_installation").val();
  let email_installation = $("#email_installation").val();
  let phone_installation = $("#phone_installation").val();
  let description_installation = $("#description_installation").val();

  if(name_installation == "" || prename_installation == "" || email_installation == "" || phone_installation == "" || description_installation == ""){
   $('<div class="alert">&#42; Veuillez remplir le champ obligatoire.</div>').appendTo("#alert-container");
    setTimeout(() => $(".alert").remove(), 3000);
  } else if (!emailRegex.test(email_installation)) {
    $('<div class="alert pt-2">&#42; Email invalide !</div>').appendTo("#alert-container");
    setTimeout(() => $(".alert").remove(), 3000);
  } else {

  $.ajax({
    type: "POST",
    url: "../ajax/index.php",
    data: {
      setaction: "rappelcoupon",

      coderappel: 'contacterinstalltion',
      nome_rappel : name_installation,
      prenome_rappel : prename_installation,
      desc_rappel : description_installation,
      phone_rappel: phone_installation,
      email_rappel: email_installation,

    },
    success: function (data) {
      if (data == "sucess") {
               $("#modalinfomessage").html('Demande envoyée avec succès.');
      $("#modalinfo").modal('show');
      }


      if (data == "error") {
               $("#modalinfomessage").html('Erreur d\'envoi de votre demande.');
              $("#modalinfo").modal('show');
      }

        $("#name_installation").val('');
        $("#prename_installation").val('');
        $("#email_installation").val('');
        $("#phone_installation").val('');
        $("#description_installation").val('');
    },
  });
}
}

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
        $(".image_status").remove();
        $(".popup_rapp").removeClass("col-md-5");
        $(".popup_rapp").addClass("col-md-6");
        $(".bodyrappelmessage").css("display", "flex");
        $(".bodyrappelmessage").css("flex-direction", "column");
        $(".bodyrappelmessage").css("align-items", "center");
        if(window.matchMedia("(min-width: 768px)").matches){
          $(".center-row").css("display", "flex");
          $(".center-row").css("align-items", "center");
        }else{
          $(".center-row").css("display", "block");
          $(".center-row").css("align-items", "");
        }
        $(".popup_rapp").html('<iframe class="embed-responsive-item equipa-video-pop-up" id="codPdf" src="https://www.youtube.com/embed/XeaufyZmtMg" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
        $(".bodyrappel").hide();
        $("#btn_tag_rappel").hide();
      }
      if (data == "sucessreload") {
        $(".bodyrappelmessage").show();
        $(".bodyrappel").hide();
        $("#btn_tag_rappel").hide();
        setTimeout(function () { location.reload(); }, 1000);
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

$("#js-delivery > div > div > div >div > span > input").click(function () {
  var deliverynameselect = $(this).attr("data-name");
  console.log(deliverynameselect);
  var deliveryaction = $('#js-delivery').attr("action");
  var deliverydataurlupdate = $('#js-delivery').attr("data-url-update");
  // console.log( $('#js-delivery').data("url-update"));
  deliveryaction = deliveryaction.slice(0, -1);
  deliverydataurlupdate = deliverydataurlupdate.slice(0, -1);
  if (deliverynameselect == 'Collecte dans notre entrepôt (38230 Pont-De-Cheruy)') {
    $('#js-delivery').attr("action", deliveryaction + '1');
    $('#js-delivery').data("data-url-update", deliverydataurlupdate + '1');
    $('#js-delivery').data("url-update", deliverydataurlupdate + '1');
  } else {
    $('#js-delivery').attr("action", deliveryaction + '0');
    $('#js-delivery').data("data-url-update", deliverydataurlupdate + '0');
    $('#js-delivery').data("url-update", deliverydataurlupdate + '0');
  }

});

/*rappel end*/

// novo menu
// $(".alumenu a.alumenu-item").mouseover(function () {
//   const target = $(this).data("target");

//   $(".alumenu a.alumenu-item.active").each(function () {
//     const otherTargets = $(this).data("target");
//     if (otherTargets !== target) {
//       $(".alumenu-item").removeClass("active");
//       $(".alumenu-sub-item").addClass("hide-block");
//     }
//   });

//   $(".alumenu-item[data-target='" + target + "']").addClass("active");
//   $(".alumenu-overlay").removeClass("hide-block");
//   $("#" + target).removeClass("hide-block");
// });

// $(".alumenu").mouseleave(function () {
//   $(".alumenu-item").removeClass("active");
//   $(".alumenu-overlay").addClass("hide-block");
//   $(".alumenu-sub-item").addClass("hide-block");
// });

// $("#alumenu-mobile .load").click(function () {
//   if ($("#alumenu-mobile .items-menu").css("left") == "-250px") {
//     $("#alumenu-mobile .items-menu").animate(
//       { left: "0" },
//       { queue: false, duration: 250 }
//     );
//   } else {
//     $("#alumenu-mobile .items-menu").animate(
//       { left: "-250px" },
//       { queue: false, duration: 250 }
//     );
//   }

//   $(".alumenu-mobile-sub-item.open-sub-item").each(function () {
//     $(this).removeClass("open-sub-item");
//   });
// });

// $("#alumenu-mobile .items-menu .close-menu").click(function () {
//   if ($("#alumenu-mobile .items-menu").css("left") == "-250px") {
//     $("#alumenu-mobile .items-menu").animate(
//       { left: "0" },
//       { queue: false, duration: 250 }
//     );
//   } else {
//     $("#alumenu-mobile .items-menu").animate(
//       { left: "-250px" },
//       { queue: false, duration: 250 }
//     );
//   }

//   $(".alumenu-mobile-sub-item.open-sub-item").each(function () {
//     $(this).removeClass("open-sub-item");
//   });
// });

// $("#alumenu-mobile .item-menu").click(function () {
//   const target = $(this).data("target");

//   $(".alumenu-mobile-sub-item.open-sub-item").each(function () {
//     if (target != $(this).attr("id")) {
//       $(this).removeClass("open-sub-item");
//     }
//   });

//   if ($("#" + target + ".open-sub-item").length) {
//     $("#" + target).removeClass("open-sub-item");
//   } else {
//     $("#" + target).addClass("open-sub-item");
//   }
// });

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

function almaAluBtn() {
  $(".alma-payment-plans-container").trigger('click');
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

function ListProductShow() {

  currentLocation = "/commande?ajax=1&action=cartlistshow";

  $("tooltiptext-list-cart").html(' <img src="/img/loadlistproduct.gif" alt="" class="load" style="height: 100px;">');
  $.ajax({
    type: "POST",
    url: currentLocation,
    data: {
      action: "cartlistshow",
    },
    success: function (data) {
      $(".tooltiptext-list-cart").html(data['cart_list']);
      $(".tooltiptext-list-cart-bar").html(data['cart_list']);
    },
  });
}

$(".carticon").mouseover(function () {
  ListProductShow();
});

//Scroll NDK
$(document).on("click", ".ndkackFieldItem .toggler", function () {
  if (window.scrollY > 0) {
    position = this.getBoundingClientRect();
    window.scrollTo(0, position.top + window.scrollY - 200)
  } else {
    $('html, body').scrollTop();
  }
})
//--------

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

function MessageDeliveryChange(messageelem) {
  messagetext = $(messageelem).val();
  $("#delivery_message").val(messagetext);

}
function MessageDeliverySave() {

  $("#cart-loading").addClass("cart-loading-img");
  var deliveryaction = $('#js-delivery').attr("action");
  var deliverydataurlupdate = $('#js-delivery').attr("data-url-update");
  // console.log( $('#js-delivery').data("url-update"));
  shipp = document.location.href.slice(-1);

  deliveryaction = deliveryaction.slice(0, -1);
  deliverydataurlupdate = deliverydataurlupdate.slice(0, -1);

  $('#js-delivery').attr("action", deliveryaction + shipp);
  $('#js-delivery').data("data-url-update", deliverydataurlupdate + shipp);
  $('#js-delivery').data("url-update", deliverydataurlupdate + shipp);

  $("#js-delivery > button").trigger('click');
}


function CartShippingSave() {
  $("#cart-loading").addClass("cart-loading-img");
  var val = $("#cart-subtotal-shipping-temp").val();
  cartSubtotalShippingchange();

  if (val == "collect") {
    $("#delivery_option_134").trigger("click");
  } else {
    $("#delivery_option_141").trigger("click");
  }
  $("#js-delivery > button").trigger('click');

}


function OpenAdressesCart() {
  $("#checkout-addresses-step > h1 > .step-edit").trigger("click");
}

function CloseInfoModal(){
  $("#modalinfo").modal("hide");
  return false;
}

$('.AluwishlistProd').click(function () {
  $.ajax({
    type: "POST",
    url: "../ajax/index.php",
    data: {
      setaction: "setwishlist",
      id_product: $('#ndkcf_id_product').val(),
    },
    success: function (data) {
      if ($('#wishlistimg').hasClass('heartwishlist')) {
        $('#wishlistimg').removeClass('heartwishlist');
        $('#wishlistimg').attr('src', '/img/heart_full.svg');
        $('#wishlisttext').html("Produit déjà ajouté aux favoris");
      } else {
        $('#wishlistimg').addClass('heartwishlist');
        $('#wishlistimg').attr('src', '/img/heart.svg');
        $('#wishlisttext').html("Ajouter à mes favoris");
      }
    }
  });
});

if (window.matchMedia("(max-width: 991px)").matches) {
  $('.avis-h').css('height','85px');
  $('.avis-h-checkout').css('height','85px');
}
if (window.matchMedia("(min-width: 992px)").matches) {
  $('.avis-h').css('height','55px');
  $('.avis-h-checkout').css('height','65px');
}

if ($('#checkout-login-form .identifier').length > 0) {
  $('#checkout-login-form .identifier').removeClass('col-md-7');
  $('#checkout-login-form .identifier').addClass('col-md-9');
}

if ($('#checkout-guest-form .identifier').length > 0) {
  $('#checkout-guest-form .identifier').removeClass('col-md-7');
  $('#checkout-guest-form .identifier').addClass('col-md-9');
}

if (window.matchMedia("(min-width: 768px)").matches) {
  $('.popup-logo-info').hide();
  $('.popup-logo-info-mobile').hide();
  $('#icon-info').mouseenter(function(){
    $('.popup-logo-info').show();
    // console.log("teste show");
  });
  $('#icon-info').mouseleave(function(){
    $('.popup-logo-info').hide();
    // console.log("teste hide");
  });

  $('.popup-logo-info').mouseenter(function(){
    $('.popup-logo-info').show();
  })

  $('.popup-logo-info').mouseleave(function(){
    $('.popup-logo-info').hide();
  })
}else{
  $('.popup-logo-info-mobile').hide();
  $('#icon-info-mobile').on("click",function(){
    $('.popup-logo-info-mobile').show();
  });
  $(document).on("click", "#icon-info-mobile-close", function(){
    $('.popup-logo-info-mobile').hide();
  });
}


// JS PAG GOOGLE MY BUSINESS
document.addEventListener('DOMContentLoaded', function () {
      const track = document.getElementById('carouselTrack');
      const nextBtn = document.querySelector('.next-business');
      const prevBtn = document.querySelector('.prev-business');

      if (!track || !nextBtn || !prevBtn) return;

      let currentIndex = 0;
      let cardWidth;
      let visibleCount;
      let cards;

      function getVisibleCardsCount() {
        const width = window.innerWidth;
  if (width <= 600) return 1;
  if (width <= 800) return 2;
  if (width <= 1200) return 3;
  return 4;
}


      function updateCards() {
        cards = Array.from(track.children);
      }

      function cloneCards() {
        updateCards();
        const clones = cards.slice(0, visibleCount).map(card => card.cloneNode(true));
        clones.forEach(clone => {
          clone.classList.add('clone');
          track.appendChild(clone);
        });
        updateCards();
      }

      function updateSizes() {
        visibleCount = getVisibleCardsCount();
        updateCards();
        cardWidth = cards[0].offsetWidth + 20; // Ajusta se tiver margem
      }

      function moveToIndex(index, animate = true) {
        if (!animate) {
          track.style.transition = 'none';
        } else {
          track.style.transition = 'transform 0.5s ease-in-out';
        }
        track.style.transform = `translateX(-${index * cardWidth}px)`;
        currentIndex = index;
      }

      nextBtn.addEventListener('click', () => {
        moveToIndex(currentIndex + 1);
        if (currentIndex + 1 === cards.length) {
          setTimeout(() => {
            moveToIndex(0, false);
          }, 500);
        }
      });

      prevBtn.addEventListener('click', () => {
        if (currentIndex === 0) {
          moveToIndex(cards.length - 1, false);
          setTimeout(() => {
            moveToIndex(cards.length - 2);
          }, 50);
        } else {
          moveToIndex(currentIndex - 1);
        }
      });

      window.addEventListener('resize', () => {
        updateSizes();
        moveToIndex(currentIndex, false);
      });

      updateSizes();
      cloneCards();
      moveToIndex(0);
    });

function ShowHide(x) {
  x.classList.toggle("change");
  var Menu = document.getElementById("Menu");
  if (Menu.style.display === "none") {
    Menu.style.display = "block";
  } else {
    Menu.style.display = "none";
  }
}

function tags_products(){
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

    // script para colocar layer de img pose na foto do produto
    $.each($(".img-service-pose"), function () {
      var divId = $(this).data("dividprod");
      var divcat = $(this).data("divcategory");
      var arrayPose = [24,26,25,111,32,33,34,35,37,83,90,93,51,52,53,55,56,65,84,89,86,87,640131,13644,216,220,225,640031,307];
      var arrayNotPose = [111,863,949,1034,1041,335,347,4511,293889,3607,3654,79936,13442,1282,1285,1288,29274,1524,29275,29276,166,13530,1582,354312,1585,354371,354390,354400,355,640019,13445,29264,367,13472,640021,640259,640260,640261,640262,640263,640264,640265,640268,640269,13437,13436,640003,640004,640006,640008,640005,640007,640010,640009];
      if ($.inArray(divcat, arrayPose) !== -1 || $.inArray(divId, arrayPose) !== -1) {
        if($.inArray(divId, arrayNotPose) !== -1) {
        } else {
          $(this).removeClass("img-a-medida-hide");
        }
      }
    });
    // script para colocar layer de img pose na foto do produto

    // -- Joana - Script para colocar layer de img motorização solar na foto do produto [ID = 640270]
    $.each($(".img-motorisation-solaire"), function () {
      var divname = $(this).data("divname");
      if (
        divname.includes("SOLAIRE") ||
        divname.includes("Solaire") ||
        divname.includes("solaire")
      ) {
        $(this).removeClass("img-a-medida-hide");
      }
    });

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

    $.each($(".kit-grillage-vert-tag"), function () {
      var dividprod = $(this).data('dividprod');

      if (dividprod == "640023" || dividprod == "48485" || dividprod == "68667" || dividprod == "640024" || dividprod == "68627" || dividprod == "640025" ) {
        $(this).removeClass("img-a-medida-hide");
      }
    });

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
    // // 200x55 4mm - Miguel
    $.each($(".img-cloture-200-4mm"), function () {
      var dividprod = $(this).data("dividprod");
      if (dividprod == "68667") {
        $(this).removeClass("img-a-medida-hide");
      }
    });

    // $.each($(".tag-promo-50-store"), function () {
    //   var dividprod = $(this).data('dividprod');

    //   if (dividprod == "1302" || dividprod == "640149" || dividprod == "1379" || dividprod == "640151" || dividprod == "640147" || dividprod == "640148" || dividprod == "640207" || dividprod == "640208") {
    //     $(this).removeClass("img-a-medida-hide");
    //   }
    // });

    // $.each($(".img-oferta-3-estores"), function () {
    //   var dividprod = $(this).data('dividprod');

    //   if (dividprod == "1379" || dividprod == "640151" ) {
    //     $(this).removeClass("img-a-medida-hide");
    //   }
    // });

    // $.each($(".img-oferta-table"), function () {
    //   var dividprod = $(this).data('dividprod');

    //   if (dividprod == "640147" || dividprod == "640148" || dividprod == "640207" || dividprod == "640208") {
    //     $(this).removeClass("img-a-medida-hide");
    //   }
    // });

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

    // $.each($(".img-ocult-grillage"), function () {
    //   var dividprod = $(this).data('dividprod');

    //   if (dividprod == "48485" || dividprod == "640023" || dividprod == "640024" || dividprod == "68667" ) {
    //     $(this).removeClass("img-a-medida-hide");
    //   }
    // });

    // $.each($(".img-post-rhino-pro"), function () {
    //   var dividprod = $(this).data('dividprod');

    //   if (dividprod == "68627" || dividprod == "640025" ) {
    //     $(this).removeClass("img-a-medida-hide");
    //   }
    // });

    // // motor-promo-athena
    // $.each($(".motor-promo-athena"), function () {
    //   var dividprod = $(this).data("dividprod");
    //   var aluclass_dividprod = [12227,12228,170307,12223,170397,321715,12225,12226,170225,13613,171280];

    //   if ($.inArray(parseInt(dividprod), aluclass_dividprod) !== -1) {
    //     $(this).removeClass("img-a-medida-hide");
    //   }
    // });
    // motor-promo-tucan
    // $.each($(".motor-promo-tucan"), function () {
    //   var dividprod = $(this).data("dividprod");
    //   var aluclass_dividprod = [1651,1663,1670,1682,1689,1936,1955,1967,1979,1991,1998,2005,2017,2024,2031,2225,2232,2239,2251,2258,2265,2275,18766,18779,19426,84003,84736,85102,86313,86645,86822,96450,97109,97197,337262,640078,640079,640080,640081,640082,640083,640084,640085,640086,640087,640088,640089,640090,640091,640209,2279,5601,5710,5891,6072,6253,6362,6543,6724,6905,7086,7267,7358,7539,7612,7709,7818,7999,8108,8289,8470,8651,13665,18784,18789,19428,84141,84808,85247,86163,86651,96371,96451,97110,97196,640154,640155,640156,640157,640158,640159,640160,640161,640162,640163,640164,640165,640166,640167,640212];

    //   if ($.inArray(parseInt(dividprod), aluclass_dividprod) !== -1) {
    //     $(this).removeClass("img-a-medida-hide");
    //   }
    // });

    // // motor-promo-centaurus
    // $.each($(".motor-promo-centaurus"), function () {
    //   var dividprod = $(this).data("dividprod");
    //     var aluclass_dividprod = [1658,1677,1810,1931,1962,1974,1986,2012,2128,2246,2272,2370,2375,2380,2385,2491,2496,2501,2506,2511,2516,2521,2526,18774,18780,58943,106906,107031,107100,107508,108772,108835,108902,108956,109063,640110,640111,640112,640113,640114,640115,640117,640118,640119,640120,640121,640122,640123,640210,2390,8742,8863,9064,9265,9466,9587,9788,9989,10190,10391,10592,10693,10894,10975,11072,11193,11394,11515,11716,11917,12118,13648,18785,18790,106905,107032,107101,107509,108773,108834,108903,108957,109065,640168,640169,640170,640171,640172,640173,640174,640175,640176,640177,640178,640179,640180,640213];

    //   if ($.inArray(parseInt(dividprod), aluclass_dividprod) !== -1) {
    //     $(this).removeClass("img-a-medida-hide");
    //   }
    // });
    // 100x55

    // -- paulo - script para colocar layer de img cloture

    // ++ paulo - script para colocar tag soldes para produtos bonnes affaires
    // $.each($(".img-tag-soldes"), function () {
    //   var divname = $(this).data("divname");
    //   if (
    //     divname.includes("DESTOCKAGE") ||
    //     divname.includes("destockage") ||
    //     divname.includes("Destockage") ||
    //     divname.includes("Soldes") ||
    //     divname.includes("soldes") ||
    //     divname.includes("SOLDES")
    //   ) {
    //     $(this).removeClass("img-a-medida-hide");
    //   }
    // });
    // -- paulo - script para colocar tag soldes para produtos bonnes affaires

    // ++ paulo - script para colocar layer de img de BLACK FRIDAY por cima da foto do produto
    // var blackFridayProducts = [
    //   "640030",
    //   "640036",
    //   "640032",
    //   "640033",
    //   "640056",
    //   "640034",
    //   "640067",
    //   "640035",
    //   "640069",
    // ];
    // $.each($(".img-black-friday"), function () {
    //   if (
    //     $.inArray($(this).data("dividprod").toString(), blackFridayProducts) !==
    //     -1
    //   ) {
    //     $(this).removeClass("img-a-medida-hide");
    //   }
    // });
    // -- paulo - script para colocar layer de img de BLACK FRIDAY por cima da foto do produto
}
