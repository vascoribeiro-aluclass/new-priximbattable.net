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


    <section id="newAlu_list_products">
      <div class="row">
        <div class="col-md-12 newAlu_title_section">
          <p class="newAlu_title_reduction">REDUCTION</p>
          <hr class="newAlu_divisor" />
          <p class="newAlu_subtitle">PRODUITS DISPONIBLE EN DÉSTOCKAGE<br /><strong>JUSQU'A 25% DE REDUCTION AVEC LE CODE "AFFAIRE"</strong></p>
        </div>
      </div>

      <div class="row">

        {assign var='codeDiscount' value=' '}
        {assign 'arrayProducts' [
          '758917',
          '758884',
          '275784',
          '275787',
          '275791',
          '281174',
          '282042',
          '282045',
          '285324',
          '285325',
          '285332',
          '285337',
          '285786',
          '285781',
          '595438',
          '285789',
          '330694',
          '285812'
        ]}
        {assign 'arrayProductLink' [
          'https://priximbattable.net/bonnes-affaires/758917-destockage-pergola-aluminium-classique-toiture-en-polycarbonate-16-mm-3-x-3m-gris-s109.html',
          'https://priximbattable.net/bonnes-affaires/758884-destockage-pergola-aluminium-cintree-39-x-3-m-gris-s104.html',
          'https://priximbattable.net/bonnes-affaires/275784-destockage-decornox-a-battant-standard-hauteur-1800-mm-blanc-et-gris-a-motoriser.html',
          'https://priximbattable.net/bonnes-affaires/275787-destockage-portail-miami-a-battant-standard-hauteur-1600-mm-blanc-et-gris-manuel.html',
          'https://priximbattable.net/bonnes-affaires/275791-destockage-san-diego-a-battant-standard-hauteur-1800-mm-gris-a-motoriser.html',
          'https://priximbattable.net/bonnes-affaires/281174-destockage-portail-miami-coulissant-2-vantaux-standard-hauteur-1600-mm-blanc-et-gris-manuel.html',
          'https://priximbattable.net/bonnes-affaires/282042-destockage-portail-denver-a-battant-standard-hauteur-1800-mm-blanc-et-gris-a-motoriser.html',
          'https://priximbattable.net/bonnes-affaires/282045-destockage-portail-denver-coulissant-2-vantaux-standard-hauteur-1800-mm-blanc-et-gris-a-motoriser.html',
          'https://priximbattable.net/bonnes-affaires/285324-destockage-portail-dallas-coulissant-2-vantaux-standard-hauteur-1700-mm-blanc-et-gris-manuel.html',
          'https://priximbattable.net/bonnes-affaires/285325-destockage-portail-dallas-a-battant-standard-hauteur-1700-mm-blanc-et-gris-manuel.html',
          'https://priximbattable.net/bonnes-affaires/285332-destockage-portail-memphis-a-battant-standard-hauteur-1800-mm-gris-a-motoriser.html',
          'https://priximbattable.net/bonnes-affaires/285337-destockage-portail-memphis-coulissant-2-vantaux-standard-hauteur-1800-mm-blanc-et-gris-a-motoriser.html',
          'https://priximbattable.net/bonnes-affaires/285786-destockage-portail-perso-coulissant-2-vantaux-standard-hauteur-1600-mm-gris-a-motoriser.html',
          'https://priximbattable.net/bonnes-affaires/285781-destockage-perso-a-battant-standard-hauteur-1600-mm-blanc-et-gris-a-motoriser.html',
          'https://priximbattable.net/bonnes-affaires/595438-destockage-portail-las-vegas-a-battant-standard-hauteur-1600-mm-gris-a-motoriser.html',
          'https://priximbattable.net/bonnes-affaires/285789-destockage-portail-washington-a-battant-standard-hauteur-1800-mm-gris-a-motoriser.html',
          'https://priximbattable.net/bonnes-affaires/330694-destockage-portail-san-francisco-a-battant-standard-hauteur-1800-mm-blanc-et-gris-manuel.html',
          'https://priximbattable.net/bonnes-affaires/285812-destockage-portail-san-francisco-coulissant-2-vantaux-standard-hauteur-1800-mm-blanc-et-gris-manuel.html'
        ]}
        {assign 'arrayProductImage' [
          'https://priximbattable.net/698808-large_default/destockage-pergola-aluminium-classique-toiture-en-polycarbonate-16-mm-3-x-3m-gris-s109.jpg',
          'https://priximbattable.net/698535-large_default/destockage-pergola-aluminium-cintree-39-x-3-m-gris-s104.jpg',
          'https://priximbattable.net/278510-large_default/destockage-decornox-a-battant-standard-hauteur-1800-mm-blanc-et-gris-a-motoriser.jpg',
          'https://priximbattable.net/278542-large_default/destockage-portail-miami-a-battant-standard-hauteur-1600-mm-blanc-et-gris-manuel.jpg',
          'https://priximbattable.net/278552-large_default/destockage-san-diego-a-battant-standard-hauteur-1800-mm-gris-a-motoriser.jpg',
          'https://priximbattable.net/283995-large_default/destockage-portail-miami-coulissant-2-vantaux-standard-hauteur-1600-mm-blanc-et-gris-manuel.jpg',
          'https://priximbattable.net/284870-large_default/destockage-portail-denver-a-battant-standard-hauteur-1800-mm-blanc-et-gris-a-motoriser.jpg',
          'https://priximbattable.net/284879-large_default/destockage-portail-denver-coulissant-2-vantaux-standard-hauteur-1800-mm-blanc-et-gris-a-motoriser.jpg',
          'https://priximbattable.net/288177-large_default/destockage-portail-dallas-coulissant-2-vantaux-standard-hauteur-1700-mm-blanc-et-gris-manuel.jpg',
          'https://priximbattable.net/288190-large_default/destockage-portail-dallas-a-battant-standard-hauteur-1700-mm-blanc-et-gris-manuel.jpg',
          'https://priximbattable.net/288208-large_default/destockage-portail-memphis-a-battant-standard-hauteur-1800-mm-gris-a-motoriser.jpg',
          'https://priximbattable.net/288224-large_default/destockage-portail-memphis-coulissant-2-vantaux-standard-hauteur-1800-mm-blanc-et-gris-a-motoriser.jpg',
          'https://priximbattable.net/288799-large_default/destockage-portail-perso-coulissant-2-vantaux-standard-hauteur-1600-mm-gris-a-motoriser.jpg',
          'https://priximbattable.net/288739-home_default/destockage-perso-a-battant-standard-hauteur-1600-mm-blanc-et-gris-a-motoriser.jpg',
          'https://priximbattable.net/600185-large_default/destockage-portail-las-vegas-a-battant-standard-hauteur-1600-mm-gris-a-motoriser.jpg',
          'https://priximbattable.net/288821-home_default/destockage-portail-washington-a-battant-standard-hauteur-1800-mm-gris-a-motoriser.jpg',
          'https://priximbattable.net/334121-home_default/destockage-portail-san-francisco-a-battant-standard-hauteur-1800-mm-blanc-et-gris-manuel.jpg',
          'https://priximbattable.net/288905-home_default/destockage-portail-san-francisco-coulissant-2-vantaux-standard-hauteur-1800-mm-blanc-et-gris-manuel.jpg'
        ]}
        {assign 'arrayProductCategory' [
          'Pergola',
          'Pergola',
          'Portail',
          'Portail',
          'Portail',
          'Portail',
          'Portail',
          'Portail',
          'Portail',
          'Portail',
          'Portail',
          'Portail',
          'Portail',
          'Portail',
          'Portail',
          'Portail',
          'Portail',
          'Portail'
        ]}
        {assign 'arrayProductName' [
          'Pergola Aluminium Classique 3000mm X 3000 mm toiture en polycarbonate 16 mm grise standard',
          'Pergola Aluminium cintrée Gris promo 3900mm x 3000mm',
          'Portail Decornox à battant standard hauteur 1800 mm blanc et gris à motoriser',
          'Portail Miami à battant standard hauteur 1600 mm gris manuel',
          'Portail San Diego à battant standard hauteur 1800 mm gris à motoriser',
          'Portail Miami coulissant 2 vantaux standard hauteur 1600 mm blanc et gris, manuel',
          'Portail Denver à battant standard hauteur 1800 mm blanc et gris à motoriser',
          'Portail Denver coulissant 2 vantaux standard hauteur 1800 mm blanc et gris à motoriser',
          'Portail Dallas coulissant 2 vantaux standard hauteur 1700 mm blanc et gris manuel',
          'Portail Dallas à battant standard hauteur 1700 mm blanc et gris manuel',
          'Portail Memphis à battant standard hauteur 1800 mm gris à motoriser',
          'Portail Memphis coulissant 2 vantaux standard hauteur 1800 mm blanc et gris à motoriser',
          'Portail Perso+ coulissant 2 vantaux standard hauteur 1600 mm gris manuel',
          'Portail Perso+ à battant standard hauteur 1600 mm blanc et gris à motoriser',
          'Portail Las Vegas à battant standard hauteur 1600 mm blanc et gris à motoriser',
          'Portail Washington à battant standard hauteur 1800 mm gris à motoriser',
          'Portail San Francisco à battant standard hauteur 1800 mm blanc et gris à motoriser',
          'Portail San Francisco coulissant 2 vantaux standard hauteur 1800 mm blanc et gris à motoriser'
        ]}
        {assign 'arrayProductOldPrice' [
          '1581,52',
          '1083,03',
          '2262,00',
          '2086,00',
          '2231,00',
          '2535,00',
          '2458,00',
          '2883,80',
          '2783,00',
          '2259,00',
          '2524,00',
          '3036,00',
          '2558,00',
          '2111,00',
          '1981,14',
          '3096,00',
          '2431,00',
          '2883,00'
        ]}
        {assign 'arrayProductCurrentPrice' [
          '1391,74',
          '953,06',
          '1049,00',
          '1086,00',
          '1040,00',
          '1209,00',
          '964,00',
          '1096,80',
          '1275,00',
          '1056,00',
          '1100,00',
          '1336,00',
          '1076,00',
          '969,00',
          '881,14',
          '1434,00',
          '977,00',
          '1154,00'
        ]}
        {assign 'arrayProductAffairePrice' [
          '1210',
          '838,69',
          '923,12',
          '955,68',
          '915,20',
          '1063,92',
          '848,32',
          '965,18',
          '1122,00',
          '929,28',
          '968,00',
          '1175,68',
          '946,88',
          '852,72',
          '775,40',
          '1261,92',
          '859,76',
          '1015,52'
        ]}

        {foreach from=$arrayProducts item=foo key=key}
        <div class="col-md-4 newAlu_space">
          <div class="newAlu_blockSmallHeight">
            <a href="{$arrayProductLink[$key]}">
              <div class="newAlu_blockTop">
                <div class="newAlu_discountPriceBar"></div>
                <div class="newAlu_discountPrice">
                  <p><strong class="newAlu_enStock">Avec le code AFFAIRE</strong></p>
                  {assign var='valueProductAffairePrice' value=','|explode:$arrayProductAffairePrice[$key]}
                  <p><span class="newAlu_big">{$valueProductAffairePrice[0]}</span><span class="newAlu_small">,{$valueProductAffairePrice[1]}€</span></p>
                  <p class="newAlu_code">  <strong>{$codeDiscount}</strong></p>
                </div>
                <div loading="lazy" class="newAlu_background" style="background-image: url('{$arrayProductImage[$key]}');"></div>
              </div>
              <div class="newAlu_blockBottom">
                <div class="newAlu_label">
                  <span>• {$arrayProductCategory[$key]} •</span>
                </div>
                <div class="newAlu_info">
                  <div class="row">
                    <div class="col-md-12 newAlu_fixedHeight">
                      <p class="newAlu_productName">{$arrayProductName[$key]}</p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 newAlu_prices">
                      <div class="newAlu_oldPrice">&nbsp;</div>
                      {assign var='valueProductOldPrice' value=','|explode:$arrayProductOldPrice[$key]}
                      <p class="newAlu_oldPrice"><span class="newAlu_big">{$valueProductOldPrice[0]}</span><span class="newAlu_small">,{$valueProductOldPrice[1]}€</span></p>
                      {assign var='valueProductCurrentPrice' value=','|explode:$arrayProductCurrentPrice[$key]}
                      <p class="newAlu_bold"><span class="newAlu_big">{$valueProductCurrentPrice[0]}</span><span class="newAlu_small">,{$valueProductCurrentPrice[1]}€</span></p>
                    </div>
                    {* <div class="col-xs-6 col-sm-6 col-md-6 newAlu_prices">
                      <p class="hidden-sm-down newAlu_code">Avec le code <strong>{$codeDiscount}</strong></p>
                      <p class="hidden-sm-up newAlu_code">Avec le code <br /><strong>{$codeDiscount}</strong></p>
                      <p><strong class="newAlu_enStock">EN STOCK</strong></p>
                      {assign var='valueProductAffairePrice' value=','|explode:$arrayProductAffairePrice[$key]}
                      <p><span class="newAlu_big">{$valueProductAffairePrice[0]}</span><span class="newAlu_small">,{$valueProductAffairePrice[1]}€</span></p>
                    </div> *}
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        {/foreach}

      </div>
    </section>

    <div class="clearfix"></div>

    <div class="container newAlu_buttons">
        <div class="row">
          <div class="col-md-4 newAlu_buttonsWrapper">
            <img src="/img/cms/home/home-img1.jpg" loading="lazy" alt="" class="img-fluid" />
            <div>
              <a href="/content/15-le-paiement-en-4-fois-avec-oney"  target="_blank">Paiement 4x <img src="/img/cms/home/oney_logo.png" loading="lazy" alt="" /></a>
            </div>
          </div>
          <div class="col-md-4 newAlu_buttonsWrapper">
            <img src="/img/cms/home/home-img2.jpg" loading="lazy" alt="" class="img-fluid" />
            <div>
              <a class="embedAluclass" data-watch="5QlufnX76rA">La fabrication de nos produits</a>
            </div>
          </div>
          <div class="col-md-4 newAlu_buttonsWrapper">
            <img src="/img/cms/home/home-img3.jpg" loading="lazy" alt="" class="img-fluid" />
            <div>
              <a href="/content/12-service-client"  target="_blank">Service à votre disposition</a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 newAlu_buttonsWrapper">
            <img src="/img/cms/home/home-img4.jpg" loading="lazy" alt="" class="img-fluid" />
            <div>
              <a href="https://www.youtube.com/playlist?list=PLGUOFe326PaRwWxMRNJ-w-vZq0XqCTWN5" target="_blank">Les Vidéos Client</a>
            </div>
          </div>
          <div class="col-md-4 newAlu_buttonsWrapper">
            <img src="/img/cms/home/home-img5.jpg" loading="lazy" alt="" class="img-fluid" />
            <div>
              <a href="https://www.youtube.com/channel/UCtKdDIBdxhPLHuvSmcdW_TQ/videos" target="_blank">Voir nos vidéos</a>
            </div>
          </div>
          <!--<div class="col-md-4 newAlu_buttonsWrapper">
            <img src="/img/cms/home/home-img6.jpg" loading="lazy" alt="" class="img-fluid" />
            <div>
              <a href="/content/17-trouver-un-installateur-avec-needhelp" target="_blank">Trouvez un Installateur</a>
            </div>
          </div>-->
        </div>
    </div>

    <div class="clearfix"></div>

    <div id="blocktes" class="hm_wrapper block">
      <div class="container" style="clear:both;">
        <h3><a href="https://priximbattable.net/avis-client" target="_blank">Voir tous les avis clients</a></h3>
        <div style="position:relative;top:-180px;z-index:9999;width:100%;height:25px;"></div>
      </div>

    </div>

    <div class="clearfix"></div>

    <hr class="newAlu_divisorSection" />

    <div class="clearfix"></div>

    <div id="blocktes" class="hm_wrapper block">
      <div class="container newAlu_FooterTop">

      <div class="row">
        <div class="col-md-12">
          <span class="newAlu_Title">À propos de nous:</span>
        </div>
        </div>
        <div class="row newAlu_rowContent">
          <div class="col-xs-12 col-sm-12 col-md-4">
            <img src="/img/cms/home/home-prod.png" loading="lazy" alt="" class="img-fluid" />
          </div>
          <div class="col-xs-12 col-sm-12 col-md-8">
            <h2>Notre gamme de produits<br />de menuiserie</h2>
            <p>Vous souhaitez installer un portail ou une clôture dans votre jardin ? Vous désirez remplacer vos fenêtres ou mettre en place une verrière dans votre intérieur ? Découvrez ici une large gamme de <strong>produits de haute qualité et durables.</strong> Chez priximbattable.net, nous concevons et fabriquons tout type d’<strong>aménagement</strong> pour votre maison, intérieur comme extérieur. Tous nos produits sont standards ou personnalisables, pour répondre à vos besoins et à vos envies.</p>
            
            <p>Pour habiller l’intérieur de votre maison, vous pouvez par exemple choisir une verrière, une baie coulissante, un châssis ou opter pour des fenêtres à frappe ou coulissantes, mais également acquérir une paroi de douche. Il est possible aussi de choisir parmi nos modèles de volets ou de stores.</p>

            <p>Pour l’agencement extérieur, nous fabriquons toutes sortes d’équipements, comme la porte d’entrée, la porte de garage, le portail battant ou coulissant, le portillon, le garde-corps, la clôture et le grillage. Vous pouvez également opter pour une pergola ou un abri, pour aménager votre jardin ou votre terrasse. Nous fabriquons aussi des barrières de piscine, des abris de voiture, des serres ou encore des sas d’entrée. Aménagement standard ou sur-mesure, intérieur ou extérieur, tout y est !</p>
          </div>
        </div>

        <div class="row newAlu_rowContent">
          <div class="col-md-4">
            <img src="/img/cms/home/home-fab.png" loading="lazy" alt="" class="img-fluid" />
          </div>
          <div class="col-md-8">
            <h2>Fabrication<br />aluminium</h2>
            <p><strong>Matériau robuste et durable</strong>, l’aluminium est la spécialité de priximbattable.net. Nous proposons des équipements de haute qualité, en format standard, et nous concevons et fabriquons également vos modèles sur-mesure, tant par les dimensions, que par les formes, le design, le système d’ouverture et le type de motorisation. L’aluminium a l’avantage en effet d’être solide et léger à la fois, tout en étant facile à entretenir. Il fait preuve également d’une grande résistance aux intempéries et à la rouille, ce qui lui confère une longue durée de vie. C’est donc un investissement durable et de qualité. C’est le matériau privilégié pour bénéficier du <strong>meilleur rapport/qualité.</strong></p>
            </div>
          </div>
  
          <div class="row newAlu_rowContent">
            <div class="col-md-4">
              <img src="/img/cms/home/home-gar.png" loading="lazy" alt="" class="img-fluid" />
            </div>
            <div class="col-md-8">
              <h2>Expertise<br />et garantie</h2>
              <p>Notre équipe d’<strong>experts en menuiserie et en serrurerie</strong> fabriquent des aménagements de qualité, certifiés, avec des matériaux solides et résistants. Notre service client, quant à lui, est à votre écoute pour répondre à vos demandes et étudier vos projets. De la commande à la livraison, nos experts sont disponibles pour vous orienter au mieux. Nos produits sont garantis contre tout défaut de fabrication, et peuvent être garantis jusqu’à 15 ans selon les modèles et les pièces concernées. Notre service après-vente est également présent pour vous accompagner après l’installation. N’hésitez pas à nous contacter pour en savoir plus.</p>
            </div>
          </div>
          
          <div class="col-md-12 mt-10 mb-10 text-center">
            <p>Prix Imbattable est également disponible en Espagne et au Portugal. Consultez nos sites de vente de menuiserie en Espagne et au Portugal.</p>
            <br /><br />
          </div>
  
        </div>
      </div>
  
      <hr class="newAlu_divisorSection" />
  
      {/if}
    {/block}
    {/block}
    {/block}
  </section>