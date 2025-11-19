<?php


include(dirname(__FILE__).'/../config/config.inc.php');
include(dirname(__FILE__).'/../init.php');


$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$resultsPerPage = isset($_GET['results_per_page']) ? intval($_GET['results_per_page']) : 5;
$offset = ($page - 1) * $resultsPerPage;

$data = Db::getInstance()->executeS("SELECT `id_product`,`title`,`content`,`customer_name`,`grade`, `date_add`, `validate` FROM `sp_product_comment` where  `validate` = 1 AND `deleted` = 0
ORDER BY `date_add` DESC LIMIT $offset, $resultsPerPage");

//print_r($data);


//Verificacao da quantidade por pagina
$todos = Db::getInstance()->executeS("SELECT * FROM `sp_product_comment` where `validate` = 1 AND `deleted` = 0");

$totalPage = ceil(count($todos));

//echo($totalPage);



foreach ($data as $results) {
  $productID = $results['id_product'];
  $validated = $results['validate'];

  $product = new Product($productID, false, 1);
  $image = Image::getCover($productID);
  $product = new Product($productID, false, Context::getContext()->language->id);
  $link = new Link; //because getImageLInk is not static function

  if (!empty($product->link_rewrite)) {
    $imagePath = $link->getImageLink($product->link_rewrite, $image['id_image'], 'cart_default');
  } else {
    $imagePath = '/img/avis/serviceClient.png';
  }

  $urlproduct = $link->getProductLink($product);

  //get name of product
  $titleproduct = $product->name;
  $product->link_rewrite;

  //print_r($urlproduct);
  $todasImagens[] = $imagePath;
  $todosTitleProduct[] = $titleproduct;
  $todosURLproduct[] = $urlproduct;


}

$resultado = [
  "totalPage" => $totalPage,
  "data" => $data,
  "grade" => $grade,
  "dadosImage" => [
    "image" => $todasImagens,
    "titleproduto" => $todosTitleProduct,
    "urlProduto" => $todosURLproduct
  ]
];

if ($resultado) {
  header('Content-Type: application/json');
  echo json_encode($resultado);
} else {
  echo json_encode(array('error' => 'Falha ao buscar dados do banco de dados.'));
}




