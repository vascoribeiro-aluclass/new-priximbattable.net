{assign var="allowed_categories" value=[309,310,311,312,313,314,315,316,317,318,319,320,321,126,51,52,53,24,25,97,34,35,37,83,84,183,32,111,85,20,23,106,21,108,117,55,56,65]} {*  Subcategorias *}

{if in_array($category_id, $allowed_categories)}
  <style>
    #left-column {
      display: block !important;
    }

    @media (min-width: 768px) {
      #category div#content-wrapper,
      div#block-menu {
        float: left;
        width: 75%;
      }
    }
    #left-column .block-categories {
      display: none;
    }

  </style>
{/if}
<div id="tag-filter">
  <form id="tagFilterForm">
    <h3>Filtrer les Produits</h3>
    <div id="slider"></div>
    <p class="pt-1">Prix: <span id="price-range"></span></p>
    <input type="hidden" id="min-price" name="min_price">
    <input type="hidden" id="max-price" name="max_price">
    <input type="hidden" id="categoryId" value="{$category_id}">
    {if empty($alturas)}
      {* não existe tags de alturas *}
    {else}
      <div class="altura-group">
        {if $category_id == 51 || $category_id == 52 || $category_id == 53}
          <h4>Hauteur du portail :</h4>
        {else}
          <h4>Hauteur :</h4>
        {/if}
        {foreach from=$alturas item=tag}
          <label {if ($category_id == 51 && $tag.full == "hauteur: 1700 mm") || ($category_id == 53 && $tag.full == "hauteur: 1400 mm") || ($category_id == 53 && $tag.full == "hauteur: 1800 mm") || ($category_id == 53 && $tag.full == "hauteur: 1600 mm")}style="display:none;"{/if}>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label>{if ($category_id == 51 && $tag.full == "hauteur: 1700 mm") || ($category_id == 53 && $tag.full == "hauteur: 1400 mm") || ($category_id == 53 && $tag.full == "hauteur: 1800 mm") || ($category_id == 53 && $tag.full == "hauteur: 1600 mm")} {else} <br> {/if}
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($larguras)}
      {* não existe tags de larguras *}
    {else}
      <div class="larguras-group">
        {if $category_id == 51 || $category_id == 52 || $category_id == 53}
          <h4>Largeur entre piliers :</h4>
        {else}
          <h4>Largeur :</h4>
        {/if}
        {foreach from=$larguras item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($cores) || $category_id == 84}
      {* não existe tags de cores *}
    {else}
      <div class="cores-group">
        <h4>Couleur :</h4>
        {foreach from=$cores item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($ouverture) || $category_id == 51 || $category_id == 52 || $category_id == 53}
      {* não existe tags de type de remplissage *}
    {else}
      <div class="type-rempli-group">
        <h4>Option d'Ouverture :</h4>
        {foreach from=$ouverture item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($l_x_p) || $category_id == 83}
      {* não existe tags de lafrgura x profundidade *}
    {else}
      <div class="l_x_p-group">
        <h4>Largeur x Profondeur :</h4>
        {foreach from=$l_x_p item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($l_x_l) || $category_id == 84}
      {* não existe tags de lafrgura x profundidade *}
    {else}
      <div class="l_x_p-group">
        <h4>Longueur x Largeur :</h4>
        {foreach from=$l_x_l item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($larg_x_haut)}
      {* não existe tags de largura x altura *}
    {else}
      <div class="larg_x_haut-group">
        <h4>Largeur x Hauteur :</h4>
        {foreach from=$larg_x_haut item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($sf)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
          <h4>Surface (m²) :</h4>
        {foreach from=$sf item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($options)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
        <h4>Options :</h4>
        {foreach from=$options item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($toile)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
        <h4>Toile :</h4>
        {foreach from=$toile item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($decors)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
        <h4>Avec Décors :</h4>
        {foreach from=$decors item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($mesure) || $category_id == 24 || $category_id == 84}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
        <h4>Dimensions :</h4>
        {foreach from=$mesure item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($resort)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
        <h4>Resort :</h4>
        {foreach from=$resort item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($vantaux)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
        <h4>Vantaux :</h4>
        {foreach from=$vantaux item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($verrieres)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
        <h4>Verrieres :</h4>
        {foreach from=$verrieres item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($fermetures)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
        <h4>Fermetures :</h4>
        {foreach from=$fermetures item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($tmj)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
        <h4>Type :</h4>
        {foreach from=$tmj item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($motorisation)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
        <h4>Type :</h4>
        {foreach from=$motorisation item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if $category_id == 51 || $category_id == 52 || $category_id == 53}
      {if empty($disponibilite)}

      {else}
        <div class="options-group">
            <h4>Disponibilité :</h4>
          {foreach from=$disponibilite item=tag}
            <label>
              <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
              {$tag.name}
            </label><br>
          {/foreach}
        </div>
        <hr>
      {/if}
    {else}

    {/if}
    {if empty($ressort)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
          <h4>Type de ressort :</h4>
        {foreach from=$ressort item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($fixation)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
          <h4>Fixation :</h4>
        {foreach from=$fixation item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($nbvoiture) || $category_id == 84}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
          <h4>Nb de voiture :</h4>
        {foreach from=$nbvoiture item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($habri) || $category_id == 84}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
          <h4>Hauteur du carport/abri :</h4>
        {foreach from=$habri item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($typecarport) || $category_id == 84}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
          <h4>Type carport :</h4>
        {foreach from=$typecarport item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($lame)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
          <h4>Lames :</h4>
        {foreach from=$lame item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($toiture) || $category_id == 318}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
          <h4>Toiture :</h4>
        {foreach from=$toiture item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($panneaux)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
          <h4>Finition des panneaux :</h4>
        {foreach from=$panneaux item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($hublot)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
          <h4>Hublot :</h4>
        {foreach from=$hublot item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($portillon)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
          <h4>Portillon :</h4>
        {foreach from=$portillon item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($lxh)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
          <h4>Dimensions :</h4>
        {foreach from=$lxh item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($remplissage)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
          <h4>Remplissage :</h4>
        {foreach from=$remplissage item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($forme)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
          <h4>Forme :</h4>
        {foreach from=$forme item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($pblxp)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
          <h4>Largeur & Profondeur :</h4>
        {foreach from=$pblxp item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($epaisseur)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
          <h4>Épaisseur :</h4>
        {foreach from=$epaisseur item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($resistancethermique)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
          <h4>Coeff. résistance thermique :</h4>
        {foreach from=$resistancethermique item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($style)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
          <h4>Style :</h4>
        {foreach from=$style item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($typecloture)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
          <h4>Type :</h4>
        {foreach from=$typecloture item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($typegardecorps)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
          <h4>Type :</h4>
        {foreach from=$typegardecorps item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($fixationpoteaux)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
          <h4>Fixation des poteaux :</h4>
        {foreach from=$fixationpoteaux item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    {if empty($accessoire)}
      {* não existe tags de opções *}
    {else}
      <div class="options-group">
        {if $category_id == 51 || $category_id == 52 || $category_id == 53}
          <h4>Accessoire de portails :</h4>
        {elseif $category_id == 24}
          <h4>Accessoire de porte de garage :</h4>
        {else}
          <h4>Accessoire :</h4>
        {/if}
        {foreach from=$accessoire item=tag}
          <label>
            <input type="checkbox" name="filter_tags[]" value="{$tag.full}" />
            {$tag.name}
          </label><br>
        {/foreach}
      </div>
      <hr>
    {/if}
    <div class="vertical-align" style="flex-wrap: wrap; display:flex !important;">
      <button class="btn btn-primary mt-1" id="submitData" type="submit">Appliquer les Filtres</button>
      <button class="btn btn-primary mt-1 mb-1" id="clearData" type="submit">Effacer les Filtres</button>
    </div>
  </form>
</div>
<script>
  var maxPrice = {$max_price|floatval};
  console.log(maxPrice);
</script>
{literal}
  <script>
    var min_price = 0;
    var max_price = 9999999999999;
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('tagFilterForm');
      const categoryId = document.getElementById("categoryId").value;
      if (!form) return;

      // form.addEventListener('submit', function(e) {
      $("#submitData").click(function(e){
        e.preventDefault();

        const formData = new FormData(form);
        formData.append('min', min_price);
        formData.append('max', max_price);
        formData.append('categoryId',categoryId)
        // console.log(max_price);

        fetch('/modules/destockagefilter/ajax_filter.php', {
            method: 'POST',
            body: formData
          })
          .then(response => response.json())
          .then(data => {
            const productList = document.querySelector('#js-product-list');
            $(".total-products").empty();
            $(".total-products").append(`<p>Il y a ${data.countproducttop} produits.</p>`);
            if (productList) {
              productList.innerHTML = data.html; // atualiza só o conteúdo da lista de produtos
            }
            tags_products();
          })
          .catch(error => {
            console.error('Error', error);
            alert('Error.');
          });
      });
      $("#clearData").click(function(e){
        e.preventDefault();
        max_price = 9999999999999;
        const formData = new FormData(form);
        formData.append('min', 0);
        formData.append('max', 9999999999999);
        formData.append('delete','yes');
        formData.append('tag_clear','yes');
        formData.append('categoryId',categoryId)

        for (let pair of formData.entries()) {
          console.log(pair[0] + ': ' + pair[1]);
        }

        fetch('/modules/destockagefilter/ajax_filter.php', {
            method: 'POST',
            body: formData
          })
          .then(response => response.json())
          .then(data => {
            const productList = document.querySelector('#js-product-list');
            $(".total-products").empty();
            $(".total-products").append(`<p>Il y a ${data.countproducttop} produits.</p>`);
            if (productList) {
              productList.innerHTML = data.html; // atualiza só o conteúdo da lista
              $("#min-price").val(0);
              $("#max-price").val(max_price);
              priceSlider.noUiSlider.set([0, 9999999999999]);
              $('input:checkbox').prop('checked', false);
            }
            tags_products();
          })
          .catch(error => {
            console.error('Error. ', error);
            // alert('Error.');
          });
      });
      const priceSlider = document.getElementById('slider');

      noUiSlider.create(priceSlider, {
        start: [0, maxPrice], // valores iniciais (ex: 0 a 1000 €)
        connect: true,
        step: 10,
        range: {
          'min': 0,
          'max': maxPrice
        },
        format: {
          to: value => value.toFixed(0),
          from: value => Number(value)
        }
      });

      const priceRange = document.getElementById('price-range');
      const inputMin = document.getElementById('min-price');
      const inputMax = document.getElementById('max-price');

      priceSlider.noUiSlider.on('update', function(values) {
        priceRange.innerText = values.join(' € - ') + ' €';
        inputMin.value = values[0];
        inputMax.value = values[1];
      });
      priceSlider.noUiSlider.on('change', function () {
        min_price = inputMin.value;
        max_price = inputMax.value;
      });
    });
  </script>
{/literal}
