{**
* 2007-2016 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
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
* @author    PrestaShop SA <contact@prestashop.com>
* @copyright 2007-2016 PrestaShop SA
* @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
* International Registered Trademark & Property of PrestaShop SA
*}
{extends file='page.tpl'}

{block name='page_header_container'}
  {* <div class="container" style="background-color: var(--red); color: white;">
  <p style="background-color: var(--red); color: white;"> <b>Fermeture exceptionnelle pour les fêtes de fin d'année </b></p>

  <p style="background-color: var(--red); color: white;">Notre service client sera en congé à l’occasion des fêtes de fin d’année, à compter du 24/12 midi. Nous serons de retour pour répondre à toutes vos questions et traiter vos demandes à partir du 06 janvier. Durant cette période, vous pouvez toujours passer vos commandes en ligne. Cependant, les réponses aux messages et le traitement des demandes pourront être retardés jusqu’à la réouverture.
  </p>
  <p style="background-color: var(--red); color: white;"> Nous vous remercions de votre compréhension et vous souhaitons d’excellentes fêtes de fin d’année ! 🎄</p>
  </div> *}
{/block}

{block name='page_content'}

<script>

 function checkSelection(val){

	var selectElmt = document.getElementById("contact_motif");
	var valeurselectionnee = selectElmt.options[selectElmt.selectedIndex].value;

    var x = document.getElementById("contact_facture");
	var y = document.getElementById("form");
	var z = document.getElementById("num_transporteur");

    if(val=='2' || val=='4' || val=='5' || val=='6'){
		x.style.display = "block";
    } else {
		x.style.display = "none";
    }

	if(val=='3'){
		y.style.display = "none";
		z.style.display = "block";
    } else {
		y.style.display = "block";
		z.style.display = "none";
    }

}

</script>

	<section id="wrapper">
		<div class="container">
			<nav data-depth="2" class="breadcrumb hidden-sm-down">
				<ol itemscope itemtype="http://schema.org/BreadcrumbList">
					<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
							<a itemprop="item" href="https://priximbattable.net/">
							<span itemprop="name">Accueil</span>
							</a>
						<meta itemprop="position" content="1">
					</li>
					<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
						<a itemprop="item" href="https://priximbattable.net/service-client.php">
							<span itemprop="name">Service client</span>
						</a>
					<meta itemprop="position" content="2">
					</li>
				</ol>
			</nav>
		<div class="contenainer_form">
			<h1 class="titre_form">Contactez-nous<span><br />nous sommes là pour vous aider</span></h1>
			<p>
			&nbsp;
			</p>
			<p>Si vous avez des <strong>questions</strong> concernant nos produits ou pour tout autre <strong>renseignement</strong>, n’hésitez pas et contactez-nous via ce <strong>formulaire de contact</strong>, <strong>notre service client</strong> est là pour vous aider. Nous vous répondrons dans les plus brefs délais, une fois avoir pris connaissance de votre <strong>demande</strong>.
Si votre question concerne une garantie d’un de nos produits, n’hésitez pas à parcourir notre <strong>FAQ</strong>, la réponse s’y trouve peut-être.</p>

			<p>
			&nbsp;
			</p>
			{if $msg != ''}
        <button id="modalbtnmsg" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalContactMesg" style="display: none;">
          modal
        </button>
        <script>
          setTimeout(() => {
            document.getElementById("modalbtnmsg").click();
          }, "1000");
        </script>
      {/if}
      <div class="col-xs-1"></div>
      <div class="s-c-gridview">
        <div class="col-xs-12 col-lg-5">
          <form method="POST" action="" enctype="multipart/form-data" class="s-c-form">
            <div><select name="contact_motif" id="contact_motif" class="field w-100" onchange="checkSelection(this.value)" placeholder="" required>
            <option value="">Je souhaite être recontacté pour...</option>
            <option value="1">Un renseignement sur un produit</option>
            <option value="2">Le suivi de ma commande</option>
            <option value="3">Le transporteur m'a laissé un message</option>
            <option value="4">Je veux déclarer un incident concernant ma livraison</option>
            <option value="5">Prendre rendez-vous pour une collecte</option>
            <option value="6">J'ai un problème technique après vente, je souhaite être recontacté par un technicien</option>
            <option value="7">J'ai un problème de paiement, confrmation de commande</option>

            </select></div>
            <div id="form">
            <div><input type="text" class="field w-100" name="contact_nom" id="contact_nom" value="" placeholder="Nom *" required></div>
            <div><input type="text" class="field w-100" name="contact_tel" id="contact_tel" value="" placeholder="Telephone *" required></div>
            <div><input type="text" class="field w-100" name="contact_email" id="contact_email" value="" placeholder="E-mail *" required></div>
            <div><input type="text" class="field w-100" name="contact_facture" id="contact_facture" value="" placeholder="N°Commande" style='display:none'></div>
            <div><textarea name="contact_descriptif" class="field w-100" rows="8" placeholder="Remarque : "></textarea></div>
            <input name="submit" class="field2" type="submit" value="Envoyer" />
            </div>
            <div id="num_transporteur" style='display:none'>
            <p>Vous avez reçu un message du transporteur concernant votre future livraison, vous pouvez joindre le transporteur au numéro suivant : 00 351 252 616 020.<br />Si vous avez reçu un SMS du transporteur nous vous conseillons d'y répondre directement en confirmant ou non le RDV.</p>
            </div>
          </form>
        </div>

        <div class="col-xs-12 col-lg-5 s-c-col">
          <div class="s-c-minute-attente">
            <p class="infobulle m-0">Actuellement vous avez <strong>{$minute_attente}</strong> minute(s) d'attente</p>
          </div>
          <div id="affluence">
            <div id="courbes" class="s-c-hours">
              <div class="courbe {if date('H') == 18}actif{/if} haut3"></div>
              <div class="courbe {if date('H') == 17}actif{/if} haut4"></div>
              <div class="courbe {if date('H') == 16}actif{/if} haut5"></div>
              <div class="courbe {if date('H') == 15}actif{/if} haut3"></div>
              <div class="courbe {if date('H') == 14}actif{/if} haut2"></div>
              <div class="courbe {if date('H') == 13}actif{/if} haut1"></div>
              <div class="courbe {if date('H') == 12}actif{/if} haut3"></div>
              <div class="courbe {if date('H') == 11}actif{/if} haut5"></div>
              <div class="courbe {if date('H') == 10}actif{/if} haut4"></div>
              <div class="courbe {if date('H') == 9}actif{/if} haut2"></div>
              <div class="courbe {if date('H') == 8}actif{/if} haut1"></div>
            </div>
            <div id="horaires" class="s-c-hours m-0">
              <div class="tranche">8</div>
              <div class="tranche">9</div>
              <div class="tranche">10</div>
              <div class="tranche">11</div>
              <div class="tranche">12</div>
              <div class="tranche">13</div>
              <div class="tranche">14</div>
              <div class="tranche">15</div>
              <div class="tranche">16</div>
              <div class="tranche">17</div>
              <div class="tranche">18</div>
            </div>
          </div>
          <div style="width: 100%;padding-bottom: 15px;">
                <iframe class="embed-responsive-item new-layout-commande-box1" id="codPdf" src="https://www.youtube.com/embed/XeaufyZmtMg" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width: 100%;height: 300px;"></iframe>
          </div>
        </div>
      </div>
      <div class="col-xs-1"></div>
			<div class="separateur"></div>
			<h2 class="type_service">Vous pouvez nous trouver sur :</h2>
			<div class="block_service_client"><img src="img/service_client.png" /><p>Notre <strong>service client</strong> se tient à votre disposition pour répondre à vos <strong>demandes</strong> ou vous fournir des <strong>informations supplémentaires</strong> concernant nos produits. Nos <strong>conseillers</strong> sont joignables au <strong>04 72 80 93 54</strong> du lundi au vendredi de 9h à 12h30 et de 13h à 18h. En raison d'un nombre important d'appel nous vous conseillons de privilégier les contacts par tchats ou d'appeler sur les périodes les moins fréquentées</p></div>
			<div class="block_service_client"><img src="img/tchat.png" /><p>Que vous souhaitiez <strong>poser une question technique</strong> sur un produit, ou avoir des informations sur le suivi de votre commande, nous vous conseillons d’utiliser le <strong>service de Tchat</strong> qui est le meilleur moyen d'avoir une réponse rapide. Vous pouvez discuter en direct avec l'un de nos conseillers en cliquant sur l'icône en bas <strong>"Tchat en ligne"</strong> à droite de l'écran. Nos conseillers sont disponibles de 9h à 12h30 et de 13h à 18h</p></div>
			<div class="block_service_client"><img src="img/sms.png" /><p>Vous pouvez également contacter notre service client de 9h à 12h et de 13h30 à 14h par <strong>SMS</strong> au <strong>07 87 11 31 43</strong></p></div>
			<div class="block_service_client"><a href="https://www.facebook.com/messages/t/priximbattable38" target="_blank"><img src="img/messenger.png" /></a><p>Vous pouvez nous contacter directement par le <strong>Messenger</strong> Priximbattable.net <a href="https://www.facebook.com/messages/t/priximbattable38" target="_blank">Accès au Messenger</a></p></div>
			<div class="block_service_client"><img src="img/whatsapp.png" /><p>Vous pouvez contacter priximbattable par <strong>WhatsApp</strong> en ajoutant le numéro <strong>07 87 11 31 43</strong></p></div>
		</div>
	</section>
  <div class="modal fade" id="modalContactMesg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="top: 50%;">
      <div class="modal-content" style="background-color: #54C0C7;color: var(--alumenu-white);font-weight: 700;">
        <div class="modal-body">
          {if $msg != ''}
            {$msg}
          {/if}
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  </div>
{/block}
