{extends file='page.tpl'}

{assign var='checaDescontosCatalogo' value=Product::checaDescontosCatalogo()}

{block name='page_content_container'}

  <div class="modal fade in" id="modalEmbedlinkproduct" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="border-radius: 25px;">
        <div class="modal-header"
          style=" background: #45BEBE; display: inline;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-align: start;-ms-flex-align: start;align-items: flex-start;-webkit-box-pack: justify;-ms-flex-pack: justify;justify-content: space-between;padding: 1rem;border-bottom: 1px solid #e9ecef;border-top-left-radius: 1rem;border-top-right-radius: 1rem;">
          <div class="h1" style="color: white;">Partager le Product</div>
          <button  onclick="CloseLinkProductModal()" type="button"
            style="cursor: pointer;float: right;font-size: 1.5rem;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;opacity: .5;padding: 1rem;margin: -1rem -1rem -1rem auto;background-color: transparent;border: 0;-webkit-appearance: none;">X</button>
        </div>

        <div class="modal-body">
          <div id="customer-information-pdf">
            <form>
              <div class="row">
                <div class="col-md-5">
                  <picture>
                    <source src="/img/cms/popup-share-basket.webp" type="image/webp">
                    <img src="/img/cms/popup-share-basket.jpg" class="img-fluid" alt="Partager le Product" />
                  </picture>
                </div>
                <div class="bodypartagerproductmessage">

                </div>
                <div class="bodypartagerproduct">
                  <div class="col-md-6">
                    <section class="form-fields">
                      <div class="form-group row" style="display:none;">
                        <label class="col-md-3">Partager le Product</label>
                        <div class="col-md-9">
                          <input name="first_name" type="text">
                        </div>
                      </div>
                      <div class="form-group row messegelinkproduct">
                        <span id="warning_messagelinkproduct" class="col-md-12 form-control-label pl-2"></span>
                      </div>
                      <div class="form-group row sendlinkcart">
                        <label class="col-md-3 form-control-label">Nom</label>
                        <div class="col-md-9">
                          <input class="form-control" name="name_linkproduct" id="name_linkproduct" type="text"
                            required="required">
                          <span class="mon_modal_warnning" id="warning_name_linkcproduct"></span>
                        </div>
                      </div>
                      <div class="form-group row sendlinkcart">
                        <label class="col-md-3 form-control-label">Email</label>
                        <div class="col-md-9">
                          <input class="form-control" name="mail_linkproduct" id="mail_linkproduct" type="text"
                            required="required">
                          <span class="mon_modal_warnning" id="warning_mail_linkproduct"></span>
                        </div>
                      </div>
                      <input class="form-control" name="linkproduct" id="linkproduct" type="hidden">
                      <input class="form-control" name="nomproduct" id="nomproduct" type="hidden">
                    </section>
                    <footer class="form-footer clearfix" style="text-align: end;">
                      <button class="btn btn-primary pull-xs-right sendlinkcart" onclick="SendShareProductLink()" style="background: #45BEBE;"
                        type="button" >
                        <i class="material-icons ">share</i> Partager
                      </button>
                    </footer>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="pt-2 pb-2">
    <div class="row">
      <div class="col-lg-6 p-0">
        <a href="/content/32-fabricant" target="_blank">
          <picture class="hidden-md-down">
            <source srcset="/img/cms/home/desktopfabricant2.webp" type="image/webp">
            <img class="img-fluid" loading="lazy" src="/img/cms/home/desktopfabricant2.jpg" alt="Notre processus de fabrication" title="Notre processus de fabrication" width="1500" height="430">
          </picture>
          <picture class="hidden-lg-up">
            <source srcset="/img/cms/home/mobilefabricant2.webp" type="image/webp">
            <img class="img-fluid img-media-100" loading="lazy" src="/img/cms/home/mobilefabricant2.jpg" alt="Notre processus de fabrication" title="Notre processus de fabrication" width="800" height="520">
          </picture>
        </a>
      </div>
      <div class="col-lg-6 p-0">
        <picture class="hidden-md-down">
          <source srcset="/img/cms/Avis/avis-desktop.webp" type="image/webp">
          <img loading="lazy" src="/img/cms/Avis/avis-desktop.jpg" class="img-fluid" alt="Avis" title="Avis" width="1500" height="430">
        </picture>
        <a  class=" hidden-lg-up" href="https://priximbattable.net/avis-client">
          <picture>
            <source srcset="/img/cms/Avis/avis_mobile.webp" type="image/webp">
            <img loading="lazy" class="img-fluid img-centre img-media-100" src="/img/cms/Avis/avis_mobile.jpg" alt="Avis" title="Avis" width="800" height="520">
          </picture>
        </a>
        <div class="logos-avis avis-h">
          <a href="https://priximbattable.net/avis-client" target="_blank">
            <div class="border-avis">
              <picture>
                <source srcset="/img/cms/Avis/logo-google.webp" type="image/webp">
                <img class="img-fluid avis-img-w" loading="lazy" src="/img/cms/Avis/logo-google.png" alt="Google"
                  title="Google" width="386" height="129">
              </picture>
              <span><b>{$notaGoogle}</b></span>
            </div>
            <div class="border-avis">
              <picture>
                <source srcset="/img/cms/Avis/logo-pages-jaunes.webp" type="image/webp">
                <img class="img-fluid avis-img-w" loading="lazy" src="/img/cms/Avis/logo-pages-jaunes.png"
                  alt="Pages Jaunes" title="Pages Jaunes" width="386" height="129">
              </picture>
              <span><b>{$notaPagesJaunes}</b></span>
            </div>
            <div class="border-avis">
              <picture>
                <source srcset="/img/cms/Avis/logo-priximbattable.webp" type="image/webp">
                <img class="img-fluid avis-img-w" loading="lazy" src="/img/cms/Avis/logo-priximbattable.png"
                  alt="Prix Imbattable" title="Prix Imbattable" width="386" height="129">
              </picture>
              <span><b>{$notaPriximbattable}</b></span>
            </div>
            <div class="border-avis">
              <picture>
                <source srcset="/img/cms/Avis/logo-trustpilot.webp" type="image/webp">
                <img class="img-fluid avis-img-w" loading="lazy" src="/img/cms/Avis/logo-trustpilot.png" alt="Trustpilot"
                  title="Trustpilot" width="386" height="129">
              </picture>
              <span><b>{$notaTrustpilot}</b></span>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
  <section class="pt-2 pb-2">
    <div class="mon_btn  exclusive  embedRappel ">
      <div class="mon_circle mon_rappel_circle_com">
        <picture>
          <source srcset="/img/iconscart/quest.webp" type="image/webp">
          <img loading="lazy" alt="quest" class="mon_icon" src="/img/iconscart/quest.svg">
        </picture>
      </div>
      <div class="mon_text"> {l s='Une Question?' d='Shop.Theme.Wishlist'} </div>
    </div>
  </section>
  <h2 class="mt-1 h1">
    <span>{l s='Liste de Souhaits' d='Shop.Theme.Wishlist'} </span>
  </h2>
  <section style="margin: 10px;">

    <div class="products row  pt-1  hp-center">
      {if $countlist > 0}
        {foreach from=$wishlistarray item="product"}
          {assign var='infoProduto' value=Product::infoProdutoCatalogo({$product.id_product},
          {$product.price_tax_incl},{$product.price_tax_excl},{$product.price_tax_excl},false)}

          {assign var='precoAtualizadoSEO' value=Product::precoAtualizadoSEO({$infoProduto['preco_final_sem_desc_seo']},
          {$checaDescontosCatalogo['reduction_value']})}

          <article id="productwishlist{$product.id_product}" class="product-miniature js-product-miniature"
            data-id-product="{$product.id_product}">


            <div class="thumbnail-container " style="margin: 5px; height: 600px;">
              <div onclick="removeProductWishList({$product.id_product})"
                class="hp-btn btn btn-primary btn-sm hp-button-remove">X</div>
              <a href="{$product.url}" class="thumbnail product-thumbnail">
                <img loading="lazy" src="{$product.urlimage}" alt="{$product.name}">
              </a>
              <div class="product-description pt-2">
                <h3 class="limit-char-line-title h3 product-title hp-product-title" itemprop="name"><a
                    href="{$product.url}">{$product.name}</a>
                </h3>

                <div class="pb-1 pt-1 product-price-and-shipping hp-product-price-and-shipping">
                  {if $product.has_discount}
                    <span class="sr-only" style="display: none;">{l s='Regular price' d='Shop.Theme.Wishlist'}</span>
                    <span class="regular-price" style="display: none;">{$infoProduto['preco_corrigido']}</span>
                  {/if}

                  {if {$checaDescontosCatalogo['reduction']} >= 1}
                    <span>
                      <span class="price price_risk_aluclass">{$infoProduto['preco_final_sem_desc']}</span>
                      <span class="discount_list_products_aluclass">- {$checaDescontosCatalogo['reduction']}</span>
                      <span itemprop="price"
                        class="price_final_aluclass">{$precoAtualizadoSEO['preco_com_desconto_catalogo_view']}</span>
                    </span>
                  {else}
                    <span itemprop="price" class="price_final_no_discount_aluclass">{$product.price}</span>
                  {/if}
                  <div class="pt-1 pb-1">
                    {if {$product.price|intval} < 6001}
                      {assign var="multony" value=4}
                    {else}
                      {assign var="multony" value=48}
                        {/if} {if $multony == 4} {$imgcredit = 'alma4x'}
                      {$linkcredit = '/content/32-payez-vos-achats-en-3-ou-4-fois-avec-alma'} {else} {$imgcredit = 'Oney48'}
                        {$linkcredit = '/content/33-le-paiement-en-12-24-36-48-60-ou-84-fois-avec-oney-chez-priximbattable'}
                      {/if} <a href="{$linkcredit}" target="_blank" data-toggle="tooltip"> <span
                        style="width: 100%; padding: 0 5px;"
                        class="price productPriceUpx4  alu_oney_show_box_mini">{$multony}x
                        {($precoAtualizadoSEO['preco_com_desconto_sem_formato']/$multony)|round:2}€<img
                          style="width: 110px;display: inline-block;" src="/img/{$imgcredit}.png" width="110px"
                          height="auto"></span></a>
                  </div>
                  {if $isLogged}
                    <div class="pt-3 pb-1">
                      <div data-link-product="{$product.url}" target="_blank" onclick="ShareProductLink('{$product.url}','{$product.name}')"
                        class="hp-btn btn btn-primary btn-sm embedpartegerproduct" style="border-radius: 25px;">
                        {l s='Partager le produit' d='Shop.Theme.Wishlist'}</div>
                    </div>
                  {/if}
                </div>
              </div>
            </div>
          </article>
        {/foreach}
      {else}
        <h3 class="mt-1">
          <span>{l s='Aucun produit ajouté à la liste de souhaits' d='Shop.Theme.Wishlist'} </span>
        <h3>
        {/if}
    </div>
  </section>
  <h2 class="mt-3 h1 mb-2">
    <span>{l s='Historique du panier' d='Shop.Theme.Wishlist'} </span>
  </h2>
  {if $isLogged}
    {if $counthistoriccart > 0}
      <div class="modal fade customization-modal" id="cart_historic_modal_wrapper" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="hp-modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title">{l s='Historique du panier - Détails' d='Shop.Theme.Wishlist'}</h4>
            </div>
            <div class="modal-body" id="cart_historic_modal_body">

            </div>
          </div>
        </div>
      </div>


      <section style="margin: 10px;">

        <div class="orders hidden-md-up hp-orders" style="">
          {foreach from=$historiccartarray item="cart"}
            <div class="order p-1">
              <div class="row">
                <div class="col-xs-10">
                  <a href="/ajax/index.php?setaction=getcarthistoric&cart={$cart.numbercart}&customer={$cart.customer}">
                    <h3>{$cart.numbercart}</h3>
                  </a>
                  <div class="date">{$cart.date|date_format:"%d/%m/%Y"}</div>
                  <div class="total">{$cart.price|number_format:2:",":"."} €</div>
                  <div class="status pt-1">
                    {* <a href="/ajax/index.php?setaction=getcarthistoric&cart={$cart.numbercart}&customer={$cart.customer}"
                      target="_blank" class="hp-btn btn btn-primary btn-sm" style="border-radius: 25px;">{l s='Obtenir le
                      panier' d='Shop.Theme.Wishlist'}</a> *}
                  </div>
                </div>
                <div class="col-xs-2 text-xs-right">
                  <div>
                    <div onclick="getdetailproductShow({$cart.numbercart})" class="hp-btn">
                      <i class="material-icons">&#xE8B6;</i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
          {/foreach}
        </div>

        <table class="table table-striped table-bordered table-labeled hidden-sm-down">
          <thead class="thead-default">
            <tr>
              <th>{l s='Référence Panier' d='Shop.Theme.Wishlist'}</th>
              <th>{l s='Date' d='Shop.Theme.Wishlist'}</th>
              <th>{l s='Prix total' d='Shop.Theme.Wishlist'}</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            {foreach from=$historiccartarray item="cart"}
              <tr>
                <th scope="row">{$cart.numbercart}</th>
                <td>{$cart.date|date_format:"%d/%m/%Y"}</td>
                <td class="text-xs-right"> {$cart.price|number_format:2:",":"."} €</td>
                <td class="text-sm-center order-actions">
                  <div onclick="getdetailproductShow({$cart.numbercart})" class="hp-btn btn btn-primary btn-sm"
                    style="border-radius: 25px;">{l s='Détail' d='Shop.Theme.Wishlist'}</div>
                </td>
                <td class="text-sm-center order-actions">
                  {* <a href="/ajax/index.php?setaction=getcarthistoric&cart={$cart.numbercart}&customer={$cart.customer}"
                    target="_blank" class="hp-btn btn btn-primary btn-sm" style="border-radius: 25px;">{l s='Obtenir le
                    Panier' d='Shop.Theme.Wishlist'}</a> *}
                </td>
              </tr>
            {/foreach}
          </tbody>
        </table>
      </section>
    {else}
      <h3 class="mt-2  mb-2">
        <span>{l s='Vous n\'avez pas d\'historique de panier.' d='Shop.Theme.Wishlist'} </span>
        <h3>
        {/if}
      {else}
        <h3 class="mt-2 mb-2">
          <span>{l s='Pour accéder à l\'historique du panier, vous devez être enregistré.' d='Shop.Theme.Wishlist'} </span>
        <h3>

      <a href="/connexion?back=my-account" target="_blank" class="hp-btn btn btn-primary btn-sm"
        style="border-radius: 25px;"> {l s='Connecter' d='Shop.Theme.Wishlist'}</a>
          {/if}
{/block}
