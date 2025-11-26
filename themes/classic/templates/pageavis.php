<script src="https://kit.fontawesome.com/1f4ea3c7b3.js" crossorigin="anonymous"></script>

<!-- Datatables CDN css -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
<!-- End Datatables CDN css -->


<!-- Bootstrap CDN css
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
 End Bootstrap CDN css -->

<style>
  .halfColors {
    background: -webkit-linear-gradient(0deg, #FFC107 50%, #DADCE0 50% 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .buttonAvis {
    border: none;
    color: var(--red);
    text-decoration: none;
    font-weight: 500;
    background-color: #EBEBEB;
    font-size: 1.125rem;
  }

  .buttonAvis:focus,
  .buttonAvis:hover,
  .buttonAvis.active,
  .buttonAvis:active {
    color: #000;
    border: #f6f6f6;
  }
</style>



<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<h2 style="margin-top: 2rem; margin-bottom: 2rem;">Les témoignages vidéos de nos clients</h2>
        <a href="https://www.youtube.com/watch?v=dKHMvhmitxs&list=PLGUOFe326PaRwWxMRNJ-w-vZq0XqCTWN5" target="_blank">
            <div style="display:block;background-image: url(img/temoignage-video.jpg);
            background-repeat: no-repeat; background-size:100%; width:auto;height:275px;max-width:1074px;@media (max-width: 640px) { height:75px!important; }">
            </div>
        </a>-->
<!--<img class="img-fluid" src="/img/avis/banner/FR_banner.jpg">-->
<a href="https://www.youtube.com/watch?v=dKHMvhmitxs&list=PLGUOFe326PaRwWxMRNJ-w-vZq0XqCTWN5" target="_blank">
  <div class="img-banner" style="display:block;background-image: url(/img/avis/banner/FR_banner.jpg);
            background-repeat: no-repeat; background-size:100%;">
  </div>
</a>
<!--</img>-->
<!-- <hr style="width: 92%; border: 1px solid #707070"> -->
<section class="Star-Trustpilot">
  <?php

  /*$filename = "https://www.google.com/shopping/ratings/account/metrics?q=priximbattable.net&c=FR&v=17";

$content = file_get_contents($filename);

$pattern = ('/<b\sclass="rpRBdc".*?>*.?<\/b>/'); //Google data

preg_match_all($pattern, $content, $matches);*/


  // Buscando conteúdo externo e depois processar extraindo a informação

  // URL do site do Google
  // Extrair o conteúdo da "span" com a classe "Aq14fc" através do link externo
  /*$htmlGoogle = 'https://www.google.com/search?q=priximbattable&sxsrf=APwXEdcu6l7-kkC3h7G3GN4Cv1pmSOvXJg%3A1683556148696&ei=NAdZZKfxKaiCkdUPvP254Ac&ved=0ahUKEwin286x9-X-AhUoQaQEHbx-DnwQ4dUDCA8&uact=5&oq=priximbattable&gs_lcp=Cgxnd3Mtd2l6LXNlcnAQAzIKCAAQRxDWBBCwAzIKCAAQRxDWBBCwAzIKCAAQRxDWBBCwAzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIMCAAQigUQsAMQChBDMgoIABCKBRCwAxBDMhsILhCKBRDHARDRAxCoAxDSAxDIAxCwAxBDGAEyGwguEIoFEMcBENEDEKgDENIDEMgDELADEEMYATIbCC4QigUQxwEQ0QMQqAMQ0gMQyAMQsAMQQxgBMh4ILhCKBRDHARDRAxDUAhCoAxDSAxDIAxCwAxBDGAEyHgguEIoFENQCEJgDEJoDEKgDEJsDEMgDELADEEMYAUoECEEYAFAAWABgygVoAXABeACAAQCIAQCSAQCYAQDIARHAAQHaAQYIARABGAg&sclient=gws-wiz-serp&bshm=lbsc/1#lrd=0x47f4cb7f69abf69d:0x7f24546ab0ec8a61,1,,,,';

$contentGoogle = file_get_contents($htmlGoogle);

$patternGoogle = ('/<span class="Aq14fc"[^>]*>(.*?)<\/span>/s');

preg_match_all($patternGoogle, $contentGoogle, $matches);
$contentGoogle = $matches[1];
$contentNotaGoogle = $contentGoogle;
$contentNotaGoogle = '';*/

  // Imprime a avaliação encontrada
  //echo $contentGoogle;


  // URL do site do Trustpilot
  // Extrair o conteúdo da "span" com a classe "Aq14fc" através do link externo
  /*$htmlTrustpilot = 'https://pt.trustpilot.com/review/priximbattable.net';

$contentTrustpilot = file_get_contents($htmlTrustpilot);

$patternTrustpilot = '/<p class="typography_body-l__KUYFJ[^>]*>(.*?)<\/p>/s';

preg_match_all($patternTrustpilot, $contentTrustpilot, $matches);
$contentTrustpilot = $matches[1][0];
$contentNotaTrustpilot = $contentTrustpilot;
$contentNotaTrustpilot = '';*/

  // Imprime a avaliação encontrada
  //echo $contentTrustpilot;


  // Executa a consulta SQL e armazena os resultados em um array
  $notaBD = Db::getInstance()->executeS("SELECT `id`,`nome`, `nota` FROM `ps_notas_externas`");
  $notas_array = [];

  foreach ($notaBD as $notas) {
    $idnota = $notas['id'];
    $name = $notas['nome'];
    $contentNota = $notas['nota'];

    // Adiciona os resultados em um array
    $notas_array[] = [
      'id' => $idnota,
      'nome' => $name,
      'nota' => $contentNota,
    ];
  }

  // Percorre o array para exibir as notas
  foreach ($notas_array as $notas) {
    $id = $notas['id'];
    $nome = $notas['nome'];
    $contentNota = $notas['nota'];

    if ($id == 1) {
      $contentNotaGoogle = $contentNota;
      //echo ('<br>');
      //echo ('<br>');
    } else if ($id == 2) {
      $contentNotaTrustpilot = $contentNota;
      //echo ('<br>');
      //echo ('<br>');
    } else if ($id == 3) {
      $contentNotaPriximbattable = $contentNota;
    } else if ($id == 4) {
      $contentNotaPagesJaunes = $contentNota;
      //echo ('<br>');
      //echo ('<br>');
    }
  }


  //print_r($notaBD);




  ?>
  <div>
    <h2 style="margin-top: 2rem; margin-bottom: 2rem; display: flex; justify-content: center; text-align: center; align-items: center;">&ensp;Les avis clients Priximbattable sur Trustpilot&ensp;

      <div class="commentaire-positif" style="position: absolute;margin-top: 10rem;background-color: #f8f9fa;display: flex;padding: 0.5rem 0.4rem 0.1rem 0.4rem;justify-content: center;text-align: center;align-items: center;margin-right: 2rem;margin-left:2rem;">
        <h3 style="
                font-family: poppins, sans-serif;
            "><?php echo $matches[0][0]; ?>&nbsp;

          <i class="fas fa-star" style="color: #00b67a;"></i>
          <i class="fas fa-star" style="color: #00b67a;"></i>
          <i class="fas fa-star" style="color: #00b67a;"></i>
          <i class="fas fa-star" style="color: #00b67a;"></i>
          <i class="fas fa-star halfColorGreen" style="color: #DADCE0;"></i>&nbsp;
          72% commentaire positif - <?php echo $contentNotaTrustpilot; ?><br>
        </h3><br>
      </div>
    </h2><br>
    <h3 style="margin-top: 4rem; margin-bottom: 2rem; display: flex; justify-content: center; text-align: center; align-items: center; font-size: 14px; font-weight: normal;">Selon les avis des clients et les statistiques de Trustpilot et/ou de nos partenaires.</h3>
  </div>
  <section style="margin-left: auto; margin-right: 32px; margin-top: 1.5rem; margin-bottom: 2rem;">
    <div class="row pl-2">
      <div class="col-sm-12">
        <div class="row px-1" data-aos="fade-left">
          <div class="col-sm-12 "><a href="https://fr.trustpilot.com/review/priximbattable.net">
              <img src="/img/logoTrustpilot.jpg" style="display: block; margin-left: auto; margin-right: auto; margin-bottom: -8rem;" class="img-fluid" width="200" height="100">
            </a></div>
        </div>
      </div>
    </div>
  </section>
</section>
<!-- TrustBox script
<script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async>
</script>
 End TrustBox script -->

<!-- Bootstrap script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<!-- End Bootstrap script -->



<!-- TrustBox widget - Slider
<div class="trustpilot-widget" data-locale="fr-FR" data-template-id="54ad5defc6454f065c28af8b" data-businessunit-id="582f0bd80000ff000597b535" data-style-height="240px" data-style-width="100%" data-theme="light" data-stars="3,4,5">
    <a href="https://fr.trustpilot.com/review/priximbattable.net" target="_blank" rel="noopener">Trustpilot</a>
</div>
End TrustBox widget -->


<br>
<hr style="width: 92%; border: 1px solid #707070;margin-top: 3rem;">

<!-- Bloco Pages Jaunes -->

<div>
  <h2 style="margin-top: 4rem; margin-bottom: 2rem; display: flex; justify-content: center; text-align: center; align-items: center;">&ensp;Les avis clients Priximbattable sur Pages Jaunes&ensp;

    <div class="commentaire-positif" style="position: absolute;margin-top: 10rem;background-color: #f8f9fa;display: flex;padding: 0.5rem 0.4rem 0.1rem 0.4rem;justify-content: center;text-align: center;align-items: center;margin-right: 2rem;margin-left:2rem;">
      <h3 style="
                font-family: poppins, sans-serif;
            "><?php echo $matches[0][0]; ?>&nbsp;
        <!--<img src="/img/starComments.png"/>-->
        <i class="fas fa-star starYellow"></i>
        <i class="fas fa-star starYellow"></i>
        <i class="fas fa-star starYellow"></i>
        <i class="fas fa-star starYellow"></i>
        <i class="fa fa-star halfColors"></i>&nbsp;

        79% commentaire positif - <?php echo $contentNotaPagesJaunes; ?><br>

      </h3><br>
    </div>
  </h2><br>
  <h3 style="margin-top: 4rem; margin-bottom: 2rem; display: flex; justify-content: center; text-align: center; align-items: center; font-size: 14px; font-weight: normal;">Selon les avis des clients et les statistiques de PagesJaunes et/ou de nos partenaires.</h3>
</div>
<section style="margin-left: auto; margin-right: 32px; margin-top: 1.5rem; margin-bottom: 2rem;">
  <div class="row pl-2">
    <div class="col-sm-12">
      <div class="row px-1" data-aos="fade-left">
        <div class="col-sm-12 "><a href="https://www.pagesjaunes.fr/pros/57501974" target="_blank">
            <img src="/img/logoPagesJaunes.jpg" style="display: block; margin-left: auto; margin-right: auto; margin-bottom: -8rem;" class="img-fluid" width="200" height="100">
          </a></div>
        <br><br>
      </div>
    </div>
  </div>
</section>

<!-- Fim Bloco Pages Jaunes -->
<br><br><br><br>
<hr style="width: 92%; border: 1px solid #707070;margin-top: -3rem;">


<div class="table-responsive-row clearfix" style="margin-top: -8rem; margin-bottom: 2rem;">
  <!--<div style="position:relative;top:-195px;z-index:9999;width:93%;margin:0 auto;height:175px;"></div>-->
  <!--<hr style="width: 92%; border: 1px solid #707070;margin-top: 1rem;">-->
  <div>
    <h2 style="margin-top: 11rem; margin-bottom: 2rem; display: flex; justify-content: center; text-align: center; align-items: center;">&ensp;Les avis produits sur Google&ensp;
      <?php

      $filename = "https://www.google.com/shopping/ratings/account/metrics?q=priximbattable.net&c=FR&v=17";

      $content = file_get_contents($filename);

      $pattern = ('/<b\sclass="rpRBdc".*?>*.?<\/b>/'); //Google data

      preg_match_all($pattern, $content, $matches);

      ?>
      <div class="commentaire-positif" style="position: absolute;margin-top: 10rem;background-color: #f8f9fa;display: flex;padding: 0.5rem 0.4rem 0.1rem 0.4rem;justify-content: center;text-align: center;align-items: center;margin-right: 2rem;margin-left:2rem;">
        <h3 style="
                font-family: poppins, sans-serif;
            "><?php echo $matches[0][0]; ?>&nbsp;
          <!--<img src="/img/starComments.png"/>-->
          <i class="fas fa-star starYellow"></i>
          <i class="fas fa-star starYellow"></i>
          <i class="fas fa-star starYellow"></i>
          <i class="fas fa-star starYellow"></i>
          <i class="fa fa-star halfColors"></i>&nbsp;

          82% commentaire positif - <?php echo $contentNotaGoogle ?><br>

        </h3><br>
      </div>
    </h2><br>
    <h3 style="margin-top: 4rem; margin-bottom: 2rem; display: flex; justify-content: center; text-align: center; align-items: center; font-size: 14px; font-weight: normal;">Selon les avis des clients et les statistiques de Google et/ou de nos partenaires.</h3>
  </div>

  <?php

  $filename = "https://www.google.com/search?q=priximbattable&sxsrf=APwXEdcu6l7-kkC3h7G3GN4Cv1pmSOvXJg%3A1683556148696&ei=NAdZZKfxKaiCkdUPvP254Ac&ved=0ahUKEwin286x9-X-AhUoQaQEHbx-DnwQ4dUDCA8&uact=5&oq=priximbattable&gs_lcp=Cgxnd3Mtd2l6LXNlcnAQAzIKCAAQRxDWBBCwAzIKCAAQRxDWBBCwAzIKCAAQRxDWBBCwAzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIMCAAQigUQsAMQChBDMgoIABCKBRCwAxBDMhsILhCKBRDHARDRAxCoAxDSAxDIAxCwAxBDGAEyGwguEIoFEMcBENEDEKgDENIDEMgDELADEEMYATIbCC4QigUQxwEQ0QMQqAMQ0gMQyAMQsAMQQxgBMh4ILhCKBRDHARDRAxDUAhCoAxDSAxDIAxCwAxBDGAEyHgguEIoFENQCEJgDEJoDEKgDEJsDEMgDELADEEMYAUoECEEYAFAAWABgygVoAXABeACAAQCIAQCSAQCYAQDIARHAAQHaAQYIARABGAg&sclient=gws-wiz-serp&bshm=lbsc/1#lrd=0x47f4cb7f69abf69d:0x7f24546ab0ec8a61";

  $content = file_get_contents($filename);

  $pattern = ('/<p\sclass="az2LXe-J42Xof-jRmmHf".*?\s.*?\s.*?\s.*?\s.*?<\/p>/'); //day post

  $pattern1 = ('/<p class="i3PYUe-jNm5if".*?<\/p>/'); //comment

  preg_match_all($pattern, $content, $match);
  preg_match_all($pattern1, $content, $matches);

  //Explode DayPost
  $varDayPost1 = explode("</p>", $match[0][0], 1);
  $varDayPost2 = explode("</p>", $match[0][1], 1);
  $varDayPost3 = explode("</p>", $match[0][2], 1);
  $varDayPost4 = explode("</p>", $match[0][3], 1);
  $varDayPost5 = explode("</p>", $match[0][4], 1);

  //Foreach Day Post and Comment for withdraw 'on TrustPilot'
  $bad_words = array('on TRUSTPILOT');
  foreach ($bad_words as $bad_word) {
    $newDayPost1 = str_ireplace($bad_word, '', $varDayPost1[0]);
  }
  foreach ($bad_words as $bad_word) {
    $newDayPost2 = str_ireplace($bad_word, '', $varDayPost2[0]);
  }
  foreach ($bad_words as $bad_word) {
    $newDayPost3 = str_ireplace($bad_word, '', $varDayPost3[0]);
  }
  foreach ($bad_words as $bad_word) {
    $newDayPost4 = str_ireplace($bad_word, '', $varDayPost4[0]);
  }
  foreach ($bad_words as $bad_word) {
    $newDayPost5 = str_ireplace($bad_word, '', $varDayPost5[0]);
  }

  ?>

  <section>

    <div class="container-fluid" style="display: flex; justify-content: center; align-items: center;">
      <?php
      $result_carousels = Db::getInstance()->executeS('SELECT * FROM sp_comments_google ORDER BY id_comments DESC LIMIT 0, 5');
      if (($result_carousels) and (count($result_carousels) != 0)) {
      ?>
        <div class="row featurette" style="flex: 2; min-width: 53%; max-width: 95%; padding: 40px 10px; background:#f8f9fa; color:#000; font-family: poppins, sans-serif; font-size: 18px; font-weight: bold; text-align: center; text-decoration: none !important;">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-bottom: 0; box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);">
            <ol class="carousel-indicators" style="margin-bottom: -52px;">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" style="background-color: #DADCE0; border: 1px solid #DADCE0"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1" style="background-color: #DADCE0; border: 1px solid #DADCE0"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2" style="background-color: #DADCE0; border: 1px solid #DADCE0"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3" style="background-color: #DADCE0; border: 1px solid #DADCE0"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="4" style="background-color: #DADCE0; border: 1px solid #DADCE0"></li>
            </ol>
            <div class="carousel-inner" style="height: auto;">
              <?php
              $cont_slide = 0;
              for ($i = 0; $i < count($result_carousels); $i++) {
                $active = "";
                if ($cont_slide == 0) {
                  $active = "active";
                }
                echo "<div class='carousel-item $active' style='font-weight: normal; text-align: center; margin-left: 0.8rem; margin-right: 1rem; margin-top: 1rem;'>";
                echo $result_carousels[$i]["daypost"];
                echo "<br />";
              ?>
                <br>
                <div>
                  <!--<i class="fas fa-star" style="color: #F9AB00;"></i>-->
                  <i class="fas fa-star starYellow"></i>
                  <i class="fas fa-star starYellow"></i>
                  <i class="fas fa-star starYellow"></i>
                  <i class="fas fa-star starYellow"></i>
                  <i class="fa fa-star" style="color: #DADCE0;"></i>
                </div><br>
              <?php
                echo $result_carousels[$i]["comments"];
                echo "</div>";
                $cont_slide++;
              }
              ?>
            </div>
            <!--<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>-->
          </div>
          <!--</div>-->
        </div>
      <?php } ?>
    </div>
  </section>



  <section style="margin-left: auto; margin-right: 32px; margin-top: 1.5rem; margin-bottom: 2rem;">
    <div class="row pl-2">
      <div class="col-sm-12">
        <div class="row px-1" data-aos="fade-left">
          <div class="col-sm-12 "><a href="https://www.google.com/search?q=priximbattable&sxsrf=APwXEdcu6l7-kkC3h7G3GN4Cv1pmSOvXJg%3A1683556148696&ei=NAdZZKfxKaiCkdUPvP254Ac&ved=0ahUKEwin286x9-X-AhUoQaQEHbx-DnwQ4dUDCA8&uact=5&oq=priximbattable&gs_lcp=Cgxnd3Mtd2l6LXNlcnAQAzIKCAAQRxDWBBCwAzIKCAAQRxDWBBCwAzIKCAAQRxDWBBCwAzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIMCAAQigUQsAMQChBDMgoIABCKBRCwAxBDMhsILhCKBRDHARDRAxCoAxDSAxDIAxCwAxBDGAEyGwguEIoFEMcBENEDEKgDENIDEMgDELADEEMYATIbCC4QigUQxwEQ0QMQqAMQ0gMQyAMQsAMQQxgBMh4ILhCKBRDHARDRAxDUAhCoAxDSAxDIAxCwAxBDGAEyHgguEIoFENQCEJgDEJoDEKgDEJsDEMgDELADEEMYAUoECEEYAFAAWABgygVoAXABeACAAQCIAQCSAQCYAQDIARHAAQHaAQYIARABGAg&sclient=gws-wiz-serp&bshm=lbsc/1#lrd=0x47f4cb7f69abf69d:0x7f24546ab0ec8a61,1,,,," target="_blank"><img src="/img/logoGoogle.png" style="display: block; margin-left: auto; margin-right: auto;" class="img-fluid" width="68" height="23"></a></div>
        </div>
      </div>
    </div>
  </section>
  <hr style="width: 92%; border: 1px solid #707070;margin-top: 3rem;">
  <h2 id='lesavis' style="margin-top: 2rem; margin-bottom: 6rem; display: flex; justify-content: center; text-align: center; align-items: center;"><!--<a href="#ancora" style="text-decoration: none; color: #000;">-->
    Les avis produits sur Priximbattable.net <!--</a>-->
    <div class="commentaire-positif" style="position: absolute;margin-top: 10rem;background-color: #f8f9fa;display: flex;padding: 0.5rem 0.4rem 0.1rem 0.4rem;justify-content: center;text-align: center;align-items: center;margin-right: 2rem;margin-left:2rem;">
      <h3 style="
                font-family: poppins, sans-serif;
            ">
        <?/*php echo $matches[0][0]; */ ?>&nbsp;
        <!--<img src="/img/starComments.png"/>-->
        <i class="fa fa-star starYellow"></i>
        <i class="fa fa-star starYellow"></i>
        <i class="fa fa-star starYellow"></i>
        <i class="fa fa-star starYellow"></i>
        <i class="fa fa-star halfColors"></i>&nbsp;
        <!--<i class="fa fa-star starGray" style="color: #DADCE0;"></i>-->&nbsp;

        89% commentaire positif - <?php echo $contentNotaPriximbattable; ?><br>

      </h3><br>
    </div>
  </h2>

  <h3 style="margin-top: 7rem; margin-bottom: 1rem; display: flex; justify-content: center; text-align: center; align-items: center; font-size: 14px; font-weight: normal;">Les notes sont basées sur les informations collectées lors des achats sur priximbattable.net</h3>
  <!--<p style="
                font-weight: bold;
                font-family: poppins, sans-serif;
            ">Les notes sont basées sur les informations collectées lors des achats sur priximbattable.net</p>-->
</div>

<section style="padding: 0.4rem 4.4rem .4rem 4.4rem;">
  <table id="table-productcomments" class="table productcomments">
    <thead>
      <tr class="nodrag nodrop">

        <th class="">
          <span class="title_box" style="background-color: #EBEBEB; padding-bottom: .8rem;padding-top: .8rem;padding-right: 1rem; display: flex; justify-content:center;">
            Titre du commentaire
          </span>
        </th>
        <th class="">
          <span class="title_box" style="background-color: #EBEBEB; padding-bottom: 1rem;padding-top: 1rem;padding-right: 1rem; display: flex; justify-content:center;">
            Commentaire
          </span>
        </th>
        <th class="">
          <span class="title_box" style="background-color: #EBEBEB; padding-bottom: 1rem;padding-top: 1rem;padding-right: 1rem; display: flex; justify-content:center;">
            Note
          </span>
        </th>
        <th class="">
          <span class="title_box" style="background-color: #EBEBEB; padding-bottom: 1rem;padding-top: 1rem;padding-right: 1rem;padding-left: 1rem; display: flex; justify-content:center;">
            Auteur
          </span>
        </th>
        <th class="">
          <span class="title_box" style="background-color: #EBEBEB; padding-bottom: 1rem;padding-top: 1rem;padding-right: 1rem; display: flex; justify-content:center;">
            Produit
          </span>
        </th>

      </tr>
    </thead>

    <section style="margin-top: -1rem; margin-bottom: 1rem;">
      <?php
      //1-conexão com o banco de dados
      //$limite = Db::getInstance()->executeS("SELECT `id_product`,`title`,`content`,`customer_name`,`grade`, `date_add`, `validate` FROM `sp_product_comment`where `validate` = 1 ORDER BY `date_add` DESC LIMIT $inicio,$fim");
      //  $limite = Db::getInstance()->executeS("SELECT `id_product`,`title`,`content`,`customer_name`,`grade`, `date_add`, `validate` FROM `sp_product_comment`where `validate` = 1 AND `deleted` = 0 ORDER BY `date_add` DESC LIMIT $inicio,$fim");
      $todos = Db::getInstance()->executeS("SELECT * FROM `sp_product_comment` where `validate` = 1 AND `deleted` = 0");
      //echo "<hr>";
      //echo 'Verifica o numero total de registros na base<br><br>';
      //var_dump(count($todos));


      //2-número de registros por página
      $total_reg = "5";


      //3-número de resultados armazenados no banco de dados
      $sql  = 'SELECT * FROM `sp_product_comment` WHERE validate = 1 AND deleted = 0  ORDER BY `date_add` ASC LIMIT 0, 6';


      //4-verifica o número total de páginas //defina quantos resultados você quer por página
      //$totalPagina = (COUNT($todos) /  $total_reg);
      //echo '<br><br>Numero total de páginas<br>';
      $totalPagina = ceil(count($todos) /  $total_reg);

      //5-verifica página atual //determinar em qual número de página o visitante está atualmente
      $pagina = 1;
      if (!empty($_GET['pageavis'])) {
        $p = intval($_GET['pageavis']);
        $pagina = $p;
      }


      //6-Calcula a página de qual valor será exibido //recuperar resultados selecionados do banco de dados e exibi-los na página
      $inicio = (($total_reg * $pagina) - $total_reg);
      $fim = ($total_reg * $pagina);
      $resultpage = $fim - $inicio;


      //Defini o valor máximo a ser exibida na página tanto para direita quando para esquerda
      $exibirMobile = 2;
      $exibir = 5;


      //Aqui montará o link que voltará uma pagina, Caso o valor seja zero, por padrão ficará o valor 1
      $anterior  = (($pagina - 1) == 0) ? 1 : $pagina - 1;

      //Aqui montará o link que ir para proxima pagina, Caso pagina +1 for maior ou igual ao total, ele terá o valor do total, caso contrario, ele pegar o valor da página + 1
      $posterior = (($pagina + 1) >= $totalPagina) ? $totalPagina : $pagina + 1;

      //Agora monta o Link para Primeira Página, depois O link para voltar uma página, agora monta o Link para Próxima Página, depois O link para Última Página
      ?>



      <tbody id="tbody">
        <?php

        // percorre os campos da tabela e cria a visualizacao
        // $results = Db::getInstance()->executeS($limite);
        $limite = Db::getInstance()->executeS("SELECT `id_product`,`title`,`content`,`customer_name`,`grade`, `date_add`, `validate` FROM `sp_product_comment`where `validate` = 1 AND `deleted` = 0 ORDER BY `date_add` DESC LIMIT $inicio,$resultpage");
        foreach ($limite as $results) {

          $title = $results['title'];
          $content = $results['content'];
          $customer_name = $results['customer_name'];
          $grade = $results['grade'];
          $date = $results['date_add'];
          $date = date('d/m/Y', strtotime($date));
          //$timestamp1 = mktime($date);
          // $date_mod = date('d/m/Y',$timestamp1);
          $productID = $results['id_product'];
          $validated = $results['validate'];

          $product = new Product($productID, false, 1);
          $image = Image::getCover($productID);
          $product = new Product($productID, false, Context::getContext()->language->id);
          $link = new Link; //because getImageLInk is not static function
          $imagePath = $link->getImageLink($product->link_rewrite, $image['id_image'], 'cart_default');
          $urlproduct = $link->getProductLink($product);

          //get name of product
          $titleproduct = $product->name;
        ?>
          <tr class=" odd" style="border-bottom: 1px solid #707070;">
            <td class="pointer">
              <h3 class="titleComment" style="font-size: 18px;font-weight: 600;color: #545454;opacity: 1;"><?php echo $title ?></h3><br>
              <h4 class="date" style="font-size: 14px;color: #545454;font-weight: normal;opacity: 1;margin-top: -.9rem;">Publié le <?php echo $date ?></h4>
              <!--<hr style='width: 92%; border: 1px solid #707070;'>  -->
            </td>
            <td class="pointer">
              <h4 class="content" style="font-size: 14px;color: #545454;font-weight: normal;opacity: 1;"><?php echo $content; ?></h4>
            </td>
            <td class="pointer">
              <div class="comments_note">
                <div class="star_content clearfix">
                  <?php

                  if ($grade == 5) {

                    echo '<div class="star_0 star star_on"></div>
                    <div class="star_0 star star_on"></div>
                    <div class="star_0 star star_on"></div>
                    <div class="star_0 star star_on"></div>
                    <div class="star_0 star star_on"></div>';
                  } elseif ($grade == 4) {

                    echo '<div class="star_1 star star_on"></div>
                                <div class="star_1 star star_on"></div>
                                <div class="star_1 star star_on"></div>
                                <div class="star_1 star star_on"></div>
                                <div class="star_1 star"></div>';
                  } elseif ($grade == 3) {
                    echo '<div class="star_2 star star_on"></div>
                                <div class="star_2 star star_on"></div>
                                <div class="star_2 star star_on"></div>
                                <div class="star_2 star"></div>
                                <div class="star_2 star"></div>';
                  } elseif ($grade == 2) {
                    echo '<div class="star_3 star star_on"></div>
                                <div class="star_3 star star_on"></div>
                                <div class="star_3 star"></div>
                                <div class="star_3 star"></div>
                                <div class="star_3 star"></div>';
                  } elseif ($grade == 1) {
                    echo '<div class="star_4 star star_on"></div>
                                <div class="star_4 star"></div>
                                <div class="star_4 star"></div>
                                <div class="star_4 star"></div>
                                <div class="star_4 star"></div>';
                  } elseif ($grade == 0) {
                    echo '<div class="star_5 star"></div>
                                <div class="star_5 star"></div>
                                <div class="star_5 star"></div>
                                <div class="star_5 star"></div>
                                <div class="star_5 star"></div>';
                  }

                  ?>
                </div>
              </div>

            </td>
            <td class="pointer customerComment">
              <?php echo $customer_name ?>

            </td>

            <td class="pointer images-clients">

              <div class="section-img">

                <?php echo  !empty($product->link_rewrite)  ?  "<img src='https://$imagePath'/>" : "<img src='/img/avis/serviceClient.png'/>"; ?>

              </div>

              <div class="section-titre"><a href="<?php echo $urlproduct; ?>"><?php echo $titleproduct; ?>
                </a>

              </div>

            </td>
          </tr>

        <?php
        }

        ?>
        <tr>
          <td>

            <?php function getmyImages($idLang, $idProduct, $idProductAttribute = null)

            {
              $attributeFilter = ($idProductAttribute ? ' AND ai.`id_product_attribute` = ' . $idProductAttribute : '');

              $sql = 'SELECT *
                    FROM `sp_image` i
                    LEFT JOIN `sp_image_lang` il ON (i.`id_image` = il.`id_image`)';

              if ($idProductAttribute) {
                $sql .= ' LEFT JOIN `sp_product_attribute_image` ai ON (i.`id_image` = ai.`id_image`)';
              }

              $sql .= ' WHERE i.`id_product` = ' . $idProduct . ' AND il.`id_lang` = ' . $idLang . $attributeFilter . '
                    ORDER BY i.`position` ASC';

              return Db::getInstance()->executeS($sql);
            }

            $idproduct = 12227;

            $results = getmyImages(1, $idproduct, $idProductAttribute = null);

            $array = array();


            foreach ($results as $key => $value) {

              $image = Image::getCover($idproduct);
              $product = new Product($idproduct, false, Context::getContext()->language->id);
              $link = new Link; //because getImageLInk is not static function

              $imagePath = $link->getImageLink($product->link_rewrite, $value['id_image'], 'small_default');


            ?>
              <div style="display:none">
                <div class="section-img"><img src="https://<?php echo $imagePath; ?>"></div>
              </div>

            <?php

            }

            ?>
          </td>
        </tr>
      </tbody>

  </table>
  <!--<section id="pagination" class="paginacao-page paginacao-page1" style="display: flex; justify-content: center;">
        <nav aria-label="">
        <ul class="pagination justify-content-center" style="display: flex">
                <?php /*
                    echo "<li class='anterior1' style='padding: 0 .9rem 0 .9rem; font-size: 1.125rem; font-weight: normal;'><a style='text-decoration: none; font-weight:500;' class='page-link' href=\"?pageavis=$anterior\">précédent</a> </li>";
                    if ($_GET['pageavis'] == 1) {
                        $active = "active";
                    } else {
                        $active = "";
                    }
                    echo "<li style='padding: 0 .3rem 0 .3rem; font-size: 1.125rem;'><a style='text-decoration: none; font-weight:500; background-color: #EBEBEB;' class='page-link ".$active."' href='?pageavis=1'> 1 </a></li>";
                    ?>

                    <div class="hidden-md-down">
                    <?php
                    echo $pagina > 4 ? "<a style='text-decoration: none; font-weight:500; background-color: #fff;' class='page-link'> ... </a>" : "";
                    ?>
                    </div>

                    <div class="hidden-md-up">
                    <?php
                    echo $pagina > 2 ? "<a style='text-decoration: none; font-weight:500; background-color: #fff;' class='page-link'> ... </a>" : "";
                    ?>
                    </div>

                    <div class="hidden-md-down" style="display: flex;">
                    <?php
                    for (
                    $i = ($pagina == 1 ? 2 : ($pagina == round($totalPagina, 0) ? $pagina - $exibir : ($pagina > round($totalPagina, 0) - $exibir ? round($totalPagina, 0) - $exibir : $pagina)));
                    $i < $exibir + ($pagina == 1 ? 2 : ($pagina > round($totalPagina, 0) - $exibir ? round($totalPagina, 0) - $exibir : $pagina));
                    $i++
                    ) {
                    if ($i == $_GET['pageavis']) {
                        $active = "active";
                    } else {
                        $active = "";
                    }
                    echo '<li style="padding: 0 .3rem 0 .3rem; font-size: 1.125rem;">
                        <a  style="text-decoration: none; font-weight:500; background-color: #EBEBEB;" class="page-link ' . $active . '" href="?pageavis=' . $i . '#lesavis"> ' . $i . '</a>
                            </li>';
                    }?>
                    </div>

                    <div class="hidden-md-up" style="display: flex;">
                    <?php
                    for (
                    $i = ($pagina == 1 ? 2 : ($pagina == round($totalPagina, 0) ? $pagina - $exibirMobile : ($pagina > round($totalPagina, 0) - $exibirMobile ? round($totalPagina, 0) - $exibirMobile : $pagina)));
                    $i < $exibirMobile + ($pagina == 1 ? 2 : ($pagina > round($totalPagina, 0) - $exibirMobile ? round($totalPagina, 0) - $exibirMobile : $pagina));
                    $i++
                    ) {
                    if ($i == $_GET['pageavis']) {
                        $active = "active";
                    } else {
                        $active = "";
                    }
                    echo '<li style="padding: 0 .3rem 0 .3rem; font-size: 1.125rem;">
                        <a  style="text-decoration: none; font-weight:500; background-color: #EBEBEB;" class="page-link ' . $active . '" href="?pageavis=' . $i . '#lesavis"> ' . $i . '</a>
                            </li>';
                    }?>
                    </div>

                    <div class="hidden-md-down">
                    <?php
                    echo $pagina < round($totalPagina, 0) - $exibir ? "<a class='page-link' style='text-decoration: none; font-weight:500; background-color: #fff;'> ... </a>" : "";
                    ?>
                    </div>

                    <div class="hidden-md-up">
                    <?php
                    echo $pagina < round($totalPagina, 0) - $exibirMobile ? "<a class='page-link' style='text-decoration: none; font-weight:500; background-color: #fff;'> ... </a>" : "";
                    ?>
                    </div>

                    <?php
                    if ($_GET['pageavis'] == round($totalPagina, 0)) {
                        $active = "active";
                    } else {
                        $active = "";
                    }
                    echo '<li style="padding: 0 .3rem 0 .3rem; font-size: 1.125rem;"><a style="text-decoration: none; background-color: #EBEBEB; font-weight:500;" class="page-link ' . $active . '" href="?pageavis=' . round($totalPagina, 0) . '">' . round($totalPagina, 0) . '</a></li>';
                    echo "<li class='proximo1' style='padding: 0 .9rem 0 .9rem; font-size: 1.125rem;'><a style='text-decoration: none; font-weight:500; ' class='page-link' href=\"?pageavis=$posterior\">suivant</a> </li>";

                */ ?>
            </ul>
        </nav>
        </section>-->


  <section id="pagination" class="paginacao-page paginacao-page1" style="display: flex; justify-content: center;">
    <nav aria-label="">
      <ul class="pagination justify-content-center" style="display: flex">
        <?php
        echo "<li class='anterior1' style='padding: 0 .9rem 0 .9rem; font-size: 1.125rem; font-weight: normal;'><a id='anterior' style='text-decoration: none; font-weight:500; border: none;' class='page-link'>Précédent</a> </li>";
        if ($_GET['pageavis'] == 1) {
          $active = "active";
        } else {
          $active = "";
        }
        echo "<li  style='padding: 0 .3rem 0 .3rem;'><button style='text-decoration: none; font-weight:500; background-color: #EBEBEB; font-size: 1.125rem;border: none;' class='buttonOne btn btn-outline-light page-link 'value='1'> 1 </button></li>";
        ?>

        <div class="hidden-md-down PointDesk">
          <?php
          echo $pagina > 4 ? "<a style='text-decoration: none; font-weight:500; background-color: #fff;border: none;' class='page-link'> ... </a>" : "";
          ?>
        </div>

        <div class="hidden-md-up PointMobile">
          <?php
          echo $pagina > 2 ? "<a style='text-decoration: none; font-weight:500; background-color: #fff;border: none;' class='page-link'> ... </a>" : "";
          ?>
        </div>

        <div class="hidden-md-down" style="display: flex;">
          <?php
          for (
            $i = ($pagina == 1 ? 2 : ($pagina == round($totalPagina, 0) ? $pagina - $exibir : ($pagina > round($totalPagina, 0) - $exibir ? round($totalPagina, 0) - $exibir : $pagina)));
            $i < $exibir + ($pagina == 1 ? 2 : ($pagina > round($totalPagina, 0) - $exibir ? round($totalPagina, 0) - $exibir : $pagina));
            $i++
          ) {
            if ($i == $_GET['pageavis']) {
              $active = "active";
            } else {
              $active = "";
            }
            echo '<li style="padding: 0 .3rem 0 .3rem;">
                        <button style="text-decoration: none; font-weight:500; background-color: #EBEBEB; font-size: 1.125rem; border: none;" data-totalPage=' . $totalPagina . ' class="buttonAvis btn btn-outline-light page-link " value=' . $i . ' > ' . $i . '</button>
                            </li>';
          } ?>
        </div>

        <div class="hidden-md-up" style="display: flex;">
          <?php
          for (
            $i = ($pagina == 1 ? 2 : ($pagina == round($totalPagina, 0) ? $pagina - $exibirMobile : ($pagina > round($totalPagina, 0) - $exibirMobile ? round($totalPagina, 0) - $exibirMobile : $pagina)));
            $i < $exibirMobile + ($pagina == 1 ? 2 : ($pagina > round($totalPagina, 0) - $exibirMobile ? round($totalPagina, 0) - $exibirMobile : $pagina));
            $i++
          ) {
            if ($i == $_GET['pageavis']) {
              $active = "active";
            } else {
              $active = "";
            }
            echo '<li style="padding: 0 .3rem 0 .3rem; font-size: 1.125rem;border: none;">
                        <a  style="text-decoration: none; font-weight:500; background-color: #EBEBEB;" class="page-link ' . $active . '" href="?pageavis=' . $i . '#lesavis"> ' . $i . '</a>
                            </li>';
          } ?>
        </div>

        <div class="hidden-md-down PointDesk1">
          <?php
          echo $pagina < round($totalPagina, 0) - $exibir ? "<a class='page-link' style='text-decoration: none; font-weight:500; background-color: #fff;border: none;'> ... </a>" : "";
          ?>
        </div>

        <div class="hidden-md-up PointMobile1">
          <?php
          echo $pagina < round($totalPagina, 0) - $exibirMobile ? "<a class='page-link' style='text-decoration: none; font-weight:500; background-color: #fff;border: none;'> ... </a>" : "";
          ?>
        </div>

        <?php
        if ($_GET['pageavis'] == round($totalPagina, 0)) {
          $active = "active";
        } else {
          $active = "";
        }
        echo '<li style="padding: 0 .3rem 0 .3rem;"><button style="text-decoration: none; background-color: #EBEBEB; font-weight:500; font-size: 1.125rem;border: none;" data-totalPage=' . $totalPagina . ' class="buttonLast btn btn-outline-light page-link ' . $active . '" href="?pageavis=' . round($totalPagina, 0) . '">' . round($totalPagina, 0) . '</button></li>';
        echo "<li class='proximo1' style='padding: 0 .9rem 0 .9rem; font-size: 1.125rem;border: none;'><a id='posterior' style='text-decoration: none; font-weight:500;border: none;  ' class='page-link' >Suivant</a> </li>";

        ?>
      </ul>
    </nav>

  </section>

</section>
