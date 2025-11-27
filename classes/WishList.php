<?php

use Alma\API\Entities\Order;
use LDAP\Result;

class WishListCore extends ObjectModel
{
  function __construct(){

  }

  public function SetCookeiWishList($wishlist){
    $wishlistArray = json_decode($wishlist, true);
    $idCustomer = 0;

    if(!empty(Context::getContext()->cookie->id_customer)){
      $idCustomer = Context::getContext()->cookie->id_customer;
    }

    foreach($wishlistArray as $wishlistRow){
      $sql = "INSERT INTO `" . _DB_PREFIX_ . "wishlist` (`id_customer`,`id_product`) VALUES ('".(int)$idCustomer."','".(int)$wishlistRow."')";

      Db::getInstance()->execute($sql);
    }
  }

  public function RemoveHistoricProductWishlist($idProduct){

    $isDeleteproduct = false;

    if (Context::getContext()->customer->isLogged()){

      $idCustomer = 0;

      if(!empty(Context::getContext()->cookie->id_customer)){
        $idCustomer = Context::getContext()->cookie->id_customer;
      }

      $sql = "DELETE FROM `" . _DB_PREFIX_ . "wishlist`
              WHERE (`id_customer` = '". (int)$idCustomer ."') and `id_product`  = " . (int)$idProduct;

      $resultWishList = Db::getInstance()->execute($sql);

      if($resultWishList){
        $isDeleteproduct = true;
      }

    }else{

      if ( array_key_exists('prix_wishlist', $_COOKIE)) {
        if($_COOKIE["prix_wishlist"]){

          $wishlistArray = json_decode($_COOKIE["prix_wishlist"], true);

          if (array_key_exists($idProduct, $wishlistArray)) {
            unset($wishlistArray[$idProduct]);
            $cookieWishlist = json_encode($wishlistArray, true);
            setcookie("prix_wishlist", $cookieWishlist, time() + 15 * 24 * 60 * 60, "/");
            $isDeleteproduct = true;
          }

        }
      }
    }
    return $isDeleteproduct;
  }

  public function isWishList($idProduct = false){

    $isWishList = false;

    if (Context::getContext()->customer->isLogged()){

      $idCustomer = 0;

      if(!empty(Context::getContext()->cookie->id_customer)){
        $idCustomer = Context::getContext()->cookie->id_customer;
      }

      $sql = " SELECT count(wl.`id`) FROM `" . _DB_PREFIX_ . "wishlist` wl
              WHERE (wl.`id_customer` = '". (int)$idCustomer ."')". ($idProduct ?  " and wl.`id_product`  = " . (int)$idProduct : "");

      $wishListCount = Db::getInstance()->getValue($sql);

      if($wishListCount > 0){
        $isWishList = true;
      }

    }else{

      if ( array_key_exists('prix_wishlist', $_COOKIE)) {
        if($_COOKIE["prix_wishlist"]){

          $wishlistArray = json_decode($_COOKIE["prix_wishlist"], true);

          if($idProduct){
            if (array_key_exists($idProduct, $wishlistArray)) {
              $isWishList = true;
            }
          }else{
            if (count($wishlistArray) > 0)
              $isWishList = true;
          }
        }
      }
    }

   return $isWishList;
  }

  public function SetWishList($idProduct){
    $arrayRequest  = array();

    $arrayRequest['status'] = 'error';
    $arrayRequest['action'] = '';

    $idCustomer = 0;

    if (Context::getContext()->customer->isLogged()){

      if(!empty(Context::getContext()->cookie->id_customer)){
        $idCustomer = Context::getContext()->cookie->id_customer;
      }

      $idCustomer = Context::getContext()->cookie->id_customer;

      $sql = " SELECT count(wl.`id`) FROM `" . _DB_PREFIX_ . "wishlist` wl
               WHERE (wl.`id_customer` = '". (int)$idCustomer ."') and wl.`id_product`  = " . (int)$idProduct;

      $wishListCount = Db::getInstance()->getValue($sql);


      if($wishListCount > 0){
        $sql = " DELETE wl FROM `" . _DB_PREFIX_ . "wishlist` wl
                      WHERE (wl.`id_customer` = '". (int)$idCustomer ."') and wl.`id_product`  = " . (int)$idProduct;
        $arrayRequest['action'] = 'delete';

      }else{
        $sql = " INSERT INTO `" . _DB_PREFIX_ . "wishlist` (`id_customer`,`id_product`) VALUES ('".(int)$idCustomer."','".(int)$idProduct."')";
        $arrayRequest['action'] = 'add';
      }

      $resultWishList = Db::getInstance()->execute($sql);

      if($resultWishList){
        $arrayRequest['status'] = 'success';
      }

    }else{

      if (!isset($_COOKIE["prix_wishlist"])) {
        $cookieWishlist = WishList::GenerateWishList((int)$idProduct,false);
        setcookie("prix_wishlist", $cookieWishlist, time() + 15 * 24 * 60 * 60, "/");
      }else{
        $cookieWishlist = WishList::GenerateWishList((int)$idProduct,$_COOKIE["prix_wishlist"]);
        setcookie("prix_wishlist", $cookieWishlist, time() + 15 * 24 * 60 * 60, "/");
      }
      $arrayRequest['status'] = 'success';
    }

    return $arrayRequest;
  }

  public function GetHistoricProductCart($idCart){
    $image_type = 'small_default';
    $descontocatalogo = Product::checaDescontosCatalogo();

    $templateParams = array();
    $templateParams['produts'] = array();
    $sql = "SELECT  p.price, cp.quantity , p.id_product, cp.id_customization, pl.description, pl.name
            FROM `" . _DB_PREFIX_ . "cart_product_historic` cp
            INNER JOIN `" . _DB_PREFIX_ . "product` p on p.id_product = cp.id_product
            INNER JOIN `ps_product_lang` pl on pl.id_product = p.id_product and pl.id_lang = ".(int)Context::getContext()->language->id."
            WHERE cp.id_cart = ".(int) $idCart ." ORDER BY cp.`date_hst` DESC";

    $cartHistoricProductResult = Db::getInstance()->executeS($sql);


    foreach($cartHistoricProductResult as $product){
      $productArray = array();
      if(!array_key_exists($product['id_product'],  $templateParams['produts'])){
        $taxAlu = Tax::getProductTaxRate($product['id_product']);
        $taxAlu = ($taxAlu + 100) / 100;

        $productArray['price'] = (($product['price']-(($product['price'] * $descontocatalogo['reduction_value']) / 100)))* $taxAlu;
        $productArray['description']  = strip_tags($product['description']);
        $productArray['name']  = $product['name'];
        $productArray['quantity']  = $product['quantity'];
        $productArray['id_customization']  = $product['id_customization'];
        $objProduct = new Product((int)$product['id_product'],false,(int)Context::getContext()->language->id);

        $imgCover   = $objProduct->getCover((int)$objProduct->id);
        $link       =  new Link();
        $img_url    = (Configuration::get('PS_SSL_ENABLED') ? "https://" : "http://").$link->getImageLink(isset($objProduct->link_rewrite) ? $objProduct->link_rewrite : $objProduct->name,(int)$imgCover['id_image'], $image_type);
        $productArray['image'] =  $img_url;
        $templateParams['produts'][$product['id_product']] = $productArray;
      }
    }

    return $templateParams;
  }

  public function GetHistoricCart(){
    $cartHistoricArray = array();
    $idCustomer = false;

    if (Context::getContext()->customer->isLogged()){
      if(!empty(Context::getContext()->cookie->id_customer)){

        $idCustomer = Context::getContext()->cookie->id_customer;

        $sql =  "SELECT ch.`date_upd` as datacart, ch.`id_cart` as numbercart, ch.`id_customer`
                  FROM `" . _DB_PREFIX_ . "cart`ch
                  WHERE ch.`id_customer` = ".(int)$idCustomer."
                  and  ch.`date_upd` >= DATE_SUB(CURDATE(), INTERVAL 2 MONTH)
                  and  ch.id_cart not in (SELECT o.id_order FROM `" . _DB_PREFIX_ . "orders` o  )
                  ORDER BY ch.`date_upd` DESC ";

        $cartHistoricResult= Db::getInstance()->executeS($sql);

        $descontocatalogo = Product::checaDescontosCatalogo();


        foreach($cartHistoricResult as  $row){
          $cartHistoricRow = array();
          $cartHistoricRow['date'] = $row['datacart'];
          $cartHistoricRow['numbercart'] = $row['numbercart'];
          $cartHistoricRow['customer'] = $row['id_customer'];

          $sql = "SELECT  p.price * cp.quantity as price, p.id_product
                  FROM `" . _DB_PREFIX_ . "cart_product_historic` cp
                  INNER JOIN `" . _DB_PREFIX_ . "product` p on p.id_product = cp.id_product
                  WHERE cp.id_cart = ".(int) $row['numbercart'] ." ORDER BY cp.`date_hst` DESC";

          $cartHistoricProductResult = Db::getInstance()->executeS($sql);
          $pricetotal = 0;

          $resultProducts = array();

          foreach($cartHistoricProductResult as $product){
            if(!array_key_exists($product['id_product'], $resultProducts)){
              $resultProducts[$product['id_product']] = $product;
            }
          }

          foreach($resultProducts as  $cartHistoricProductrow){
            $taxAlu = Tax::getProductTaxRate($cartHistoricProductrow['id_product']);
            $taxAlu = ($taxAlu + 100) / 100;
            $pricetotal = $pricetotal + (($cartHistoricProductrow['price']-(($cartHistoricProductrow['price'] * $descontocatalogo['reduction_value']) / 100))*$taxAlu);
          }

          $cartHistoricRow['price'] = $pricetotal;
          if($pricetotal > 0)
            $cartHistoricArray[] = $cartHistoricRow;

        }

      }
    }
    return $cartHistoricArray;
  }

  public function GetWishList(){
    $wishListArray = array();
    $image_type = 'home_default';

    $Wishlistidsproducts = '';
    $idCustomer = false;


    if (Context::getContext()->customer->isLogged()){
      if(!empty(Context::getContext()->cookie->id_customer)){
        $idCustomer = Context::getContext()->cookie->id_customer;
      }
    }else{
      if (isset($_COOKIE["prix_wishlist"])) {
        $wishlistArray = json_decode( $_COOKIE["prix_wishlist"], true);
        $Wishlistidsproducts = implode(",", $wishlistArray);
      }
    }

    $sql =  "SELECT
      pl.name,
      p.id_product,
      image_shop.id_image,
      p.price,
      p.ean13,
      p.id_category_default,
      pl.link_rewrite,
      image_shop.cover
    FROM `" . _DB_PREFIX_ . "product` p
    INNER JOIN `" . _DB_PREFIX_ . "product_lang` pl on pl.id_product = p.id_product and pl.id_lang  = " . (int)Context::getContext()->language->id . "
    INNER JOIN `" . _DB_PREFIX_ . "image` image_shop ON (image_shop.`id_product` = p.`id_product` AND image_shop.cover = 1 )
    "  .($idCustomer ? "INNER JOIN `" . _DB_PREFIX_ . "wishlist` wl on p.id_product = wl.id_product" : "") . "
    WHERE p.active = 1"  .($idCustomer ? " and (wl.`id_customer` =  " . (int)$idCustomer . " ) " :  " and p.id_product  in (" . $Wishlistidsproducts . ")") .
       ($idCustomer ?  " ORDER BY wl.date desc" : " ORDER BY pl.name ");

    $wishListResult = Db::getInstance()->executeS($sql);

    $context = Context::getContext();

    foreach($wishListResult as  $row){
      $wishListRow = array();
      $wishListRow['name'] = $row['name'];
      $wishListRow['id_image'] = $row['id_image'];
      $wishListRow['id_product'] = $row['id_product'];
      $wishListRow['cover'] = $row['cover'];
      $wishListRow['urlimage'] = $context->link->getImageLink(isset($row['link_rewrite']) ? $row['link_rewrite'] : $row['name'], (int)$row['id_image'], $image_type);
      $wishListRow['url'] = $context->link->getProductLink((int) $row['id_product'], $row['link_rewrite'], $row['id_category_default'], $row['ean13']);

      $wishListRow['price'] = $row['price'];
      $wishListRow['price_tax_incl'] = Product::getPriceStatic($row['id_product'], true, null, 2,null,false,false);
      $wishListRow['price_tax_excl'] = Product::getPriceStatic($row['id_product'], false, null, 2,null,false,false);

      $wishListArray[] = $wishListRow;
    }

    return $wishListArray;
  }


  public static function GenerateWishList($idProduct,$wishlist){
    $wishlistArray = array();

    if($wishlist){
      $wishlistArray = json_decode($wishlist, true);

      if (array_key_exists($idProduct, $wishlistArray)) {
        unset($wishlistArray[$idProduct]);
      }else{
        $wishlistArray[$idProduct] = $idProduct;
      }

    }else{
      $wishlistArray[$idProduct] = $idProduct;
    }

    return json_encode($wishlistArray);
  }




}
