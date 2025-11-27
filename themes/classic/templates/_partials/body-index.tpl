<div class="container">
  {* <div class="row recuosLaterais">
                                    <div class="col-md-12 flex-center-index">
                                      <div class="row">
                                        {assign 'arraySites' [
                                          'priximbattable.net|fr',
                                          'precoimbativel.net|pt',
                                          'precioimbatible.net|es',
                                          'preisverrueckt.de|ge'
                                        ]}

                                        {assign var=thisCountry value="fr"}

















    {foreach from=$arraySites item=foo key=key}
















      {assign var=content value="|"|explode:{$arraySites[$key]}}
















      {if $thisCountry != {$content[1]}}
                                                                                                            <a href="https://www.{$content[0]}" target="_blank">
















      {/if}
                                                                            <div class="col-md-4 divAvisPage custom-divAvisPage">
                                                                              <picture>
                                                                                <source srcset="/img/flags/{$content[1]}.webp" type="image/webp">
                                                                                <img loading="lazy" src="/img/flags/{$content[1]}.png" alt="{$content[0]}" title="{$content[0]}">
                                                                              </picture>
                                                                              <span>{$content[0]}</span>
                                                                            </div>
















      {if $thisCountry != {$content[1]}}
                                                                                                            </a>
















      {/if}
















    {/foreach}
                                      </div>
                                    </div>
                                  </div> *}

    <section>
      <div class="pt-2 row categories">
        <div class="col gridCategories">
          <div class="mt-1 card-categories">
            <a href="/50-portail">
              <picture>
                <source srcset="/img/categorie/categorie-portail.webp" type="image/webp" />
                <img loading="lazy" class="img-fluid img-centre" src="/img/categorie/categorie-portail.png" alt="Portail"
                  width="412" height="414" />
              </picture>
              <span class="categories-legend">Portail</span>
            </a>
          </div>
          <div class="mt-1 card-categories">
            <a href="/6-cloture">
              <picture>
                <source srcset="/img/categorie/categorie-cloture.webp" type="image/webp" />
                <img loading="lazy" class="img-fluid img-centre" src="/img/categorie/categorie-cloture.png" alt="Clôture"
                  width="412" height="414" />
              </picture>
              <span class="categories-legend">Clôture</span>
            </a>
          </div>
          <div class="mt-1 card-categories">
            <a href="/7-automatisme">
              <picture>
                <source srcset="/img/categorie/categorie-automatisme.webp" type="image/webp" />
                <img loading="lazy" class="img-fluid img-centre" src="/img/categorie/categorie-automatisme.png"
                  alt="Automatisme" width="412" height="414" />
              </picture>
              <span class="categories-legend">Automatisme</span>
            </a>
          </div>
          <div class="mt-1 card-categories">
            <a href="/8-porte-de-garage">
              <picture>
                <source srcset="/img/categorie/categorie-porte-garage.webp" type="image/webp" />
                <img loading="lazy" class="img-fluid img-centre" src="/img/categorie/categorie-porte-garage.png"
                  alt="Porte de Garage" width="410" height="414" />
              </picture>
              <span class="categories-legend">Porte de Garage</span>
            </a>
          </div>
          <div class="mt-1 card-categories">
            <a href="/9-volet">
              <picture>
                <source srcset="/img/categorie/categorie-volet.webp" type="image/webp" />
                <img loading="lazy" class="img-fluid img-centre" src="/img/categorie/categorie-volet.png" alt="Volet"
                  width="410" height="414" />
              </picture>
              <span class="categories-legend">Volet</span>
            </a>
          </div>
          <div class="mt-1 card-categories">
            <a href="/181-bso">
              <picture>
                <source srcset="/img/categorie/categorie-bso.webp" type="image/webp" />
                <img loading="lazy" class="img-fluid img-centre" src="/img/categorie/categorie-bso.png" alt="BSO"
                  width="412" height="414" />
              </picture>
              <span class="categories-legend">BSO</span>
            </a>
          </div>
          <div class="mt-1 card-categories">
            <a href="/10-fenetre">
              <picture>
                <source srcset="/img/categorie/categorie-fenetre.webp" type="image/webp" />
                <img loading="lazy" class="img-fluid img-centre" src="/img/categorie/categorie-fenetre.png" alt="Fenêtre"
                  width="412" height="414" />
              </picture>
              <span class="categories-legend">Fenêtre</span>
            </a>
          </div>
          <div class="mt-1 card-categories">
            <a href="/11-porte-d-entree">
              <picture>
                <source srcset="/img/categorie/categorie-porte-entree.webp" type="image/webp" />
                <img loading="lazy" class="img-fluid img-centre" src="/img/categorie/categorie-porte-entree.png"
                  alt="Porte d'Entrée" width="412" height="414" />
              </picture>
              <span class="categories-legend">Porte d'Entrée</span>
          </a>
        </div>
        <div class="mt-1 card-categories">
          <a href="/12-verriere">
            <picture>
              <source srcset="/img/categorie/categorie-verriere.webp" type="image/webp" />
              <img loading="lazy" class="img-fluid img-centre" src="/img/categorie/categorie-verriere.png"
                alt="Verrière" width="412" height="414" />
            </picture>
            <span class="categories-legend">Verrière</span>
          </a>
        </div>
        <div class="mt-1 card-categories">
          <a href="13-pergola">
            <picture>
              <source srcset="/img/categorie/categorie-pergola.webp" type="image/webp" />
              <img loading="lazy" class="img-fluid img-centre" src="/img/categorie/categorie-pergola.png" alt="Pergola"
                width="412" height="414" />
            </picture>
            <span class="categories-legend">Pergola</span>
          </a>
        </div>
        <div class="mt-1 card-categories">
          <a href="/48-abri">
            <picture>
              <source srcset="/img/categorie/categorie-abri.webp" type="image/webp" />
              <img loading="lazy" class="img-fluid img-centre" src="/img/categorie/categorie-abri.png" alt="Abri"
                width="410" height="414" />
            </picture>
            <span class="categories-legend">Abri</span>
          </a>
        </div>
        <div class="mt-1 card-categories">
          <a href="/57-jardin">
            <picture>
              <source srcset="/img/categorie/categorie-jardin.webp" type="image/webp" />
              <img loading="lazy" class="img-fluid img-centre" src="/img/categorie/categorie-jardin.png" alt="Jardin"
                width="410" height="414" />
            </picture>
            <span class="categories-legend">Jardin</span>
          </a>
        </div>
        <div class="mt-1 card-categories">
          <a href="/105-store">
            <picture>
              <source srcset="/img/categorie/categorie-store.webp" type="image/webp" />
              <img loading="lazy" class="img-fluid img-centre" src="/img/categorie/categorie-store.png" alt="Store"
                width="412" height="414" />
            </picture>
            <span class="categories-legend">Store</span>
          </a>
        </div>
        <div class="mt-1 card-destockage">
          <a href="/101-bonnes-affaires">
            <picture>
              <source srcset="/img/categorie/categorie-destockage.webp" type="image/webp" />
              <img loading="lazy" class="img-fluid img-centre" src="/img/categorie/categorie-destockage.png"
                alt="Déstockage" width="412" height="414" />
            </picture>
            <div class="destockage-categories">
              Réduction de
            </div>
            <div class="destockage-percentage">
              -50% et +
            </div>
            <span>DÉSTOCKAGE</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  {* Fabricante *}
  <section>
    <div class="row mt-3" style="background-color: #ABC4C7">
      <div class="col-md-12 col-lg-6 no-padding text-center img-flex logistics pt-1">
        <a href="/content/32-fabricant" target="_blank">
          <picture class="img-shrink">
            <source srcset="/img/cms/home/home-fabricant.webp" type="image/webp" />
            <img loading="lazy" class="img-fluid custom-fabricant-mobile" src="/img/cms/home/home-fabricant.png"
              alt="Fabricant" title="Fabricant" width="581" height="236" />
          </picture>
        </a>
        <div class="px-2 text-center" style="margin-top: -45px;">
          <b>Ils parlent de nous</b>
          <p class="mb-0">Suivre les médias qui font la promotion de nos produits</p>
        </div>

        <div class="logos-geral">
          <div class="logos-home">
            <picture>
              <source srcset="/img/cms/menu-about-us/logo-cotemaison.webp" type="image/webp" />
              <img loading="lazy" class="img-fluid" src="/img/cms/menu-about-us/logo-cotemaison.png" alt="Côté Maison"
                title="Côté Maison" width="114" height="52" />
            </picture>
          </div>
          <div class="logos-home">
            <picture>
              <source srcset="/img/cms/menu-about-us/logo-maisonetdomotique.webp" type="image/webp" />
              <img loading="lazy" class="img-fluid" src="/img/cms/menu-about-us/logo-maisonetdomotique.png"
                alt="Maison et Domotique" title="Maison et Domotique" width="132" height="42" />
            </picture>
          </div>
          <div class="logos-home">
            <picture>
              <source srcset="/img/cms/menu-about-us/logo-seloger.webp" type="image/webp" />
              <img loading="lazy" class="img-fluid" src="/img/cms/menu-about-us/logo-seloger.png" alt="SeLoger"
                title="SeLoger" width="106" height="36" />
            </picture>
          </div>
          <div class="logos-home">
            <picture>
              <source srcset="/img/cms/menu-about-us/logo-mariefrance.webp" type="image/webp" />
              <img loading="lazy" class="img-fluid" src="/img/cms/menu-about-us/logo-mariefrance.png" alt="Marie France"
                title="Marie France" width="120" height="22" />
            </picture>
          </div>
        </div>
        <div class="autres-partenaires-btn">
          <a href="/content/48-ils-parlent-de-nous" target="_blank">
            <picture>
              <source srcset="/img/cms/home/home-autres-partenaires.webp" type="image/webp" />
              <img loading="lazy" class="img-fluid" src="/img/cms/home/home-autres-partenaires.png"
                alt="Autres partenaires" title="Autres partenaires" width="203" height="42" />
            </picture>
          </a>
        </div>
      </div>
      <div class="col-md-12 col-lg-6 no-padding text-center img-flex">
        <picture class="img-shrink">
          <source srcset="/img/cms/home/home-usine.webp" type="image/webp" />
          <img loading="lazy" class="img-fluid" src="/img/cms/home/home-usine.png" alt="Usine" title="Usine" width="724"
            height="330" />
        </picture>
      </div>
    </div>
    <div class="row parent-table-auto-align" style="background-color: #B4CBE5">
      <div class="col-md-12 col-lg-6 no-padding text-center img-flex">
        <picture class="img-shrink">
          <source srcset="/img/cms/home/home-client-satisfait.webp" type="image/webp" />
          <img loading="lazy" class="img-fluid" src="/img/cms/home/home-client-satisfait.png" alt="Client satisfait"
            title="Client satisfait" width="725" height="330" />
        </picture>
        <div class="logos-avis">
          <a href="https://priximbattable.net/avis-client" target="_blank">
            <div class="border-avis">
              <picture>
                <source srcset="/img/cms/Avis/logo-google.webp" type="image/webp">
                <img class="avis-img img-fluid" loading="lazy" src="/img/cms/Avis/logo-google.png" alt="Google"
                  title="Google" width="386" height="129">
              </picture>
              <span><b>{$notaGoogle}</b></span>
            </div>
            <div class="border-avis">
              <picture>
                <source srcset="/img/cms/Avis/logo-pages-jaunes.webp" type="image/webp">
                <img class="avis-img img-fluid" loading="lazy" src="/img/cms/Avis/logo-pages-jaunes.png"
                  alt="Pages Jaunes" title="Pages Jaunes" width="386" height="129">
              </picture>
              <span><b>{$notaPagesJaunes}</b></span>
            </div>
            <div class="border-avis">
              <picture>
                <source srcset="/img/cms/Avis/logo-priximbattable.webp" type="image/webp">
                <img class="avis-img img-fluid" loading="lazy" src="/img/cms/Avis/logo-priximbattable.png"
                  alt="Prix Imbattable" title="Prix Imbattable" width="386" height="129">
              </picture>
              <span><b>{$notaPriximbattable}</b></span>
            </div>
            <div class="border-avis">
              <picture>
                <source srcset="/img/cms/Avis/logo-trustpilot.webp" type="image/webp">
                <img class="avis-img img-fluid" loading="lazy" src="/img/cms/Avis/logo-trustpilot.png" alt="Trustpilot"
                  title="Trustpilot" width="386" height="129">
              </picture>
              <span><b>{$notaTrustpilot}</b></span>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-12 col-lg-6 no-padding text-center img-flex table-auto-align">
        <a href="/content/47-projets-clients-priximbattable" target="_blank">
          <picture class="img-shrink">
            <source srcset="/img/cms/home/home-pourcentage-de-satisfaction.webp" type="image/webp" />
            <img loading="lazy" class="img-fluid custom-91-mobile img-centre"
              src="/img/cms/home/home-pourcentage-de-satisfaction.png" alt="Pourcentage de satisfaction"
              title="Pourcentage de satisfaction" width="309" height="275" />
          </picture>
        </a>
      </div>
    </div>

    {*  <div class="row" style="background-color: #C2C5A6">
     <div class="col-md-12 col-lg-6 no-padding text-center">
       <div class="pt-3 pb-1" style="font-size: 1.3rem;">
         <strong>Ils parlent de nous</strong>
       </div>
       <span class="text-center">Suivre les médias qui font la promotion de nos produits</span>
       <div class="row text-center logos-geral p-1">
         <div class="logos-home">
           <picture>
             <source srcset="/img/cms/menu-about-us/logo-cotemaison.webp" type="image/webp" />
             <img loading="lazy" class="img-fluid" src="/img/cms/menu-about-us/logo-cotemaison.png" alt="Côté Maison"
               title="Côté Maison" width="114" height="52" />
           </picture>
         </div>
         <div class="logos-home">
           <picture>
             <source srcset="/img/cms/menu-about-us/logo-maisonetdomotique.webp" type="image/webp" />
             <img loading="lazy" class="img-fluid" src="/img/cms/menu-about-us/logo-maisonetdomotique.png"
               alt="Maison et Domotique" title="Maison et Domotique" width="132" height="42" />
           </picture>
         </div>
         <div class="logos-home">
           <picture>
             <source srcset="/img/cms/menu-about-us/logo-seloger.webp" type="image/webp" />
             <img loading="lazy" class="img-fluid" src="/img/cms/menu-about-us/logo-seloger.png" alt="SeLoger"
               title="SeLoger" width="106" height="36" />
           </picture>
         </div>
         <div class="logos-home">
           <picture>
             <source srcset="/img/cms/menu-about-us/logo-mariefrance.webp" type="image/webp" />
             <img loading="lazy" class="img-fluid" src="/img/cms/menu-about-us/logo-mariefrance.png" alt="Marie France"
               title="Marie France" width="120" height="22" />
           </picture>
         </div>
       </div>

       <a href="/content/48-ils-parlent-de-nous" target="_blank">
         <picture>
           <source srcset="/img/cms/home/home-autres-partenaires.webp" type="image/webp" />
           <img loading="lazy" class="img-fluid" src="/img/cms/home/home-autres-partenaires.png"
             alt="Autres partenaires" title="Autres partenaires" width="203" height="42" />
         </picture>
       </a>
     </div>
     <div class="col-md-12 col-lg-6 no-padding text-center img-flex">
       <picture class="img-shrink">
         <source srcset="/img/cms/home/home-medias.webp" type="image/webp" />
         <img loading="lazy" class="img-fluid" src="/img/cms/home/home-medias.png" alt="Client Priximbattable"
           title="Client Priximbattable" width="724" height="330" />
       </picture>
     </div>
   </div>
*}
    <div class="row parent-table-auto-align" style="background-color: #9AD0C7">

      <div class="col-lg-6 col-md-12 py-2 table-auto-align">
        <p class="text-white text-center" style="font-size: 1.3rem;"><strong>Nos partenaires bancaires</strong></p>

        <div class="row banks">
          <a href="/content/67-payez-vos-achats-en-3-ou-4-fois-avec-alma" target="_blank">
            <div class="col-md-4 custom-banks text-center">
              <picture>
                <source srcset="/img/cms/home/home-alma.webp" type="image/webp">
                <img loading="lazy" src="/img/cms/home/home-alma.png" class="img-fluid" alt="Alma" title="Alma"
                  width="41" height="13">
              </picture>
              <div class="circle-alma">
                <span>3X</span>
                <span>4X</span>
              </div>
            </div>
          </a>

          <a href="/content/61-le-paiement-en-12-24-36-48-60-ou-84-fois-avec-oney-chez-priximbattable" target="_blank">
            <div class="col-md-4 custom-banks text-center">
              <picture>
                <source srcset="/img/cms/home/home-oney.webp" type="image/webp">
                <img loading="lazy" src="/img/cms/home/home-oney.png" class="img-fluid" alt="Oney" title="Oney"
                  width="41" height="13">
              </picture>
              <div class="circle-oney">
                <span>12X</span>
                <span>24X</span>
                <span>36X</span>
                <span>48X</span>
                <span>60X</span>
                <span>84X</span>
              </div>
            </div>
          </a>

          <div class="col-md-4 custom-banks text-center">
            <picture>
              <source srcset="/img/cms/home/home-banque-postale.webp" type="image/webp">
              <img loading="lazy" src="/img/cms/home/home-banque-postale.png" class="img-fluid" alt="Banque Postale"
                title="Banque Postale" width="53" height="53">
            </picture>
          </div>

          <div class="col-md-4 custom-banks text-center">
            <picture>
              <source srcset="/img/cms/home/home-santander.webp" type="image/webp">
              <img loading="lazy" src="/img/cms/home/home-santander.png" class="img-fluid" alt="Santander"
                title="Santander" width="145" height="26">
            </picture>
          </div>

          <div class="col-md-4 custom-banks text-center">
            <picture>
              <source srcset="/img/cms/home/home-bpi.webp" type="image/webp">
              <img loading="lazy" src="/img/cms/home/home-bpi.png" class="img-fluid" alt="BPI" title="BPI" width="142"
                height="66">
            </picture>
          </div>

          <div class="col-md-4 custom-banks text-center">
            <picture>
              <source srcset="/img/cms/home/home-mastercard-visa.webp" type="image/webp">
              <img loading="lazy" src="/img/cms/home/home-mastercard-visa.png" class="img-fluid"
                alt="Mastercard, Maestro, Visa" title="Mastercard, Maestro, Visa" width="154" height="32">
            </picture>
          </div>

          {* <div class="col-md-4 hidden-md-down"></div> *}

          <div class="col-md-4 custom-banks text-center">
            <picture>
              <source srcset="/img/cms/home/home-american-express.webp" type="image/webp">
              <img loading="lazy" src="/img/cms/home/home-american-express.png" class="img-fluid" alt="American Express"
                title="American Express" width="116" height="65">
            </picture>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-6 no-padding text-center img-flex">
        <picture class="img-shrink">
          <source srcset="/img/cms/home/home-mains.webp" type="image/webp" />
          <img loading="lazy" class="img-fluid" src="/img/cms/home/home-mains.png" alt="Priximbatable"
            title="Priximbatable" width="725" height="330" />
        </picture>
      </div>
    </div>
  </section>

  {* <div class="row mt-3" style="background-color: #ABC4C7">
     <div class="col-md-12 col-lg-6 no-padding text-center-horizontal py-3">
       <p class="text-white custom-text-cliquez-decouvrez"><strong>Il y a un produit Prix Imbattable près de chez vous...</strong></p>
       <a href="/content/50-il-y-a-un-portail-prix-imbattable-pres-de-chez-vous" target="_blank">
         <picture>
           <source srcset="/img/cms/home/home-cliquez-decouvrez.webp" type="image/webp" />
           <img loading="lazy" class="img-fluid" src="/img/cms/home/home-cliquez-decouvrez.png" alt="Cliquez et découvrez" title="Cliquez et découvrez" />
         </picture>
       </a>
     </div>
     <div class="col-md-12 col-lg-6 no-padding has-image hasTriangle py-2" style="background-color: #7C9194">
       <div class="triangle triangleToRight" style="border-color: transparent transparent transparent #ABC4C7; position: absolute;"></div>
       <picture style="margin: 0px auto;">
         <source srcset="/img/cms/home/home-map-client.webp" type="image/webp" />
         <img loading="lazy" class="img-fluid" src="/img/cms/home/home-map-client.png" alt="Map" title="Map" />
       </picture>
     </div>
 </div> *}

  <section>
    <div class="row recuosLaterais mt-3">
      <div class="col-md-12">
        <div class="about-us-block" style="background-color: #FFF;">
          <div class="title pour-nos-clients">Pour nos clients</div>

          <div class="block-to-customers custom-block-to-customers desktop">
            <div>
              <a href="https://priximbattable.net/content/70-service-de-pose" target="_blank">
                <picture>
                  <source srcset="/img/cms/menu-about-us/installateur.webp" type="image/webp">
                  <img loading="lazy" src="/img/cms/menu-about-us/installateur.png" alt="Installateur" class="img-fluid"
                    width="260" height="203" />
                </picture>

                <span>Trouver un installateur</span>
              </a>
            </div>
            <div>
              <a href="https://www.youtube.com/watch?v=KYudkFt7g2Q" target="_blank">
                <picture>
                  <source srcset="/img/cms/menu-about-us/pour-nos-clients-realisation-complete.webp" type="image/webp">
                  <img loading="lazy" src="/img/cms/menu-about-us/pour-nos-clients-realisation-complete.png"
                    alt="Réalisation complète" class="img-fluid" width="260" height="203" />
                </picture>

                <span>Exemple de réalisation complète</span>
              </a>
            </div>
            <div>
              <a href="https://www.youtube.com/@user-oy2oc3dn5l/videos">
                <picture>
                  <source srcset="/img/cms/menu-about-us/videos-et-notice-de-montage.webp" type="image/webp">
                  <img loading="lazy" src="/img/cms/menu-about-us/videos-et-notice-de-montage.png"
                    alt="Vidéos et notice de montage" class="img-fluid" width="260" height="203" />
                </picture>

                <span>Vidéos et notice de montage</span>
              </a>
            </div>

            {* <div>
             <a href="https://priximbattable.net/blog" target="_blank">
               <picture>
                 <source srcset="/img/cms/menu-about-us/blog.webp" type="image/webp">
                 <img loading="lazy" src="/img/cms/menu-about-us/blog.png" alt="Blog" class="img-fluid" width="260"
                   height="203" />
               </picture>

               <span>Blog</span>
             </a>
           </div> *}
            <div style="position: relative;">
              <a href="/content/32-fabricant" target="_blank">
                <picture>
                  <source srcset="/img/NotaCentre/site_fabrique_en_europe.webp" type="image/webp">
                  <img class="img-fluid logo-certifies" loading="lazy" alt="Fabriqué" width="112" height="112"
                    src="/img/NotaCentre/site_fabrique_en_europe.png">
                </picture>
                <picture>
                  <source srcset="/img/cms/menu-about-us/fabrique.webp" type="image/webp">
                  <img class="img-fluid" loading="lazy" alt="Fabriqué 2" width="260" height="203"
                    src="/img/cms/menu-about-us/fabrique.png">
                </picture>
                <span>Fabriqué en Europe</span>
              </a>
            </div>
            {* <div>
             <a href="https://priximbattable.net/content/47-projets-clients-priximbattable" target="_blank">
               <picture>
                 <source srcset="/img/cms/menu-about-us/galerie-photos.webp" type="image/webp">
                 <img loading="lazy" src="/img/cms/menu-about-us/galerie-photos.png" alt="Phototéque" class="img-fluid"
                   width="261" height="203" />
               </picture>

               <span>Phototéque</span>
             </a>
           </div> *}
            <div style="position: relative;">
              <a href="/content/14-conditions-de-garantie" target="_blank">
                <picture>
                  <source srcset="/img/NotaCentre/site_garantie_20_ans.webp" type="image/webp">
                  <img loading="lazy" src="/img/NotaCentre/site_garantie_20_ans.png" alt="Garantie"
                    class="img-fluid logo-certifies" width="112" height="112" />
                </picture>
                <picture>
                  <source srcset="/img/cms/menu-about-us/garantie.webp" type="image/webp">
                  <img loading="lazy" src="/img/cms/menu-about-us/garantie.png" alt="Garantie 2" class="img-fluid"
                    width="260" height="203" />
                </picture>

                <span>Garantie 20 ans</span>
              </a>
            </div>
          </div>

          <div class="block-to-customers mobile">
            <a href="/content/34-service-de-pose" target="_blank">
              <div class="subtitle with-custom-icon py-1">
                <span class="spacial-cyan">
                  <picture>
                    <source srcset="/img/cms/menu-about-us/drapeau-trouver-un-installateur.webp" type="image/webp">
                    <img loading="lazy" src="/img/cms/menu-about-us/drapeau-trouver-un-installateur.png"
                      alt="Trouver un installateur" class="img-fluid" width="60" height="60" />
                  </picture>
                </span>
                <span>Trouver un installateur</span>
              </div>
            </a>
            <a href="https://www.youtube.com/watch?v=KYudkFt7g2Q" target="_blank">
              <div class="subtitle with-custom-icon py-1">
                <span class="old-cyan">
                  <picture>
                    <source srcset="/img/cms/menu-about-us/drapeau-realisation-complete.webp" type="image/webp">
                    <img loading="lazy" src="/img/cms/menu-about-us/drapeau-realisation-complete.png"
                      alt="Exemple de réalisation complète" class="img-fluid" width="60" height="60" />
                  </picture>
                </span>
                <span>Exemple de réalisation complète</span>
              </div>
            </a>
            <a href="https://www.youtube.com/@user-oy2oc3dn5l/videos">
              <div class="subtitle with-custom-icon py-1">
                <span class="soft-cyan">
                  <picture>
                    <source srcset="/img/cms/menu-about-us/drapeau-videos-et-notice-de-montage.webp" type="image/webp">
                    <img loading="lazy" src="/img/cms/menu-about-us/drapeau-videos-et-notice-de-montage.png"
                      alt="Vidéos de montage" class="img-fluid" width="66" height="66" />
                  </picture>
                </span>
                <span>Vidéos et notice de montage</span>
              </div>
            </a>
            {* <a href="https://priximbattable.net/blog" target="_blank">
           <div class="subtitle with-custom-icon py-1">
             <span class="sky-purple">
               <picture>
                 <source srcset="/img/cms/menu-about-us/drapeau-blog.webp" type="image/webp">
                 <img loading="lazy" src="/img/cms/menu-about-us/drapeau-blog.png" alt="Blog 2" class="img-fluid"
                   width="60" height="60" />
               </picture>
             </span>
             <span>Blog</span>
           </div>
         </a> *}
            {* <a href="https://priximbattable.net/content/47-projets-clients-priximbattable" target="_blank">
           <div class="subtitle with-custom-icon py-1">
             <span class="light-orange">
               <picture>
                 <source srcset="/img/cms/menu-about-us/drapeau-galerie-photos.webp" type="image/webp">
                 <img loading="lazy" src="/img/cms/menu-about-us/drapeau-galerie-photos.png" alt="Drapeau Phototéque"
                   class="img-fluid" width="60" height="60" />
               </picture>
             </span>
             <span>Phototéque</span>
           </div>
         </a> *}

            <a href="/content/32-fabricant" target="_blank">
              <div class="subtitle with-custom-icon py-1">
                <span class="sky-purple">
                  <picture>
                    <source srcset="/img/NotaCentre/site_fabrique_en_europe.webp" type="image/webp">
                    <img loading="lazy" src="/img/NotaCentre/site_fabrique_en_europe.png" alt="Fabriqué en Europe"
                      class="img-fluid" width="112" height="112" />
                  </picture>
                </span>
                <span>Fabriqué en Europe</span>
              </div>
            </a>
            <a href="/content/14-conditions-de-garantie" target="_blank">
              <div class="subtitle with-custom-icon py-1">
                <span class="light-orange">
                  <picture>
                    <source srcset="/img/NotaCentre/site_garantie_20_ans.webp" type="image/webp">
                    <img loading="lazy" src="/img/NotaCentre/site_garantie_20_ans.png" alt="Garantie 20 ans"
                      class="img-fluid" width="112" height="112" />
                  </picture>
                </span>
                <span>Garantie 20 ans</span>
              </div>
            </a>
          </div>
        </div>
      </div>
  </section>

  <section>
    <div class="row recuosLaterais about-us-block p-0 m-0"
      style="height: auto; background-color: transparent; position: relative">

      <div class="col-lg-4 text-center pt-2">
        <div class="choix-container">
          <picture>
            <source srcset="/img/cms/home/home-un-choix-conscient.webp" type="image/webp">
            <img loading="lazy" src="/img/cms/home/home-un-choix-conscient.png" alt="Nos certificats"
              class="img-fluid nous-sommes-fabricant" width="938" height="528" />
          </picture>
          <a href="https://priximbattable.net/content/18-produits-certifies" target="_blank">
            <div class="subtitle nous-sommes-fabricant mt-2">Nos certificats</div>
          </a>
        </div>
        <div class="certifies-icons-container m-1">
          <a href="/content/32-fabricant" target="_blank" class="certifies-icon pt-1">
            <picture>
              <source srcset="/img/NotaCentre/site_fabrication_prope.webp" type="image/webp">
              <img loading="lazy" class="img-fluid" alt="Fabrication" width="112" height="112"
                src="/img/NotaCentre/site_fabrication_prope.png">
            </picture>
            <p>Fabrication <span>&nbsp; Propre</span></p>
          </a>

          <a href="/content/18-produits-certifies" target="_blank" class="certifies-icon pt-1">
            <picture>
              <source srcset="/img/NotaCentre/site_certificats_ce.webp" type="image/webp">
              <img loading="lazy" class="img-fluid" alt="Certificats CE" width="112" height="112"
                src="/img/NotaCentre/site_certificats_ce.png">
            </picture>
            <p>Certificats CE</p>
          </a>
        </div>

      </div>
      <div class="col-lg-4 text-center pt-2">
        <a href="https://priximbattable.net/content/45-centre-logistique" target="_blank">
          <picture>
            <source srcset="/img/cms/home/home-centres-logistiques.webp" type="image/webp">
            <img loading="lazy" src="/img/cms/home/home-centres-logistiques.png" alt="Nos centres logistiques"
              class="img-fluid nous-sommes-fabricant" width="940" height="528" />
          </picture>

          <div class="subtitle nous-sommes-fabricant mt-2">Nos centres logistiques</div>
        </a>
      </div>
      <div class="col-lg-4 text-center pt-2">
        <a href="https://priximbattable.net/content/62-catalogues" target="_blank">
          <picture>
            <source srcset="/img/cms/home/home-catalogue.webp" type="image/webp">
            <img loading="lazy" src="/img/cms/home/home-catalogue.png" alt="Catalogue"
              class="img-fluid nous-sommes-fabricant" width="938" height="528" />
          </picture>

          <div class="subtitle nous-sommes-fabricant mt-2">Catalogue</div>
        </a>
      </div>
    </div>
  </section>

  {* <section>
   <div class="row mt-3 alu-justify-space-evenly">
     <div class="col p-3">
       <a href="/content/30-fabricant" target="_blank">
         <div class="product_nota_box_generic" style="background-color: #9AD0C7;">
           <div class="product_nota_centre" style="margin-top: 1rem;">
             <picture>
               <source srcset="/img/NotaCentre/site_fabrique_en_europe.webp" type="image/webp">
               <img loading="lazy" alt="Fabriqué" width="112" height="112"
                 src="/img/NotaCentre/site_fabrique_en_europe.png">
             </picture>
           </div>
           <div class="product_nota_centre product_nota_box_text_generic pt-1">
             <p style="color: #FFFFFF; font-size: 12px; margin-top: 0.2rem;">Fabriqué
               <strong>en Europe</strong>
             </p>
           </div>
         </div>
       </a>
     </div>
     <div class="col p-3">
       <a href="/content/30-fabricant" target="_blank">
         <div class="product_nota_box_generic" style="background-color: #A2B1A3;">
           <div class="product_nota_centre " style="margin-top: 1rem;">
             <picture>
               <source srcset="/img/NotaCentre/site_fabrication_prope.webp" type="image/webp">
               <img loading="lazy" alt="Fabrication" width="112" height="112"
                 src="/img/NotaCentre/site_fabrication_prope.png">
             </picture>
           </div>
           <div class="product_nota_centre product_nota_box_text_generic pt-1">
             <p style="color: #FFFFFF; font-size: 12px; margin-top: 0.2rem;">Fabrication
               <strong>Propre</strong>
             </p>
           </div>
         </div>
       </a>
     </div>
     <div class="col p-3">
       <a href="/content/14-conditions-de-garantie" target="_blank">
         <div class="product_nota_box_generic" style="background-color: #FAA700;">
           <div class="product_nota_centre " style="margin-top: 1rem;">
             <picture>
               <source srcset="/img/NotaCentre/site_garantie_20_ans.webp" type="image/webp">
               <img loading="lazy" alt="Garantie" width="112" height="112"
                 src="/img/NotaCentre/site_garantie_20_ans.png">
             </picture>
           </div>
           <div class="product_nota_centre product_nota_box_text_generic pt-1">
             <p style="color: #FFFFFF; font-size: 12px; margin-top: 0.2rem;">Garantie
               <strong>20 ans</strong>
             </p>
           </div>
         </div>
       </a>
     </div>
     <div class="col p-3">
       <a href="/content/18-produits-certifies" target="_blank">
         <div class="product_nota_box_generic" style="background-color: #F4BF17;">
           <div class="product_nota_centre " style="margin-top: 1rem;">
             <picture>
               <source srcset="/img/NotaCentre/site_certificats_ce.webp" type="image/webp">
               <img loading="lazy" alt="Certificats" width="112" height="112"
                 src="/img/NotaCentre/site_certificats_ce.png">
             </picture>
           </div>
           <div class="product_nota_centre product_nota_box_text_generic pt-1">
             <p style="color: #FFFFFF; font-size: 12px; margin-top: 0.2rem;">Certificats <strong>CE</strong>
             </p>
           </div>
         </div>
       </a>
     </div>
   </div>
 </section> *}
  <!-- Bloco Avis page inicial -->
  {* <section>
   <div class="row mt-3">
     <div class="col-md-12" style="color: #FFF; text-align: center; font-weight: bold;">

       <picture class="hidden-md-down">
         <source srcset="/img/cms/Avis/avis_desktop.webp" type="image/webp">
         <img loading="lazy" src="/img/cms/Avis/avis_desktop.jpg" class="img-fluid" alt="Avis" title="Avis"
           width="1450" height="300">
       </picture>
       <picture class=" hidden-lg-up">
         <source srcset="/img/cms/Avis/avis_mobile.webp" type="image/webp">
         <img loading="lazy" class="img-fluid img-centre" src="/img/cms/Avis/avis_mobile.jpg" alt="Avis" title="Avis"
           width="800" height="520">
       </picture>

     </div>
     <div>
       <a href="https://priximbattable.net/avis-client" target="_blank">
         <div class="content">
           <picture class=" hidden-md-down">
             <source srcset="/img/cms/Avis/google.webp" type="image/webp">
             <img class="img-avis-desktop" loading="lazy" src="/img/cms/Avis/google.png" alt="Google" title="Google"
               width="150" height="50">
           </picture>
           <picture class=" hidden-md-down">
             <source srcset="/img/cms/Avis/pagesjaunes.webp" type="image/webp">
             <img class="img-avis-desktop" loading="lazy" src="/img/cms/Avis/pagesjaunes.png" alt="Pages Jaunes"
               title="Pages Jaunes" width="150" height="50">
           </picture>
           <picture class=" hidden-md-down">
             <source srcset="/img/cms/Avis/priximbattable.webp" type="image/webp">
             <img class="img-avis-desktop" loading="lazy" src="/img/cms/Avis/priximbattable.png" alt="Prix Imbattable"
               title="Prix Imbattable" width="150" height="50">
           </picture>
           <picture class=" hidden-md-down">
             <source srcset="/img/cms/Avis/trustpilot.webp" type="image/webp">
             <img class="img-avis-desktop" loading="lazy" src="/img/cms/Avis/trustpilot.png" alt="Trustpilot"
               title="Trustpilot" width="150" height="50">
           </picture>
         </div>
       </a>
     </div>
     <div>
       <a href="https://priximbattable.net/avis-client">
         <picture class=" hidden-lg-up">
           <source srcset="/img/cms/Avis/google.webp" type="image/webp">
           <img class="img-avis-mobile" loading="lazy" src="/img/cms/Avis/google.png" alt="Google" title="Google"
             width="50" height="25">
         </picture>
       </a>
       <a href="https://priximbattable.net/avis-client">
         <picture class=" hidden-lg-up">
           <source srcset="/img/cms/Avis/pagesjaunes.webp" type="image/webp">
           <img class="img-avis-mobile" loading="lazy" src="/img/cms/Avis/pagesjaunes.png" alt="Pages Jaunes"
             title="Pages Jaunes" width="50" height="25">
         </picture>
       </a>
       <a href="https://priximbattable.net/avis-client">
         <picture class=" hidden-lg-up">
           <source srcset="/img/cms/Avis/priximbattable.webp" type="image/webp">
           <img class="img-avis-mobile" loading="lazy" src="/img/cms/Avis/priximbattable.png" alt="Prix Imbattable"
             title="Prix Imbattable" width="50" height="25">
         </picture>
       </a>
       <a href="https://fr.trustpilot.com/review/priximbattable.net">
         <picture class=" hidden-lg-up">
           <source srcset="/img/cms/Avis/trustpilot.webp" type="image/webp">
           <img class="img-avis-mobile" loading="lazy" src="/img/cms/Avis/trustpilot.png" alt="Trustpilot"
             title="Trustpilot" width="50" height="25">
         </picture>
       </a>
     </div>
   </div> *}
  {* <div class="container-fluid pt-2">

</div> *}
  {* </section> *}
  <!-- Fim Bloco Avis page inicial -->
  <section>
    <div class="row mt-3 newAlu_FooterTop" style="max-width: 100%;">
      <div class="col-md-12">
        <span class="newAlu_Title">À propos de nous :</span>
      </div>
    </div>

    <div class="row">
      <h1 class="col-md-12 text-center newAlu_AboutUsTitleTop">
        <p class="firstTitleTop">Prix Imbattable</p>
        <p class="secondTitleTop">l’expert des menuiseries en aluminium de qualité premium</p>
      </h1>
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
        <h2>Une large gamme de produits de menuiseries pour votre maison, appartement et jardin</h2>
      </div>
      <div class="col-md-12 text-justify">
        <p>Vous souhaitez installer un portail ou une clôture dans votre jardin ? Vous désirez remplacer vos fenêtres
          par une baie coulissante, ou mettre en place une verrière dans votre cuisine ? Découvrez ici une large gamme
          de produits de haute qualité et durables. Chez Prix Imbattable, nous concevons et fabriquons de nombreux
          types d’aménagement et des menuiseries pour votre maison et appartement, adaptés à la fois pour l’intérieur
          comme l’extérieur. Couleurs, formes, dimensions, design…, tous nos produits sont standards ou
          personnalisables, afin de répondre à vos besoins et à vos envies ! Et bien sûr votre déco !</p>
      </div>
      <div class="col-lg-5">
        <picture>
          <source srcset="/img/cms/home/verriere.webp" type="image/webp">
          <img src="/img/cms/home/verriere.jpg" alt="Verrière" loading="lazy" class="img-fluid pb-1" width="1200"
            height="895">
        </picture>
      </div>
      <div class="col-lg-7 text-justify">
        <h3><strong class="newAlu_footerSubtitle">Verrière industrielle, volet, fenêtre et porte d’entrée en alu pour
            assurer votre confort</strong></h3>
        <p>Pour décorer l’intérieur de votre maison ou structurer une large pièce de vie, nous vous proposons une
          large gamme de verrières industrielles en alu, de type atelier. Afin de garantir votre sécurité et votre
          confort, nous fabriquons également des baies coulissantes, des fenêtres à frappe ou coulissantes, ainsi que
          des portes d’entrée en aluminium, déclinées en différentes formes et avec un design pratique et fonctionnel.
        </p>
        <p>Offrez-vous une pièce supplémentaire grâce à nos pergolandas en aluminium. Disponible en différentes
          tailles et finitions, nos pergolandas sont équipées avec des portes coulissantes en alu sans rupture de pont
          thermique.</p>
        <h3><strong class="newAlu_footerSubtitle">Portail, clôture, abri, pergola : tout ce qu’il faut pour votre
            extérieur</strong></h3>
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
        <h2>Des aménagements et menuiseries solides et résistants en aluminium</h2>
      </div>
      <div class="col-md-12 text-justify">
        <p>Matériau robuste et durable, l’aluminium est la spécialité de Prix Imbattable. Nous fabriquons et proposons
          des équipements de haute qualité (porte d’entrée, portail, fenêtre, verrière, pergola, abris de jardin...),
          disponibles dans de multiples formats standards et personnalisés.</p>
      </div>
      <div class="col-lg-5">
        <picture>
          <source srcset="/img/cms/home/phases-projet.webp" type="image/webp">
          <img src="/img/cms/home/phases-projet.jpg" alt="Phases du projet" loading="lazy" class="img-fluid pb-1"
            width="1200" height="722">
        </picture>
      </div>
      <div class="col-lg-7 text-justify">
        <h3><strong class="newAlu_footerSubtitle">Durabilité et résistance de l’aluminium Prix Imbattable</strong></h3>
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
        <h3><strong class="newAlu_footerSubtitle">Des articles intérieurs et extérieurs à personnaliser selon vos
            envies</strong></h3>
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
        <h2>Expertise et garantie : promesse d’un service de qualité à prix imbattable</h2>
      </div>
      <div class="col-md-12 text-justify">
        <p>Notre équipe d’experts et d’artisans en menuiserie et en serrurerie fabriquent des aménagements de qualité,
          certifiés, avec des matériaux solides et résistants. Notre service client, quant à lui, est à votre écoute
          pour répondre à vos demandes et étudier vos projets.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-5">
        <picture>
          <source srcset="/img/cms/home/service-de-qualite.webp" type="image/webp">
          <img src="/img/cms/home/service-de-qualite.jpg" alt="Service de qualité" loading="lazy" class="img-fluid pb-1"
            width="1200" height="801">
        </picture>
      </div>
      <div class="col-lg-7 text-justify">
        <h3><strong class="newAlu_footerSubtitle">Des articles de menuiserie certifiés et homologués</strong></h3>
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
          <h3><strong class="newAlu_footerSubtitle">Une équipe de professionnels disponible et à votre écoute</strong>
          </h3>
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
  </section>
  </div>
