 {**
* 2007-2018 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License 3.0 (AFL-3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* https://opensource.org/licenses/AFL-3.0
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
* @author PrestaShop SA <contact@prestashop.com>
  * @copyright 2007-2018 PrestaShop SA
  * @license https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
  * International Registered Trademark & Property of PrestaShop SA
  *}
  {extends file='page.tpl'}

  {block name='page_content_container'}
  {if {$page.page_name} == 'index'}

  {/if}

  <section id="content" class="page-home">
    {block name='page_content_top'}{/block}
      {block name='page_content'}
        {block name='hook_home'}
          {$HOOK_HOME nofilter}
          {if {$page.page_name} == 'index'}

            {include file="_partials/body-index.tpl"}

            {* <div class="container">
              <div class="row recuosLaterais mt-3 mb-3">
                <div class="col-12">
                  <a href="https://dev.priximbattable.net/101-bonnes-affaires">
                    <picture class="hidden-md-down">
                      <source srcset="/img/soldes/bonnes-affaires-desktop.webp" type="image/webp">
                      <img src="/img/soldes/bonnes-affaires-desktop.jpg" class="img-fluid" alt="Nos bonnes affaires" title="Nos bonnes affaires" width="1450" height="415">
                    </picture>
                    <picture class="hidden-md-up">
                      <source srcset="/img/soldes/bonnes-affaires-mobile.webp" type="image/webp">
                      <img src="/img/soldes/bonnes-affaires-mobile.jpg" class="img-fluid" alt="Nos bonnes affaires" title="Nos bonnes affaires">
                    </picture>
                  </a>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="container">
              <div class="row newAlu_blockSinspirer">
                <div class="col-12 text-center">
                  <picture>
                    <source srcset="/img/cms/home/Sinspirer.webp" type="image/webp">
                    <img src="/img/cms/home/Sinspirer.png" loading="lazy" alt="S'inspirer" class="img-fluid" />
                  </picture>
                </div>
                <div class="col-md-4 sinspirer">
                  <a href="/verriere-destructure/121343-ensemble-1-module-verrieres-acier-destructure.html">
                    <div class="Sinspirer_01"></div>
                  </a>
                  <span>Partage de vie</span>
                </div>
                <div class="col-md-4 sinspirer">
                  <a href="/98-porte-verriere-type-atelier">
                    <div class="Sinspirer_02"></div>
                  </a>
                  <span>Espace cocooning</span>
                </div>
                <div class="col-md-4 sinspirer">
                  <a href="/100-paroi-de-douche-verriere-type-atelier-loft">
                    <div class="Sinspirer_03"></div>
                  </a>
                  <span>Source de détente</span>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <hr class="newAlu_divisorSection" />

            <div class="clearfix"></div>

            <div class="container">
              <div class="row newAlu_blockSecurisez">
                <div class="col-12 text-center">
                  <picture>
                    <source srcset="/img/cms/home/Securisez.webp" type="image/webp">
                    <img src="/img/cms/home/Securisez.png" loading="lazy" alt="Securisez" class="img-fluid" width="545"
                      height="333" />
                  </picture>
                </div>
                <div class="col-md-4 securisez">
                  <a href="/37-pergolanda">
                    <div class="Securisez_01"></div>
                  </a>
                  <span>Votre point de vue</span>
                </div>
                <div class="col-md-4 securisez">
                  <a href="/106-barriere-de-piscine">
                    <div class="Securisez_02"></div>
                  </a>
                  <span>Un moment rafraichissant</span>
                </div>
                <div class="col-md-4 securisez">
                  <a href="/6-cloture">
                    <div class="Securisez_03"></div>
                  </a>
                  <span>Espace clos</span>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="container hidden-md-down">
              <div class="newAlu_blockMosaicOneContainer">
                <div class="mosaic Mosaic_01">
                  <a href="/8-porte-de-garage">
                    <picture class="hidden-md-down">
                      <source srcset="/img/cms/home/MosaicOne_01.webp" type="image/webp">
                      <img src="/img/cms/home/MosaicOne_01.png" alt="" loading="lazy" class="img-fluid">
                    </picture>
                    <picture class="hidden-md-up">
                      <source srcset="/img/cms/home/MosaicOne1.webp" type="image/webp">
                      <img src="/img/cms/home/MosaicOne1.png" alt="" loading="lazy" class="img-fluid">
                    </picture>
                  </a>
                </div>
                <div class="mosaic Mosaic_02">
                  <a href="/50-portail">
                    <picture class="hidden-md-down">
                      <source srcset="/img/cms/home/MosaicOne_02.webp" type="image/webp">
                      <img src="/img/cms/home/MosaicOne_02.png" alt="" loading="lazy" class="img-fluid">
                    </picture>
                    <picture class="hidden-md-up">
                      <source srcset="/img/cms/home/MosaicOne2.webp" type="image/webp">
                      <img src="/img/cms/home/MosaicOne2.png" alt="" loading="lazy" class="img-fluid">
                    </picture>
                  </a>
                </div>
                <div class="mosaic Mosaic_03">
                  <a href="/50-portail">
                    <picture class="hidden-md-down">
                      <source srcset="/img/cms/home/MosaicOne_03.webp" type="image/webp">
                      <img src="/img/cms/home/MosaicOne_03.png" alt="" loading="lazy" class="img-fluid">
                    </picture>
                    <picture class="hidden-md-up">
                      <source srcset="/img/cms/home/MosaicOne3.webp" type="image/webp">
                      <img src="/img/cms/home/MosaicOne3.png" alt="" loading="lazy" class="img-fluid">
                    </picture>
                  </a>
                </div>
                <div class="mosaic Mosaic_04">
                  <a href="/50-portail">
                    <picture class="hidden-md-down">
                      <source srcset="/img/cms/home/MosaicOne_04.webp" type="image/webp">
                      <img src="/img/cms/home/MosaicOne_04.png" alt="" loading="lazy" class="img-fluid">
                    </picture>
                    <picture class="hidden-md-up">
                      <source srcset="/img/cms/home/MosaicOne4.webp" type="image/webp">
                      <img src="/img/cms/home/MosaicOne4.png" alt="" loading="lazy" class="img-fluid">
                    </picture>
                  </a>
                </div>
                <div class="mosaic Mosaic_05">
                  <a href="/22-gabion">
                    <picture class="hidden-md-down">
                      <source srcset="/img/cms/home/MosaicOne_05.webp" type="image/webp">
                      <img src="/img/cms/home/MosaicOne_05.png" alt="" loading="lazy" class="img-fluid">
                    </picture>
                    <picture class="hidden-md-up">
                      <source srcset="/img/cms/home/MosaicOne5.webp" type="image/webp">
                      <img src="/img/cms/home/MosaicOne5.png" alt="" loading="lazy" class="img-fluid">
                    </picture>
                  </a>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="container">
              <div class="row newAlu_blockRayonnez">
                <div class="col-12 text-center">
                  <picture>
                    <source srcset="/img/cms/home/Rayonnez.webp" type="image/webp">
                    <img src="/img/cms/home/Rayonnez.png" loading="lazy" alt="Rayonnez" class="img-fluid" width="662"
                      height="333" />
                  </picture>
                </div>
                <div class="col-md-4 rayonnez">
                  <a href="/35-pergola-bioclimatique">
                    <div class="Rayonnez_01"></div>
                  </a>
                  <span>Un instant de partage</span>
                </div>
                <div class="col-md-4 rayonnez">
                  <a href="/93-pergola-toile">
                    <div class="Rayonnez_02"></div>
                  </a>
                  <span>Une douceur de vivre</span>
                </div>
                <div class="col-md-4 rayonnez">
                  <a href="/34-pergola-aluminium">
                    <div class="Rayonnez_03"></div>
                  </a>
                  <span>Confort extérieur</span>
                </div>
              </div>
            </div>


            <div class="container">
              <div class="row newAlu_blockSecurisez">
                <div class="col-12 text-center">
                  <picture>
                    <source srcset="/img/cms/home/Securisez.webp" type="image/webp">
                    <img src="/img/cms/home/Securisez.png" loading="lazy" alt="Securisez" class="img-fluid" width="545" height="333" />
                  </picture>
                </div>
                <div class="col-md-4 securisez">
                  <a href="/37-pergolanda">
                    <div class="Securisez_01"></div>
                  </a>
                  <span>Votre point de vue</span>
                </div>
                <div class="col-md-4 securisez">
                  <a href="/106-barriere-de-piscine">
                    <div class="Securisez_02"></div>
                  </a>
                  <span>Un moment rafraichissant</span>
                </div>
                <div class="col-md-4 securisez">
                  <a href="/6-cloture">
                    <div class="Securisez_03"></div>
                  </a>
                  <span>Espace clos</span>
                </div>
              </div>
            </div>


            <div class="container">
              <div class="row newAlu_blockOptimisez">
                <div class="col-12 text-center">
                  <picture>
                    <source srcset="/img/cms/home/Optimisez.webp" type="image/webp">
                    <img src="/img/cms/home/Optimisez.png" loading="lazy" alt="Optimisez" class="img-fluid" width="628"
                      height="333" />
                  </picture>
                </div>
                <div class="col-md-4 optimisez">
                  <a href="/84-abris-de-jardin">
                    <div class="Optimisez_01"></div>
                  </a>
                  <span>Abris de jardin</span>
                </div>
                <div class="col-md-4 optimisez">
                  <a href="/83-abris-de-voiture">
                    <div class="Optimisez_02"></div>
                  </a>
                  <span>Carport</span>
                </div>
                <div class="col-md-4 optimisez">
                  <a href="/abris-de-jardin/640009-pool-house-azalee.html">
                    <div class="Optimisez_03"></div>
                  </a>
                  <span>Pool House</span>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="container">
              <div class="hidden-md-down">
                <div class="newAlu_blockMosaicTwoContainer">
                  <div class="mosaic Mosaic_01">
                    <a href="/45-chassis-fixe-aluminium-sur-mesure">
                      <picture class="hidden-md-down">
                        <source srcset="/img/cms/home/MosaicTwo_01.webp" type="image/webp">
                        <img src="/img/cms/home/MosaicTwo_01.png" alt="" loading="lazy" class="img-fluid">
                      </picture>
                      <picture class="hidden-md-up">
                        <source srcset="/img/cms/home/MosaicTwo1.webp" type="image/webp">
                        <img src="/img/cms/home/MosaicTwo1.png" alt="" loading="lazy" class="img-fluid">
                      </picture>
                    </a>
                  </div>
                  <div class="mosaic Mosaic_02">
                    <a href="/11-porte-d-entree">
                      <picture class="hidden-md-down">
                        <source srcset="/img/cms/home/MosaicTwo_02.webp" type="image/webp">
                        <img src="/img/cms/home/MosaicTwo_02.jpg" alt="" loading="lazy" class="img-fluid">
                      </picture>
                      <picture class="hidden-md-up">
                        <source srcset="/img/cms/home/MosaicTwo2.webp" type="image/webp">
                        <img src="/img/cms/home/MosaicTwo2.png" alt="" loading="lazy" class="img-fluid">
                      </picture>
                    </a>
                  </div>
                  <div class="mosaic Mosaic_03">
                    <a href="/29-volet-battant-aluminium-bso-brise-soleil-orientable">
                      <picture class="hidden-md-down">
                        <source srcset="/img/cms/home/MosaicTwo_03.webp" type="image/webp">
                        <img src="/img/cms/home/MosaicTwo_03.png" alt="" loading="lazy" class="img-fluid">
                      </picture>
                      <picture class="hidden-md-up">
                        <source srcset="/img/cms/home/MosaicTwo3.webp" type="image/webp">
                        <img src="/img/cms/home/MosaicTwo3.png" alt="" loading="lazy" class="img-fluid">
                      </picture>
                    </a>
                  </div>
                  <div class="mosaic Mosaic_04">
                    <a href="/27-volet-roulant-aluminium">
                      <picture class="hidden-md-down">
                        <source srcset="/img/cms/home/MosaicTwo_04.webp" type="image/webp">
                        <img src="/img/cms/home/MosaicTwo_04.png" alt="" loading="lazy" class="img-fluid">
                      </picture>
                      <picture class="hidden-md-up">
                        <source srcset="/img/cms/home/MosaicTwo4.webp" type="image/webp">
                        <img src="/img/cms/home/MosaicTwo4.png" alt="" loading="lazy" class="img-fluid">
                      </picture>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="clearfix"></div>

            <div id="blocktes" class="hm_wrapper block">
              <div class="container newAlu_FooterTop">

                <div class="row">
                  <div class="col-md-12">
                    <span class="newAlu_Title">À propos de nous :</span>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 text-center newAlu_AboutUsTitleTop">
                    <p class="firstTitleTop">Prix Imbattable</p>
                    <p class="secondTitleTop">l’expert des menuiseries en aluminium de qualité premium</p>
                  </div>
                  <div class="col-md-12 text-justify">
                    <p>Retrouvez sur Prix Imbattable une large sélection d’articles de menuiseries solides et esthétiques pour
                      votre intérieur et extérieur (terrasse, piscine, jardin, balcon). Nous proposons de nombreux modèles de
                      verrières en alu et en acier, fenêtres design, baies coulissantes ou encore portes de garage et abris. Les
                      différents labels et certifications de nos menuiseries garantissent leur qualité ainsi que leurs
                      performances. Tout au long de votre projet, notre équipe est mobilisée pour vous accompagner et conseiller à
                      chaque étape : du choix des dimensions et matériaux à l’installation chez vous, en passant par la
                      configuration de votre produit sur le site en ligne Prix Imbattable.</p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 newAlu_AboutUsTitle">
                    <p>Une large gamme de produits de menuiseries pour votre maison, appartement et jardin</p>
                  </div>
                  <div class="col-md-12 text-justify">
                    <p>Vous souhaitez installer un portail ou une clôture dans votre jardin ? Vous désirez remplacer vos fenêtres
                      par une baie coulissante, ou mettre en place une verrière dans votre cuisine ? Découvrez ici une large gamme
                      de produits de haute qualité et durables. Chez Prix Imbattable, nous concevons et fabriquons de nombreux
                      types d’aménagement et des menuiseries pour votre maison et appartement, adaptés à la fois pour l’intérieur
                      comme l’extérieur. Couleurs, formes, dimensions, design…, tous nos produits sont standards ou
                      personnalisables, afin de répondre à vos besoins et à vos envies ! Et bien sûr votre déco !</p>
                  </div>
                  <div class="col-md-5">
                    <picture>
                      <source srcset="/img/cms/home/img1.webp" type="image/webp">
                      <img src="/img/cms/home/img1.jpg" alt="" loading="lazy" class="img-fluid">
                    </picture>
                  </div>
                  <div class="col-md-7 text-justify">
                    <p><strong class="newAlu_footerSubtitle">Verrière industrielle, volet, fenêtre et porte d’entrée en alu pour
                        assurer votre confort</strong></p>
                    <p>Pour décorer l’intérieur de votre maison ou structurer une large pièce de vie, nous vous proposons une
                      large gamme de verrières industrielles en alu, de type atelier. Afin de garantir votre sécurité et votre
                      confort, nous fabriquons également des baies coulissantes, des fenêtres à frappe ou coulissantes, ainsi que
                      des portes d’entrée en aluminium, déclinées en différentes formes et avec un design pratique et fonctionnel.
                    </p>
                    <p>Offrez-vous une pièce supplémentaire grâce à nos pergolandas en aluminium. Disponible en différentes
                      tailles et finitions, nos pergolandas sont équipées avec des portes coulissantes en alu sans rupture de pont
                      thermique.</p>
                    <p><strong class="newAlu_footerSubtitle">Portail, clôture, abri, pergola : tout ce qu’il faut pour votre
                        extérieur</strong></p>
                    <p>Vous cherchez une solution de rangement extérieure pour vos outils de jardin, ou à sécuriser votre piscine
                      ?</p>
                    <p>Pour votre extérieur, terrasse, balcon ou jardin, nous fabriquons différents types d’équipements standards
                      et sur-mesure : clôture de piscine homologuée, porte de garage, store, portail battant ou coulissant
                      motorisé, portillon, garde-corps, clôture ou encore grillage... Grâce aux produits Prix Imbattable,
                      aménagez, sécurisez ou décorez votre extérieur selon vos envies et vos besoins.</p>
                    <p>Agrandissez votre espace intérieur pour recevoir des amis, ranger vos outils ou votre voiture grâce à nos
                      pergolas et nos abris de jardin. Les amateurs de jardinage trouveront parmi les menuiseries en alu Prix
                      Imbattable une sélection de serres parfaitement conçues pour accueillir leurs plantes et fleurs.</p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 newAlu_AboutUsTitle mt-2">
                    <p>Des aménagements et menuiseries solides et résistants en aluminium</p>
                  </div>
                  <div class="col-md-12 text-justify">
                    <p>Matériau robuste et durable, l’aluminium est la spécialité de Prix Imbattable. Nous fabriquons et proposons
                      des équipements de haute qualité (porte d’entrée, portail, fenêtre, verrière, pergola, abris de jardin...),
                      disponibles dans de multiples formats standards et personnalisés.</p>
                  </div>
                  <div class="col-md-5">
                    <picture>
                      <source srcset="/img/cms/home/img2.webp" type="image/webp">
                      <img src="/img/cms/home/img2.jpg" alt="" loading="lazy" class="img-fluid">
                    </picture>
                  </div>
                  <div class="col-md-7 text-justify">
                    <p><strong class="newAlu_footerSubtitle">Durabilité et résistance de l’aluminium Prix Imbattable</strong></p>
                    <p>Esthétique et moderne, l’aluminium est un matériau réputé pour ses nombreuses qualités comme sa résistance,
                      longévité et durabilité. Insensible aux variations climatiques, l’aluminium isole du froid et des
                      intempéries afin de conserver votre confort à l’intérieur. Il possède d’excellentes performances isolantes,
                      tant d’un point de vue thermique qu’acoustique. Contrairement au PVC qui se déforme dans le temps,
                      l’aluminium est adapté aux grandes ouvertures, fenêtres, baies coulissantes ou encore verrière. Facile à
                      entretenir, l’aluminium ne rouille pas, il offre une excellente résistance à l’humidité et aux rayons UV.
                    </p>
                    <p>Sur Prix Imbattable, nous vous proposons des portes d’entrée en alu. En effet, à la différence des portes
                      d’entrée en PVC, en bois ou en fer forgé, elles ne s’abîment pas avec le temps et ne nécessitent pas
                      d’entretien particulier. En effet, vous n’avez pas besoin de refaire la peinture ou d’antirouille à
                      appliquer chaque année. En bref : un excellent investissement dans le temps et un très bon rapport
                      qualité/prix !</p>
                    <p><strong class="newAlu_footerSubtitle">Des articles intérieurs et extérieurs à personnaliser selon vos
                        envies</strong></p>
                    <p>Afin que nos produits s’adaptent à votre maison, votre jardin ou la configuration de votre appartement,
                      nous fabriquons également des menuiseries en aluminium sur-mesure. Grâce à notre configurateur en ligne,
                      personnalisez tous nos modèles.</p>
                  </div>
                  <div class="col-md-12 text-justify newAlu_moreSpace">
                    <p>Choisissez les dimensions, les formes, la couleur, le design, le système d’ouverture ainsi que le type de
                      motorisation pour nos portails, volets roulants ou encore portes de garage. Si vous avez des questions,
                      notre équipe est disponible pour vous accompagner à toutes les étapes de la création de votre projet, du
                      choix du modèle le plus adapté jusqu’à son installation.</p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 newAlu_AboutUsTitle mt-2">
                    <p>Expertise et garantie : promesse d’un service de qualité à prix imbattable</p>
                  </div>
                  <div class="col-md-12 text-justify">
                    <p>Notre équipe d’experts et d’artisans en menuiserie et en serrurerie fabriquent des aménagements de qualité,
                      certifiés, avec des matériaux solides et résistants. Notre service client, quant à lui, est à votre écoute
                      pour répondre à vos demandes et étudier vos projets.</p>
                  </div>
                  <div class="col-md-5">
                    <picture>
                      <source srcset="/img/cms/home/img3.webp" type="image/webp">
                      <img src="/img/cms/home/img3.jpg" alt="" loading="lazy" class="img-fluid">
                    </picture>
                  </div>
                  <div class="col-md-7 text-justify">
                    <p><strong class="newAlu_footerSubtitle">Des articles de menuiserie certifiés et homologués</strong></p>
                    <p>Toutes les menuiseries en alu et vitrages utilisés pour les fenêtres Prix Imbattables possèdent les
                      certifications Cekal et Acotherm qui garantissent leurs performances en matière d’isolation thermique. Nos
                      menuiseries en aluminium sont également toutes équipées d'un système de rupture de pont thermique. D’autres
                      menuiseries, telles que nos portes d’entrée, possèdent des certifications (RT 2012, ISO 9001,PEFC) et labels
                      comme Qualicoat, Qualimarine, Qualanod…</p>
                    <p>Votre sécurité est notre priorité. Aussi, toutes les barrières de protection de piscine Prix Imbattables
                      sont homologuées NF P90-306 comme l’exige la loi. Il en va de même pour nos barrières et garde-corps qui
                      respectent les normes NF P 01-012 et NF P 01-013.</p>
                    <p>Enfin, nos produits et menuiseries en alu sont garantis contre tout défaut de fabrication, et peuvent être
                      garantis jusqu’à 20 ans selon les modèles et les pièces concernées.</p>
                    <p><strong class="newAlu_footerSubtitle">Une équipe de professionnels disponible et à votre écoute</strong>
                    </p>
                    <p>De la commande à la livraison, nos experts sont disponibles pour vous orienter au mieux. Notre service
                      après-vente est également présent pour vous accompagner après l’installation. À chaque étape de votre
                      projet, nos experts sont là pour vous guider et conseiller.</p>
                    <p>Prix Imbattable est également disponible en Espagne et au Portugal. Consultez nos sites de vente de
                      menuiserie en Espagne et au Portugal.</p>
                  </div>
                  <div class="col-md-12 text-justify newAlu_moreSpace">
                    <p>Vous avez un projet de verrière ou besoin de conseil pour votre futur achat ? N’hésitez pas à nous
                      contacter pour en savoir plus !</p>
                  </div>
                </div>


              </div>
            </div>

            <hr class="newAlu_divisorSection" /> *}

          {/if}
        {/block}
      {/block}
    {/block}
  </section>
