{extends file='page.tpl'}

{if $ctg_id eq 45}
  {$nomecomparative = 'Portail'}
  {$description = 'Comparez notre gamme variée de Portails disponibles sur notre site et découvrez quelle option est la plus favorable à votre maison.'}
{elseif $ctg_id eq 34}
  {$nomecomparative = 'Pergola Aluminium'}
  {$description = 'Comparez notre gamme variée de Pergolas Aluminium disponibles sur notre site et découvrez quelle option est la plus favorable à votre maison.'}
{elseif $ctg_id eq 35}
  {$nomecomparative = 'Pergola Bioclimatique'}
  {$description = 'Comparez notre gamme variée de Pergolas Bioclimatiques disponibles sur notre site et découvrez quelle option est la plus favorable à votre maison.'}
{elseif $ctg_id eq 21}
  {$nomecomparative = 'Grillage rigide'}
  {$description = 'Comparez notre gamme variée de Grillages Rigides disponibles sur notre site et découvrez quelle option est la plus favorable à votre maison.'}
{elseif $ctg_id eq 23}
  {$nomecomparative = 'Garde corps'}
  {$description = 'Comparez notre gamme variée de Garde-Corps disponibles sur notre site et découvrez quelle option est la plus favorable à votre maison.'}
{elseif $ctg_id eq 24}
  {$nomecomparative = 'Porte de garage Sectionnelle'}
  {$description = 'Comparez notre gamme variée de Portes de Garage Sectionnelles disponibles sur notre site et découvrez quelle option est la plus favorable à votre maison.'}
{elseif $ctg_id eq 26}
  {$nomecomparative = 'Porte de garage Enroulable'}
  {$description = 'Comparez notre gamme variée de Portes de Garage Enroulables disponibles sur notre site et découvrez quelle option est la plus favorable à votre maison.'}
{elseif $ctg_id eq 25}
  {$nomecomparative = 'Porte de garage aluminium Battant'}
  {$description = 'Comparez notre gamme variée de Portes de Garage Aluminium Battant disponibles sur notre site et découvrez quelle option est la plus favorable à votre maison.'}
{elseif $ctg_id eq 33}
  {$nomecomparative = 'Porte de service aluminium'}
  {$description = 'Comparez notre gamme variée de Portes de Service Aluminium disponibles sur notre site et découvrez quelle option est la plus favorable à votre maison.'}
{/if}

{block name='head_seo_title'}
  {l s='Comparatif' d='Shop.Theme'} - {$nomecomparative}
{/block}

{block name='head_seo_description'}
  {$description}
{/block}

{block name='page_title'}
  <span class="sitemap-title">{l s='Comparatif' d='Shop.Theme'} - {$nomecomparative}</span>
{/block}

{block name='page_content_container'}
  <section>
    <link rel="stylesheet" href="/themes/classic/assets/css/comparatif153.css" />
    {if $ctg_id eq 45}
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group" style="float: right; ">
            <label style="font-weight: bold;">Trier par : </label>
            <select style="background-color: #e8e8e8;text-align: center;border: 0px; width: 200px;" name="filtercomparative"
              onchange="SelectFilter()" id="filtercomparative">
              {html_options values=$arraySelectFilterkey output=$arraySelectFilter selected=$order}
            </select>
          </div>
        </div>
      </div>
    {/if}
    <div id="scroll2" style="overflow-x:auto;">
      <div style="height: 1px;margin: 0 1%;"></div>
    </div>
    <div id="scroll1" role="region" aria-labelledby="HeadersCol" tabindex="0" class="rowheaders body-comparatif">

      <table>
        <tbody>
          {foreach from=$Comptable key=t  item=rows}
            <tr>
              {foreach from=$rows key=k item=$row }
                {if $k eq 0}
                  {if $row eq 'BUTTON'}
                    <th scope="row">
                      <div class="row">
                        <div class="col-sm-12" style="z-index: 1;">
                          <button type="button" data-statusComparatif="noSelect" id="buttonselect" onclick="checkSelect()"
                            class="button-comparatif">Afficher Votre Selection</button>
                        </div>
                        <div class="col-sm-12">
                          <div
                            style="font-size: 9.5 px;text-align: center; font-family: 'Montserrat' , sans-serif; text-transform: capitalize;font-weight: 500;"
                            id="erro_comparer"></div>
                        </div>
                    </th>
                  {elseif $row eq 'LOGO'}
                    <th scope="row"><img class="logo-comparatif" src="/img/priximbattable-logo.png" alt="priximbattable"></th>
                  {else}
                    <th scope="row">{$row}</th>
                  {/if}
                {else}
                  {if  $row eq 'CHECK'}
                    <td class="fix_{$k} no_select"> <span class="ui-button-text"> SELECTIONNER </span><input
                        style="vertical-align: middle;" class="select_input" id="fix_{$k}" onclick="checkColunm('fix_{$k}')"
                        type="checkbox"></td>
                  {elseif $row eq '#NEEDHELP'}
                    <td class="fix_{$k} no_select"> Oui avec notre partenaire Needhelp <a
                        href="/content/17-trouver-un-installateur-avec-needhelp" target="_blank"> LIEN
                      </a> </td>
                  {elseif $row eq '#LACAGE'}
                    <td class="fix_{$k} no_select"> <a href="/content/18-produits-certifies"
                        target="_blank"> Qualimarine/Qualanod/Qualicoat </a> </td>
                  {elseif $row eq '#USINE'}
                    <td class="fix_{$k} no_select"> <a href="/content/18-produits-certifies"
                        target="_blank"> ISO 9001 </a> </td>
                  {elseif $row eq "#OUTROSRAL"}
                    <td class="fix_{$k} no_select"> PLUSIEURS RAL DISPONIBLE :<a
                        href="/content/9-palette-ral" target="_blank"> LIEN </a> </td>
                  {elseif $row eq "#COLLECTE"}
                    <td class="fix_{$k} no_select"> POSSIBLE : <a href="/content/29-collecte"
                        target="_blank"> LIEN </a> </td>
                  {elseif $t eq $posPrix}
                    {assign var=mutlstringPrix value="::"|explode:$Comptable[$t][$k]}
                    <td class="fix_{$k} no_select">
                      {if $mutlstringPrix|count eq '3'}
                        <b style="font-size: 17px;"><s style="color:rgb(136, 136, 136);font-size: 14px;">{$mutlstringPrix[0]} €</s>
                          <span style="color:var(--red); font-size: 14px;">{$mutlstringPrix[1]} €</span><b> <span
                              style="background: var(--red);color: #fff;font-weight: 600;padding: .112rem .325rem;font-size: 0.8rem;margin-left: .625rem;text-transform: uppercase;display: inline-block;">Économisez
                              {$mutlstringPrix[2]}%</span>
                          {else}
                            <b style="font-size: 17px;">{$mutlstringPrix[0]} €<b>
                              {/if}
                    </td>
                  {elseif $t eq $posLink}
                    <td class="fix_{$k} no_select">
                      <a href="/avis-client" target="_blank">
                        <button type="button" style="width: 100px;" class="button-comparatif-comm">
                          <picture>
                            <source src="/img/comparatif/cssSprite_comparatif.webp" type="image/webp" />
                            <img class="spriteComparatifCommPrix" src="/img/comparatif/cssSprite_comparatif.png" />
                          </picture>
                        </button>
                      </a>
                      <a href="https://www.google.com/search?q=priximbattable&sxsrf=APwXEdcu6l7-kkC3h7G3GN4Cv1pmSOvXJg%3A1683556148696&ei=NAdZZKfxKaiCkdUPvP254Ac&ved=0ahUKEwin286x9-X-AhUoQaQEHbx-DnwQ4dUDCA8&uact=5&oq=priximbattable&gs_lcp=Cgxnd3Mtd2l6LXNlcnAQAzIKCAAQRxDWBBCwAzIKCAAQRxDWBBCwAzIKCAAQRxDWBBCwAzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIKCAAQigUQsAMQQzIMCAAQigUQsAMQChBDMgoIABCKBRCwAxBDMhsILhCKBRDHARDRAxCoAxDSAxDIAxCwAxBDGAEyGwguEIoFEMcBENEDEKgDENIDEMgDELADEEMYATIbCC4QigUQxwEQ0QMQqAMQ0gMQyAMQsAMQQxgBMh4ILhCKBRDHARDRAxDUAhCoAxDSAxDIAxCwAxBDGAEyHgguEIoFENQCEJgDEJoDEKgDEJsDEMgDELADEEMYAUoECEEYAFAAWABgygVoAXABeACAAQCIAQCSAQCYAQDIARHAAQHaAQYIARABGAg&sclient=gws-wiz-serp&bshm=lbsc/1#lrd=0x47f4cb7f69abf69d:0x7f24546ab0ec8a61"
                        target="_blank">
                        <button type="button" style="width: 100px;" class="button-comparatif-comm">
                          <picture>
                            <source src="/img/comparatif/cssSprite_comparatif.webp" type="image/webp" />
                            <img class="spriteComparatifCommGoogle" src="/img/comparatif/cssSprite_comparatif.png" />
                          </picture>
                        </button> </a>
                      <a href="https://fr.trustpilot.com/review/priximbattable.net" target="_blank">
                        <button type="button" style="width: 100px;" class="button-comparatif-comm">
                          <picture>
                            <source src="/img/comparatif/cssSprite_comparatif.webp" type="image/webp" />
                            <img class="spriteComparatifCommTrustpilot" src="/img/comparatif/cssSprite_comparatif.png" />
                          </picture>
                        </button> </a>
                    </td>

                  {elseif $t eq $posFlag}
                    <td class="fix_{$k} no_select">
                      <picture>
                        <source src="/img/comparatif/cssSprite_comparatif.webp" type="image/webp" />
                        <img class="{$row}" src="/img/comparatif/cssSprite_comparatif.png" />
                      </picture>
                    </td>
                  {elseif $t eq $posTras}
                    <td class="fix_{$k} no_select">
                      {assign var=mutlstringTras value="::"|explode:$Comptable[$t][$k]}
                      {if $mutlstringTras|count eq '3'}
                        {if  $mutlstringTras[1] eq 'OUI'}
                          <s>{$mutlstringTras[2]} €</s> PROMO LIVRAISON OFFERTE
                        {else}
                          {$mutlstringTras[2]} €
                        {/if}
                      {/if}
                    </td>
                  {elseif $row eq 'OUI'}
                    <td class="fix_{$k} no_select">
                      <img src="/img/comparatif/check-solid.svg"
                        style="filter: invert(100%) sepia(20%) saturate(4813%) hue-rotate(26deg) brightness(92%) contrast(82%);"
                        width="20" height="15">
                    </td>
                  {elseif $row eq 'NON'}
                    <td class="fix_{$k} no_select">
                      <img src="/img/comparatif/times-solid.svg"
                        style="filter: invert(70%) sepia(33%) saturate(645%) hue-rotate(314deg) brightness(84%) contrast(83%);"
                        width="20" height="15">
                    </td>
                  {elseif $row|strstr:"CE#"}
                    <td class="fix_{$k} no_select">
                      {assign var=mutllink value="#"|explode:$row}
                      <picture>
                        <source src="/img/comparatif/cssSprite_comparatif.webp" type="image/webp" />
                        <img class="spriteComparatifCE" src="/img/comparatif/cssSprite_comparatif.png" />
                      </picture>
                      {$mutllink[1]}
                    </td>
                  {elseif $t eq $posImg}
                    <td class="fix_{$k} no_select">
                      {assign "find" array('Sur Mesure', 'Promo', 'Standard', 'PROMO')}
                      <a href="{$Comptable[$posLink][$k]}" target="_blank">
                        <picture>
                          <source src="{$row|replace:'.jpg':'.webp'}" type="image/webp" />
                          <img class="titule-image" src="{$row}" />
                        </picture>
                        <div style="margin-top: -225px;
                                                text-align: center;
                                                margin-bottom: 200px;
                                                ">
                          <span
                            style="color: #000;background-color: #fff;border-radius: 28px;font-size: 9px;padding: 3px 18px;font-weight: bold;"
                            class="">VOIR LE PRODUIT <i class="fa fa-mouse-pointer"></i></span>
                        </div>
                      </a>
                      <div style="margin-top: -25px;
                                                        text-align: center;
                                                        margin-bottom: 30px;">
                        <span class="titule-line">• {$Comptable[$t+1][$k]|replace:$find:''} •</span>
                      </div>
                    </td>
                  {else}
                    {assign var=mutlstring value="|||"|explode:$row}
                    {if $mutlstring|count eq '2'}
                      <td class="fix_{$k} no_select">
                        <div class="row">
                          <div class="col-sm-6">
                            {if  $mutlstring[0] eq 'OUI'}
                              <img src="/img/comparatif/check-solid.svg"
                                style="filter: invert(100%) sepia(20%) saturate(4813%) hue-rotate(26deg) brightness(92%) contrast(82%);"
                                width="20" height="15">
                            {elseif $mutlstring[0] eq 'NON'}
                              <img src="/img/comparatif/times-solid.svg"
                                style="filter: invert(70%) sepia(33%) saturate(645%) hue-rotate(314deg) brightness(84%) contrast(83%);"
                                width="20" height="15">
                            {elseif $mutlstring[0]|strstr:"LIEN::"}
                              {assign var=mutllink value="::"|explode:$mutlstring[0]}
                              <a href="{$mutllink[1]}" target="_blank"> LIEN </a>
                            {elseif $mutlstring[0]|strstr:"#OUTROSRAL"}
                              PLUSIEURS RAL DISPONIBLE :<a href="/content/9-palette-ral" target="_blank">
                                LIEN </a>
                            {else}
                              {$mutlstring[0]}
                            {/if}
                          </div>
                          <div class="col-sm-6">
                            {if  $mutlstring[1]  eq 'OUI'}
                              <img src="/img/comparatif/check-solid.svg"
                                style="filter: invert(100%) sepia(20%) saturate(4813%) hue-rotate(26deg) brightness(92%) contrast(82%);"
                                width="20" height="15">
                            {elseif $mutlstring[1]  eq 'NON'}
                              <img src="/img/comparatif/times-solid.svg"
                                style="filter: invert(70%) sepia(33%) saturate(645%) hue-rotate(314deg) brightness(84%) contrast(83%);"
                                width="20" height="15">
                            {elseif $mutlstring[1]|strstr:"LIEN::"}
                              {assign var=mutllink value="::"|explode:$mutlstring[1]}
                              <a href="{$mutllink[1]}" target="_blank"> LIEN </a>

                            {elseif $mutlstring[1]|strstr:"#OUTROSRAL"}
                              PLUSIEURS RAL DISPONIBLE :<a href="/content/9-palette-ral" target="_blank">
                                LIEN </a>
                            {else}
                              {$mutlstring[1]}
                            {/if}
                          </div>
                        </div>
                      </td>

                    {else}
                      {if $row|strstr:"LIENPDF#"}
                        <td class="fix_{$k} no_select">
                          {assign var=mutllink value="#"|explode:$row}
                          {assign var=mutllinkarray value=";"|explode:$mutllink[1]}
                          {assign var=countarray $mutllinkarray|count}
                          {assign var="ConstNcol" value="12"}
                          {if ($ConstNcol/$countarray)|ceil  < 4}
                            {assign var="Ncol" value="4"}
                          {else}
                            {assign var="Ncol" value=($ConstNcol/$countarray)|ceil}
                          {/if}
                          <div class="row">
                            {foreach from=$mutllinkarray item=link}
                              <div class="col-sm-{$Ncol}">
                                {assign var=linkarray value="::"|explode:$link}
                                <a href="#" class="embedAluclassPDF imagebuttonComparatif" data-pdf="{$linkarray[1]}" target="_blank">
                                  {if $linkarray[0] eq 'BATTANT STANDARD' || $linkarray[0] eq 'BATTANT SUR MESURE'}
                                    {assign var="cssSpirt" value="spriteComparatifBS"}
                                  {elseif $linkarray[0] eq 'COULISSANT 2 VANTAUX STANDARD'}
                                    {assign var="cssSpirt" value="spriteComparatifC2S"}
                                  {elseif $linkarray[0] eq 'COULISSANT SUR MESURE' || $linkarray[0] eq 'COULISSANT 1 VANTAIL STANDARD'}
                                    {assign var="cssSpirt" value="spriteComparatifC1S"}
                                  {elseif $linkarray[0] eq 'DÉCOR'}
                                    {assign var="cssSpirt" value="spriteComparatifDECOR"}
                                  {elseif $linkarray[0] eq 'ADOSSÉE'}
                                    {assign var="cssSpirt" value="spriteComparatifPDFade"}
                                  {elseif $linkarray[0] eq 'AUTOPORTÉE'}
                                    {assign var="cssSpirt" value="spriteComparatifPDFauto"}
                                  {else}
                                    {assign var="cssSpirt" value="spriteComparatifPDF"}
                                  {/if}
                                  <picture>
                                    <source src="/img/comparatif/cssSprite_comparatif.webp" type="image/webp" />
                                    <img class="{$cssSpirt}" src="/img/comparatif/cssSprite_comparatif.png" />
                                    <div style="margin-top: -15px; text-align: center;margin-bottom: -15px;">
                                      <span
                                        style="color: #a6a6a6;font-size: 9px; font-weight: bold; font-family: montserrat;">{$linkarray[0]}</span>
                                    </div>
                                  </picture>
                                </a>
                              </div>
                            {/foreach}
                          </div>
                        </td>

                      {elseif $row|strstr:"LIENVIDEO#"}
                        <td class="fix_{$k} no_select">
                          {assign var=mutllink value="#"|explode:$row}
                          {assign var=mutllinkarray value=";"|explode:$mutllink[1]}
                          {assign var=countarray $mutllinkarray|count}
                          {assign var="ConstNcol" value="12"}
                          {if ($ConstNcol/$countarray)|ceil  < 4}
                            {assign var="Ncol" value="4"}
                          {else}
                            {assign var="Ncol" value=($ConstNcol/$countarray)|ceil}
                          {/if}
                          <div class="row">
                            {foreach from=$mutllinkarray item=link}
                              <div class="col-sm-{$Ncol}">
                                {assign var=linkarray value="::"|explode:$link}
                                <a href="#" class="embedAluclass  imagebuttonComparatif" data-watch="{$linkarray[1]}" target="_blank">
                                  <picture>
                                    <source src="/img/comparatif/cssSprite_comparatif.webp" type="image/webp" />
                                    <img class="spriteComparatifVideo" src="/img/comparatif/cssSprite_comparatif.png" />
                                    <div style="margin-top: -15px; text-align: center;margin-bottom: -15px;">
                                      <span
                                        style="color: #a6a6a6;font-size: 9px; font-weight: bold; font-family: montserrat;">{$linkarray[0]}</span>
                                    </div>
                                  </picture>
                                </a>
                              </div>
                            {/foreach}
                          </div>
                        </td>
                      {else}
                        <td class="fix_{$k} no_select"> {$row}</td>
                      {/if}

                    {/if}
                  {/if}
                {/if}
              {/foreach}
            </tr>
          {/foreach}
        </tbody>
      </table>
    </div>
    <div style="display: flex;justify-content: center;" class="pt-2">
      <div class="mon_rappel  exclusive  embedcomparatif">
        <div class="mon_rappel_circle" style="background-color: #b0d998;">
          <picture>
            <source srcset="/img/iconscart/quest.webp" type="image/webp">
            <img loading="lazy" alt="quest" class="mon_icon" style="height: 35px; max-width: 100%;"
              src="/img/iconscart/quest.svg">
          </picture>
        </div>
        <div style="margin-top: 9px;   margin-left: 4px;">Une question?</div>
      </div>
    </div>
    <div class="modal fade" id="modalEmbedAluclass" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="text-align: right;">
            <button id="modalEmbedAluclass_close" class="btn btn-danger">X</button>
          </div>
          <div class="modal-body">
            <div class="embed-responsive" style="padding-bottom: 56%;">
              <iframe class="embed-responsive-item" id="codWatch" src=""
                allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
{/block}
