<?php

use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;
use PrestaShop\PrestaShop\Adapter\Presenter\Product\ProductPresenter;
use PrestaShop\PrestaShop\Core\Product\ProductPresentationSettings;

include(dirname(__FILE__) . '/../../config/config.inc.php');
include(dirname(__FILE__) . '/../../init.php');

$context = Context::getContext();
$rawTags = Tools::getValue('filter_tags'); // ex: ['cor:branca', 'altura:160', 'altura:170']
$minPrice = (float)Tools::getValue('min');
$maxPrice = (float)Tools::getValue('max');
$deleteData = Tools::getValue('delete');
$tagClear = Tools::getValue('tag_clear');
$categoryId = (int)Tools::getValue('categoryId');

// Agrupar tags por atributo (antes dos dois-pontos)
$tagsGrouped = [];
if (is_array($rawTags) && !empty($rawTags)) {
    foreach ($rawTags as $tag) {
        $parts = explode(':', $tag, 2);
        if (count($parts) === 2) {
            list($group, $value) = $parts;
            $safeTag = pSQL($tag);
            $tagsGrouped[$group][] = $safeTag;
        }
    }
} else {
    // Fallback: sem tags, escolher padrão (ex: 'destockage')
    switch ($categoryId) {
      case 51:
          $tagsGrouped = [
              'default' => ['portailBSTD']
          ];
          break;
      case 52:
          $tagsGrouped = [
              'default' => ['portailCSTD']
          ];
          break;
      case 53:
          $tagsGrouped = [
              'default' => ['portillonSTD']
          ];
          break;
      case 24:
          $tagsGrouped = [
              'default' => ['portegarageS']
          ];
          break;
      case 25:
          $tagsGrouped = [
              'default' => ['portegarageBtt']
          ];
          break;
      case 97:
          $tagsGrouped = [
              'default' => ['verriereATA']
          ];
          break;
      case 35:
          $tagsGrouped = [
              'default' => ['pergolasBio']
          ];
          break;
      case 34:
          $tagsGrouped = [
              'default' => ['pergolasAlu']
          ];
          break;
      case 37:
          $tagsGrouped = [
              'default' => ['pergolanda']
          ];
          break;
      case 83:
          $tagsGrouped = [
              'default' => ['abrivoiture']
          ];
          break;
      case 84:
          $tagsGrouped = [
              'default' => ['abrijardin']
          ];
          break;
      case 183:
          $tagsGrouped = [
              'default' => ['mobilierjardin']
          ];
      case 32:
          $tagsGrouped = [
              'default' => ['porteentreealuminium']
          ];
          break;
      case 111:
          $tagsGrouped = [
              'default' => ['porteentreetiercevitree']
          ];
          break;
      case 85:
          $tagsGrouped = [
              'default' => ['abrirangement']
          ];
          break;
      case 20:
          $tagsGrouped = [
              'default' => ['cloturealu']
          ];
          break;
      case 23:
          $tagsGrouped = [
              'default' => ['gardecorps']
          ];
          break;
      case 106:
          $tagsGrouped = [
              'default' => ['barrierepiscine']
          ];
          break;
      case 21:
          $tagsGrouped = [
              'default' => ['cloturegrillage100x55']
          ];
          break;
      case 108:
          $tagsGrouped = [
              'default' => ['cloturegrillage200x55']
          ];
          break;
      case 117:
          $tagsGrouped = [
              'default' => ['cloturegrillagepro200x55']
          ];
          break;
      case 55:
          $tagsGrouped = [
              'default' => ['portailBSM']
          ];
          break;
      case 56:
          $tagsGrouped = [
              'default' => ['portailCSM']
          ];
          break;
      case 65:
          $tagsGrouped = [
              'default' => ['portillonSM']
          ];
          break;
      case 126:
          $tagsGrouped = [
              'default' => ['automatisme']
          ];
          break;
      case 309:
      case 310:
      case 311:
      case 312:
      case 313:
      case 314:
      case 315:
      case 316:
      case 317:
      case 318:
      case 319:
      case 320:
      case 321:
          $tagsGrouped = [
              'default' => ['destockage']
          ];
          break;
    }
    // $maxPrice = PHP_INT_MAX;
}

// Se limpar filtros, remover dados especiais
if ($tagClear === 'yes' && $deleteData === 'yes') {
    // $tagsGrouped = [
    //     'default' => ['destockage']
    // ];
    switch ($categoryId) {
      case 51:
          $tagsGrouped = [
              'default' => ['portailBSTD']
          ];
          break;
      case 52:
          $tagsGrouped = [
              'default' => ['portailCSTD']
          ];
          break;
      case 53:
          $tagsGrouped = [
              'default' => ['portillonSTD']
          ];
          break;
      case 24:
          $tagsGrouped = [
              'default' => ['portegarageS']
          ];
          break;
      case 25:
          $tagsGrouped = [
              'default' => ['portegarageBtt']
          ];
          break;
      case 97:
          $tagsGrouped = [
              'default' => ['verriereATA']
          ];
          break;
      case 35:
          $tagsGrouped = [
              'default' => ['pergolasBio']
          ];
          break;
      case 34:
          $tagsGrouped = [
              'default' => ['pergolasAlu']
          ];
          break;
      case 37:
          $tagsGrouped = [
              'default' => ['pergolanda']
          ];
          break;
      case 83:
          $tagsGrouped = [
              'default' => ['abrivoiture']
          ];
          break;
      case 84:
          $tagsGrouped = [
              'default' => ['abrijardin']
          ];
          break;
      case 183:
          $tagsGrouped = [
              'default' => ['mobilierjardin']
          ];
          break;
      case 32:
          $tagsGrouped = [
              'default' => ['porteentreealuminium']
          ];
          break;
      case 111:
          $tagsGrouped = [
              'default' => ['porteentreetiercevitree']
          ];
          break;
      case 85:
          $tagsGrouped = [
              'default' => ['abrirangement']
          ];
          break;
      case 20:
          $tagsGrouped = [
              'default' => ['cloturealu']
          ];
          break;
      case 23:
          $tagsGrouped = [
              'default' => ['gardecorps']
          ];
          break;
      case 106:
          $tagsGrouped = [
              'default' => ['barrierepiscine']
          ];
          break;
      case 21:
          $tagsGrouped = [
              'default' => ['cloturegrillage100x55']
          ];
          break;
      case 108:
          $tagsGrouped = [
              'default' => ['cloturegrillage200x55']
          ];
          break;
      case 117:
          $tagsGrouped = [
              'default' => ['cloturegrillagepro200x55']
          ];
          break;
      case 55:
          $tagsGrouped = [
              'default' => ['portailBSM']
          ];
          break;
      case 56:
          $tagsGrouped = [
              'default' => ['portailCSM']
          ];
          break;
      case 65:
          $tagsGrouped = [
              'default' => ['portillonSM']
          ];
          break;
      case 126:
          $tagsGrouped = [
              'default' => ['automatisme']
          ];
          break;
      case 309:
      case 310:
      case 311:
      case 312:
      case 313:
      case 314:
      case 315:
      case 316:
      case 317:
      case 318:
      case 319:
      case 320:
      case 321:
          $tagsGrouped = [
              'default' => ['destockage']
          ];
          break;
    }
    $maxPrice = PHP_INT_MAX;
}

// Montar condições por grupo
$groupConditions = [];
foreach ($tagsGrouped as $group => $tags) {
    $uniqueTags = array_unique($tags);
    $formattedTags = "'" . implode("','", $uniqueTags) . "'";
    $groupConditions[] = "
        p.id_product IN (
            SELECT pt.id_product
            FROM " . _DB_PREFIX_ . "product_tag pt
            INNER JOIN " . _DB_PREFIX_ . "tag t ON t.id_tag = pt.id_tag
            WHERE t.name IN ($formattedTags)
        )
    ";
}

// Caso não hajam filtros válidos, evitar cláusula vazia
if (empty($groupConditions)) {
    die("<p>Aucun filtre de balises valide n'a été fourni.</p>");
}

$whereConditions = implode(' AND ', $groupConditions);

$sql = '
    SELECT p.*, pl.*
    FROM ' . _DB_PREFIX_ . 'product p
    INNER JOIN ' . _DB_PREFIX_ . 'product_lang pl
      ON p.id_product = pl.id_product
      AND pl.id_lang = ' . (int)$context->language->id . '
    INNER JOIN ' . _DB_PREFIX_ . 'category_product cp
      ON cp.id_product = p.id_product
    WHERE cp.id_category = ' . $categoryId . '
      AND ' . $whereConditions . '
      AND (p.price * 1.20) BETWEEN ' . $minPrice . ' AND ' . $maxPrice;

$sql .= ' ORDER BY cp.position ASC';

$productsData = Db::getInstance()->executeS($sql);

// if (empty($productsData)) {
//     die('<p style="font-weight: bold; color:black;">Aucun produit trouvé avec ces filtres.</p>');
// }

if (empty($productsData)) {
    ob_clean(); // Remove qualquer saída anterior
    header('Content-Type: application/json');
    echo json_encode([
        'html' => '<p style="font-weight: bold; color:black;">Aucun produit trouvé avec ces filtres.</p>',
        'countproducttop' => 0
    ]);
    exit;
}

// Preparar presenter e Smarty (idem ao seu código original)
$imageRetriever = new ImageRetriever($context->link);
$priceFormatter = new PriceFormatter();
$colorsRetriever = new ProductColorsRetriever();
$translator = $context->getTranslator();
$productPresenter = new ProductPresenter(
    $imageRetriever,
    $context->link,
    $priceFormatter,
    $colorsRetriever,
    $translator
);

$presentationSettings = new ProductPresentationSettings();
$presentationSettings->catalog_mode = Configuration::get('PS_CATALOG_MODE');
$presentationSettings->show_prices = true;
$presentationSettings->show_add_to_cart = true;
$presentationSettings->show_quantity_discounts = true;
$presentationSettings->allow_add_variant_to_cart_from_listing = true;

$presentedProducts = [];
foreach ($productsData as $productArray) {
    $productProps = Product::getProductProperties($context->language->id, $productArray);
    $presentedProducts[] = $productPresenter->present(
        $presentationSettings,
        $productProps,
        $context->language
    );
}

$context->smarty->assign([
    'products' => $presentedProducts,
    'link' => $context->link,
    'countproduct' => count($presentedProducts),
    'categoryId' => $categoryId
]);

// echo $context->smarty->fetch(_PS_MODULE_DIR_ . 'destockagefilter/views/templates/front/product-list.tpl');
echo json_encode([
    'html' => $context->smarty->fetch(_PS_MODULE_DIR_ . 'destockagefilter/views/templates/front/product-list.tpl'),
    'countproducttop' => count($presentedProducts)
]);
