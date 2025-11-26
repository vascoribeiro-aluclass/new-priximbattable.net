{extends file='page.tpl'}
{block name='page_title'}
  <span class="sitemap-title">{l s='Declaration de Travaux' d='Shop.Theme'} </span>
{/block}

{block name='page_content_container'}
  <section class="dt-header mb-1 mt-1  ">
    <picture>
      <source srcset="/img/cms/declarationtravaux/banner-desktop.webp" type="image/webp">
      <img class="dt-img-fluid" src="/img/cms/declarationtravaux/banner-desktop.jpg" alt="Declaration de Travaux"
        title="Declaration de Travaux" width="1420" height="416">
    </picture>
  </section>
  {if $message}
    <section
      class="dt-form mb-3  mt-3 p-3 dt-flex-centre  {if $status == 'error'} dt-form-error  {else} dt-form-succes {/if}">
      <p><strong> Message : </strong></p>

      <p>{$message}</p>

    </section>
  {/if}

  {if $tokendt}
    <div class="m-1 dt-flex-title dt-flex-centre">
      Plans de votre projet
    </div>
    <hr>
    <section class=" dt-form dt-form-radius mb-2">
      <div class="mb-2 dt-flex-title-description dt-flex-centre">
        Descriptif du Projet
      </div>
      <form id="formdt" action="https://priximbattable.net/declaration-de-travaux" method="post"
        enctype="multipart/form-data">
        <input type="hidden" id="tokendt" name="tokendt" value="{$tokendt}">

        <div class="form-group m-1">
          <textarea rows="8" class="form-control dt-box-description" id="descriptifprojetdt" name="descriptifprojetdt"
            placeholder="Écrivez votre description ici"></textarea>
          <small id="descriptifprojetdtinfo" class="form-text text-muted">Description détaillée des travaux prévus, des
            matériaux utilisés et de l'impact visuel.</small>
    </div>
    <div class="dt-flex-row dt-flex-row-reverse m-1 mt-3">
      <div class="form-group">
        <div class="row">
          <div class="col-sm-12 dt-flex-centre">
            <label style="color: #777;" for="Plans de Project"><strong> Plans de Project </strong></label>
          </div>
          <div class="col-sm-12 dt-flex-centre">
            <div class="dt-mon-files" id="plansprojetdt-btn">
              <div class="dt-mon-files-circle ">
                <picture>
                  <img loading="lazy" alt="devis print" class="dt-mon-icon"
                    src="/img/cms/declarationtravaux/add-file.svg">
                </picture>
              </div>
              <div class="dt-mon-files-text " id="plansprojetdt-file">Aucun fichier sélectionné</div>
            </div>
            <input type="file" class="form-control-file arquivo" id="plansprojetdt" name="plansprojetdt[]" multiple>
          </div>
          <div class="col-sm-12 dt-flex-centre">
            <small id="plansprojetdtinfo" class="form-text text-muted dt-nom-text-info">Dessins techniques et schémas
              illustrant les dimensions et la disposition de la structure.</small>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-sm-12 dt-flex-centre">
            <label style="color: #777;" for="Insertion Graphique"><strong> Insertion Graphique </strong></label>
          </div>
          <div class="col-sm-12 dt-flex-centre">
            <div class="dt-mon-files" id="insertiongraphiquedt-btn">
              <div class="dt-mon-files-circle ">
                <picture>
                  <img loading="lazy" alt="devis print" class="dt-mon-icon"
                    src="/img/cms/declarationtravaux/add-file.svg">
                </picture>
              </div>
              <div class="dt-mon-files-text " id="insertiongraphiquedt-file">Aucun fichier sélectionné</div>
            </div>
            <input type="file" class="form-control-file arquivo" id="insertiongraphiquedt" name="insertiongraphiquedt[]"
              multiple>
          </div>
          <div class="col-sm-12 dt-flex-centre">
            <small id="insertiongraphiquedtinfo" class="form-text text-muted dt-nom-text-info">Simulation ou rendu
              graphique de l'intégration de la structure dans l'environnement existant.</small>
          </div>
        </div>


      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-sm-12 dt-flex-centre">
            <label style="color: #777;" for="Photos du Terrain"><strong> Photos du Terrain </strong></label>
          </div>
          <div class="col-sm-12 dt-flex-centre">
            <div class="dt-mon-files" id="phototerraindt-btn">
              <div class="dt-mon-files-circle ">
                <picture>
                  <img loading="lazy" alt="devis print" class="dt-mon-icon"
                    src="/img/cms/declarationtravaux/add-file.svg">
                </picture>
              </div>
              <div class="dt-mon-files-text " id="phototerraindt-file">Aucun fichier sélectionné</div>
            </div>
            <input type="file" class="form-control-file arquivo" id="phototerraindt" name="phototerraindt[]" multiple>
          </div>
          <div class="col-sm-12 dt-flex-centre">
            <small id="phototerraindtinfo" class="form-text text-muted dt-nom-text-info">mages actuelles de
              l'emplacement prévu pour le projet, montrant clairement la zone de construction.</small>
              </div>
            </div>
          </div>
        </div>
        <div class="dt-flex-centre p-3">
          <button name="declarationtravaux" type="submit"
            style="background-color: #939A93; color:white; border-radius: 25px; padding: 1.5rem 2.25rem;"
            class="dt-btn-submit btn btn-primary ">Envoyer</button>
        </div>
      </form>

    </section>
  {/if}
  <section class="dt-form">
    <div class="dt-flex">
      <div class="dt-flex-title dt-flex-title-color-1 dt-flex-centre  p-1">
        Déclaration préalable de travaux : on s’occupe de vos démarches administratives!
      </div>
      <div class="dt-flex-row dt-flex-col-height-1 dt-flex-row-reverse">
        <div class="dt-flex-col dt-flex-col-height-1 dt-flex-col-color-1 p-1 dt-flex-centre">
          <p>Vous envisagez d'installer un abri de jardin, un garage en aluminium, un carport, une pergola, etc…</p>
        Un beau projet qui fait l’objet d’une demande d'autorisation de travaux, d’un permis de construire ou d’une
          déclaration préalable de travaux.
          Avec à la clef des démarches administratives longues et compliquée.
          Bonne nouvelle ! Experts de la construction, nous vous proposons un service qui s’occupe de tout.
        </div>
        <div class="dt-flex-col dt-flex-col-height-1">
          <picture>
            <source srcset="/img/cms/declarationtravaux/presentacion-carport-autoporte-arche.webp" type="image/webp">
            <img class="dt-img-fluid" src="/img/cms/declarationtravaux/presentacion-carport-autoporte-arche.jpg"
              alt="Presentación carport autoporte arche" title="Presentación carport autoporte arche" width="725"
              height="408">
          </picture>
        </div>
      </div>
      <div class="dt-flex mt-2">
        <div class="dt-flex-title dt-flex-title-color-2 dt-flex-centre  p-1">
          Comment bénéficier de ce service pour votre dossier d’autorisation de travaux ?
        </div>
        <div class="dt-flex-row dt-flex-row-reverse">
          <div class="dt-flex-col dt-flex-col-height-1">
            <picture>
              <source srcset="/img/cms/declarationtravaux/personnes-travaillant-espace-de-bureau-elegant-confortable.webp"
                type="image/webp">
              <img class="dt-img-fluid"
                src="/img/cms/declarationtravaux/personnes-travaillant-espace-de-bureau-elegant-confortable.jpg"
                alt="Presentación carport autoporte arche" title="Presentación carport autoporte arche" width="725"
                height="408">
            </picture>
          </div>
          <div class="dt-flex-row dt-flex-col-height-1">
            <div class="dt-flex-col dt-flex-col-color-2 p-1 dt-flex-col-height-1 dt-flex-centre">
              Pour commencer, lors de la personnalisation du produit, vous trouverez l'option "Service de déclaration de
            travaux ou permis de construire" que vous devez sélectionner.
            Ensuite, une fois votre produit commandé, vous recevrez un lien vous invitant à fournir les informations et
            documents nécessaires via un formulaire de saisie.
            En cas de besoin, n’hésitez pas à solliciter nos conseillers.
            Ils se feront un plaisir de vous guider dans les premières étapes et de vous expliquer en détail le
            processus pour vos demandes d'autorisation ou de déclaration préalable de travaux ou de votre permis de
              construire.

            </div>
          </div>
        </div>
      </div>
    </div>

    {* begin de colunas de 4   1*}
    <div class="dt-flex mt-3">
      <div class="dt-flex-title dt-flex-title-color-1 dt-flex-centre  p-1">
       Pour faciliter votre projet, nous gérons vos documents de A à Z
      </div>
      {* colunas de 1 *}
      <div class="dt-flex ">
        <div class="dt-flex-row-3">
          <div class="dt-flex-col dt-flex-col-height-4">
            <div class="dt-flex-row dt-flex-centre">
              <picture>
                <source srcset="/img/cms/declarationtravaux/investisseurs-affaires-se-tenant-la-main-deux-hommes-affaires-se-conviennent-affaires-ensemble-se serrant-la-main-apres-une-negociation-reussie-la-poignee-de-m.webp"
                  type="image/webp">
                <img class="dt-img-fluid" src="/img/cms/declarationtravaux/investisseurs-affaires-se-tenant-la-main-deux-hommes-affaires-se-conviennent-affaires-ensemble-se serrant-la-main-apres-une-negociation-reussie-la-poignee-de-m.jpg"
                  alt="Reunion Equipe Entrepriseprocessus" title="Reunion Equipe Entrepriseprocessus">
              </picture>
            </div>

            <div class="dt-flex-row dt-flex-centre">
              <div class="dt-flex-col m-2">
                Le montage d’un dossier complet et conforme aux exigences légales pour votre futur aménagement.
              </div>
            </div>
          </div>
          {* 2 colunas *}
          <div class="dt-flex-col dt-flex-col-height-4">
            <div class="dt-flex-row dt-flex-centre">
              <picture>
                <source srcset="/img/cms/declarationtravaux/jeune-collegue-travail-plan-bureau.webp" type="image/webp">
                <img class="dt-img-fluid" src="/img/cms/declarationtravaux/jeune-collegue-travail-plan-bureau.jpg"
                  alt="Jeune Collegue" title="Jeune Collegue">
              </picture>
            </div>
            <div class="dt-flex-row dt-flex-centre">
              <div class="dt-flex-col m-2">
                La vérification du formulaire Cerfa.
              </div>
            </div>
          </div>
          {* 3 colunas *}
          <div class="dt-flex-col dt-flex-col-height-4">
            <div class="dt-flex-row dt-flex-centre">
              <picture>
                <source srcset="/img/cms/declarationtravaux/reunion-equipe-entrepriseprocessus-de-travailequipe-professionnelle-travaillant-avec-un-nouveau-projet-de-startupchefs-de-projet-plans-affaires-ordinateur portable.webp" type="image/webp">
                <img class="dt-img-fluid" src="/img/cms/declarationtravaux/reunion-equipe-entrepriseprocessus-de-travailequipe-professionnelle-travaillant-avec-un-nouveau-projet-de-startupchefs-de-projet-plans-affaires-ordinateur portable.jpg"
                  alt="Jeune Collegue" title="Jeune Collegue">
              </picture>
            </div>
            <div class="dt-flex-row dt-flex-centre">
              <div class="dt-flex-col m-2">
                Le dépôt de la demande d’autorisation auprès de la mairie concernée.
              </div>
            </div>
          </div>
          {* 4 colunas *}
          <div class="dt-flex-col dt-flex-col-height-4">
            <div class="dt-flex-row dt-flex-centre ">
              <picture>

                <source srcset="/img/cms/declarationtravaux/belle-femme-affaires-travaillant-avec-son-ordinateur-portable-bureau.webp" type="image/webp">
                <img class="dt-img-fluid" src="/img/cms/declarationtravaux/belle-femme-affaires-travaillant-avec-son-ordinateur-portable-bureau.jpg"
                  alt="Investisseurs Affaires" title="Investisseurs Affaires">
              </picture>
            </div>
            <div class="dt-flex-row dt-flex-centre">
              <div class="dt-flex-col m-2">
                Le suivi régulier du dossier de construction jusqu'à l'obtention de l'autorisation.
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  {* fim de colunas de 4  1*}

  {* begin de colunas de 4  2*}
  <div class="dt-flex mt-3">
    <div class="dt-flex-title dt-flex-title-color-1 dt-flex-centre  p-1">
      Les documents nécessaires pour réaliser votre dossier :
    </div>
    {* colunas de 1 *}
    <div class="dt-flex ">
      <div class="dt-flex-row-3">
        <div class="dt-flex-col dt-flex-col-height-4">
          <div class="dt-flex-row dt-flex-centre">
            <picture>
              <source srcset="/img/cms/declarationtravaux/plan-de-developpement-de-femme-anonyme.webp"
                type="image/webp">
              <img class="dt-img-fluid" src="/img/cms/declarationtravaux/plan-de-developpement-de-femme-anonyme.jpg"
                alt="Reunion Equipe Entrepriseprocessus" title="Reunion Equipe Entrepriseprocessus">
            </picture>
          </div>

          <div class="dt-flex-row dt-flex-centre">
            <div class="dt-flex-col m-2">
              Plan de votre projet de construction : schémas illustrant les dimensions et la
              disposition de la structure.
            </div>
          </div>
        </div>
        {* 2 colunas *}
        <div class="dt-flex-col dt-flex-col-height-4">
          <div class="dt-flex-row dt-flex-centre">
            <picture>
              <source srcset="/img/cms/declarationtravaux/portrait-jeune-femme-affaires.webp" type="image/webp">
              <img class="dt-img-fluid" src="/img/cms/declarationtravaux/portrait-jeune-femme-affaires.jpg"
                alt="Jeune Collegue" title="Jeune Collegue">
            </picture>
          </div>
          <div class="dt-flex-row dt-flex-centre">
            <div class="dt-flex-col m-2">
              Description détaillée des travaux prévus, des matériaux utilisés et de l'impact visuel de ces
                aménagements.
              </div>
            </div>
          </div>
          {* 3 colunas *}
          <div class="dt-flex-col dt-flex-col-height-4">
            <div class="dt-flex-row dt-flex-centre">
              <picture>
                <source srcset="/img/cms/declarationtravaux/autoportee-teto-plano-debord.webp" type="image/webp">
                <img class="dt-img-fluid" src="/img/cms/declarationtravaux/autoportee-teto-plano-debord.jpg"
                  alt="Jeune Collegue" title="Jeune Collegue">
              </picture>
            </div>
            <div class="dt-flex-row dt-flex-centre">
              <div class="dt-flex-col m-2">
                Ce document n'est pas à fourner (il sera réalisé par le service).
              </div>
            </div>
          </div>
          {* 4 colunas *}
          <div class="dt-flex-col dt-flex-col-height-4">
            <div class="dt-flex-row dt-flex-centre ">
              <picture>

                <source srcset="/img/cms/declarationtravaux/vue-hotel-luxueux-piscine.webp" type="image/webp">
                <img class="dt-img-fluid" src="/img/cms/declarationtravaux/vue-hotel-luxueux-piscine.jpg"
                  alt="Investisseurs Affaires" title="Investisseurs Affaires">
              </picture>
            </div>
            <div class="dt-flex-row dt-flex-centre">
              <div class="dt-flex-col m-2">
                Photos du terrain actuelles de l'emplacement prévu pour le projet afin de voir clairement la zone de
              construction.
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  {* fim de colunas de 4 *}

  {* begin de colunas de 3 *}
  <div class="dt-flex mt-3">
    <div class="dt-flex-title dt-flex-title-color-1 dt-flex-centre  p-1">
      Les avantages d’un service de déclaration de travaux :
    </div>
    {* colunas de 1 *}
    <div class="dt-flex ">
      <div class="dt-flex-row-3">
        <div class="dt-flex-col dt-flex-col-height-2">
          <div class="dt-flex-row dt-flex-centre">
            <picture>
              <source srcset="/img/cms/declarationtravaux/business-man-working-office-desktop.webp" type="image/webp">
              <img class="dt-img-fluid" src="/img/cms/declarationtravaux/business-man-working-office-desktop.jpg"
                alt="Reunion Equipe Entrepriseprocessus" title="Reunion Equipe Entrepriseprocessus">
            </picture>
          </div>

          <div class="dt-flex-row dt-flex-centre">
            <div class="dt-flex-col m-2">
              Gain de temps
            </div>
          </div>
        </div>
        {* 2 colunas *}
        <div class="dt-flex-col dt-flex-col-height-2">
          <div class="dt-flex-row dt-flex-centre">
            <picture>
              <source
                srcset="/img/cms/declarationtravaux/closeup-rencontre-amicale-serrement-de-main-femme-affaires.webp"
                type="image/webp">
              <img class="dt-img-fluid"
                src="/img/cms/declarationtravaux/closeup-rencontre-amicale-serrement-de-main-femme-affaires.jpg"
                alt="Jeune Collegue" title="Jeune Collegue">
            </picture>
          </div>
          <div class="dt-flex-row dt-flex-centre">
            <div class="dt-flex-col m-2">
              Tranquillité d'esprit : vous êtes assuré que votre dossier sera complet et conforme, minimisant ainsi les
                risques de refus ou de retards.
              </div>
            </div>
          </div>
          {* 3 colunas *}
          <div class="dt-flex-col dt-flex-col-height-2">
            <div class="dt-flex-row dt-flex-centre ">
              <picture>

                <source srcset="/img/cms/declarationtravaux/femme-opert-clients-avec-casque-sourire.webp"
                  type="image/webp">
                <img class="dt-img-fluid" src="/img/cms/declarationtravaux/femme-opert-clients-avec-casque-sourire.jpg"
                  alt="Investisseurs Affaires" title="Investisseurs Affaires">
              </picture>
            </div>
            <div class="dt-flex-row dt-flex-centre">
              <div class="dt-flex-col m-2">
                Suivi Personnalisé : nous vous tenons informé à chaque étape du processus et restons disponibles pour
                répondre à vos questions.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {* fim de colunas de 3 *}
    <div class="dt-flex  mt-2">
      <div class="dt-flex-title-2 dt-flex-title-color-4 dt-flex-centre  p-1">
      <strong>  Délai : </strong> 3 à 5 jours dès la réception de votre dossier complet.
      </div>
    </div>
    <div class="dt-flex  mt-2">
      <div class="dt-flex-title-2 dt-flex-title-color-4 dt-flex-centre  p-1">
     <strong> A noter : </strong> Aucun surcoût en cas de pièce complémentaire à envoyer.
      </div>
    </div>
    <div class="dt-flex  mt-2">
      <div class="dt-flex-title-2 dt-flex-title-color-2 dt-flex-centre  p-1">
      Nous sommes impatients de vous accompagner dans la réalisation de vos projets de déclaration préalable de travaux !
      </div>
    </div>


  </section>

{/block}
